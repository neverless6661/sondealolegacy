<?php

// 1. Obtener el Token de Acceso OAuth 2.0 (Google Bearer Token)
function getGoogleAccessToken($serviceAccountPath) {
    $authConfig = json_decode(file_get_contents($serviceAccountPath), true);
    
    $header = json_encode(['alg' => 'RS256', 'typ' => 'JWT']);
    $now = time();
    $payload = json_encode([
        'iss' => $authConfig['client_email'],
        'sub' => $authConfig['client_email'],
        'aud' => 'https://oauth2.googleapis.com/token',
        'iat' => $now,
        'exp' => $now + 3600,
        'scope' => 'https://www.googleapis.com/auth/firebase.messaging'
    ]);

    // Codificación Base64Url
    $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
    $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

    // Firma con la clave privada de la Cuenta de Servicio
    $signature = '';
    openssl_sign($base64UrlHeader . "." . $base64UrlPayload, $signature, $authConfig['private_key'], 'SHA256');
    $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

    $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

    // Solicitar Access Token a Google
    $ch = curl_init('https://oauth2.googleapis.com/token');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
        'assertion' => $jwt
    ]));

    $response = json_decode(curl_exec($ch), true);
    curl_close($ch);

    return $response['access_token'] ?? null;
}

// 2. Función para Enviar la Notificación Push
function sendPushNotification($deviceToken, $title, $body, $data = []) {
    $serviceAccountPath = __DIR__ . '/tu-archivo-firebase.json'; // Ruta a tu JSON de servicio
    $jsonKey = json_decode(file_get_contents($serviceAccountPath), true);
    $projectId = $jsonKey['project_id'];

    $accessToken = getGoogleAccessToken($serviceAccountPath);

    if (!$accessToken) {
        die("Error al obtener el Token de Acceso OAuth 2.0");
    }

    $url = "https://fcm.googleapis.com/v1/projects/{$projectId}/messages:send";

    // Estructura del payload HTTP v1
    $payload = [
        'message' => [
            'token' => $deviceToken,
            'notification' => [
                'title' => $title,
                'body'  => $body
            ],
            'data' => $data // Datos arbitrarios opcionales
        ]
    ];

    $headers = [
        'Authorization: Bearer ' . $accessToken,
        'Content-Type: application/json'
    ];

    // Envío cURL a Firebase
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return [
        'status_code' => $httpCode,
        'response' => json_decode($response, true)
    ];
}

// 3. Ejemplo de uso
$targetDeviceToken = 'TOKEN_DEL_DISPOSITIVO_RECEPTOR';
$resultado = sendPushNotification(
    $targetDeviceToken,
    '¡Hola desde PHP Puro!',
    'Notificación enviada sin librerías externas.',
    ['id_orden' => '1084', 'accion' => 'ver_detalles']
);

print_r($resultado);
