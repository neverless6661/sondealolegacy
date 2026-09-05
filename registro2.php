<?php

// ==========================================
// 1. CONFIGURACIÓN Y CREDENCIALES
// ==========================================
// Reemplaza con los datos dentro de tu archivo .json descargado de Firebase
$client_email = "firebase-adminsdk-fbsvc@sondealopush.iam.gserviceaccount.com";
$private_key  = "-----BEGIN PRIVATE KEY-----\nMIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQDSpDtwsLxRSp/P\nXoAgEN5YAnU5eJ+2GqXHnV5JEG0lq/Peh1x1UeYu42GLYIkK7M/kpN81QMcCRipP\nZtzHpAl9odD05JbJ+peqZz9sqicjAA8sGwUx0cUylVFXssXW3fsMFUSNHRpL7S8Q\nPVV6VFDPC38Ge06u4M4OjFYFJ5j1KKa9FT71TB9DhwE0DQdgdW+PrFQOERbl8Ziw\nAEaRrvj9opjVo7IxRe8u30mtMctowUYCVBUfVWyTpwGMl3pE33EeA0tYJSRHvD8S\nBkkW7+RqRfw9YcVQFyyME5YHTFLW/G6ijpODohOFwRibAJ1+kc/fcKXEQnVC1Bij\nIFhghMDbAgMBAAECggEAD/11oa1Y7lba4NQMp+J/7nBpU66LeTh2ozuX/7XmgziV\nb6wY4bMQ5ThPnFP8sz6c3X+CjjlXoh2Pcq2dTu5t5gKVqTF9HOIQB1iFIQudovOL\nM07tywVgkeFx5lVk3VXGi/lFVe0CpQbhTrtJNNsXs0/tGaHcrDvWiJYwpX2HB/0l\nnob81tAONVICkQGiVlDN2xM0WAnClc7eghRv2Fcr1IPbH4wwsXlUk4cQ8qn+dAgl\nOoLkdcmV2K0WyS9oGdSEay77zj06w7ZIwBbW4g0H/Zmz0MvqXcjxfPzAuRYztqIc\nJODRA3Tc2/8owWZ/RAe8VNMA0e6gaubtnEIfRDY+SQKBgQD9nG+hZ5w03JHQBtK7\nr/UEyfeCuAncyQKLtJNDGln31Vah3jNIwyEWsDo+9M+WuGeu7nY/C5co5Lo9Q7Nx\n4uiQAEbSDJlHK19wV6DT9LhiXocpt39sk2slpwoli32y59O3Vf5q8LvHR6cIiRiI\nqlnmuzM63dcBdOyodoakEzINZQKBgQDUoC2mT7zu6TyEiWCdGPPg33u642BEemiG\nbIgiqSRRMIvKVRNDAknKGA6owmu4KTE79uPOh4UQDuVic0gaOeYXa0L71K2el9uF\n5ZcQVaCHuaKnYEhgx53Ph7t/GxI/+ZAAkyofz+ICt6SZOe1mDYqv1z4a1ftcQtlC\n1Kx1jvTRPwKBgFl45EUsOYbIvkSG87e1hxquajza0tfqrpQ9G6sT0+PEhzDKJIuq\nE7VebN4jHk2NNz8W7+6kFysdLrtIdDlclTGgd1vJiBX8rkoDEEFW1+oUcVj9XN4g\nUC/Tc5f1U15XvXCzzPNLhOP0WnB/dYFZoCfvqU4+T4k7B/cTAcNG5mSlAoGAfBV2\nToZeNfa7MIWTclqriGIjrO8gsRXWhgw0bjXTUeZIzi1T7lkZgu0DMQ01G+Y+K0Zr\nr4164+Itj4TDYTrEwooAL0Lwh4sLu1o/DHNMGakF+TPBSWl0+TW2//hmcBtOJGe9\nv47r0LYnQpyBpHrmorO0NKkH5dHFRLEka/6fdLUCgYBnMpf21nE3Zo68RR3L/u6e\nLJuYJ5inwdm64YbhkGC7cqcjRJQ9A4Kbmsq/4HMtFLUr7DMjCeCWr3X4MLT+pYDI\n42UBhod/3n2FKOIHa6YiJ8gh5PXolQTKy7JKchZg/HtVuy9NsyU3h4WTR+gvWVDS\nCt1yEMbXBXfIzI4U/coDfA==\n-----END PRIVATE KEY-----\n";
$project_id   = "sondealopush";

// Token del dispositivo móvil o web que recibirá la notificación
$device_token = "e0gOrfFKTX-5XJhlmoTb_5:APA91bGq54ev0VqXPdwqJHYDYodjGUJ3bz8Xf9-o4nKUa_EwPpxnQgInwdR482J3ccg6ifwx7VLqLdxE7hbYOxrwVI4FIU_U56Zmq-BfNbM4xWqtUBAOrAo";

// ==========================================
// 2. GENERAR JWT Y OBTENER ACCESS TOKEN OAUTH2
// ==========================================
function getAccessToken($client_email, $private_key) {
    $now = time();
    $header = json_encode(['alg' => 'RS256', 'typ' => 'JWT']);
    $payload = json_encode([
        'iss' => $client_email,
        'sub' => $client_email,
        'aud' => 'https://oauth2.googleapis.com/token',
        'iat' => $now,
        'exp' => $now + 3600,
        'scope' => 'https://www.googleapis.com/auth/firebase.messaging'
    ]);

    // Codificación Base64Url
    $base64UrlHeader  = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
    $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

    // Firmar con OpenSSL utilizando la clave privada
    $signature = '';
    openssl_sign($base64UrlHeader . "." . $base64UrlPayload, $signature, $private_key, OPENSSL_ALGO_SHA256);
    $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

    $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

    // Solicitar Bearer Token a Google mediante cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://oauth2.googleapis.com/token');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
        'assertion'  => $jwt
    ]));

    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);
    return $data['access_token'] ?? null;
}

// ==========================================
// 3. ENVIAR LA NOTIFICACIÓN A FCM v1
// ==========================================
function sendFcmNotification($project_id, $access_token, $device_token, $title, $body, $customData = []) {
    $url = "https://fcm.googleapis.com/v1/projects/{$project_id}/messages:send";

    // Estructura oficial del payload FCM v1
    $payload = [
        'message' => [
            'token' => $device_token,
            'notification' => [
                'title' => $title,
                'body'  => $body
            ],
            'data' => $customData // Datos adicionales en formato string
        ]
    ];

    $headers = [
        'Authorization: Bearer ' . $access_token,
        'Content-Type: application/json'
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return ['status' => $httpCode, 'response' => json_decode($response, true)];
}

// ==========================================
// 4. EJECUCIÓN
// ==========================================
$accessToken = getAccessToken($client_email, $private_key);

if ($accessToken) {
    $resultado = sendFcmNotification(
        $project_id,
        $accessToken,
        $device_token,
        "¡Hola desde PHP Vanilla!",
        "Esta notificación se envió sin dependencias externas.",
        ["click_action" => "ABRIR_PERFIL", "id" => "99"]
    );

    echo "Respuesta HTTP: " . $resultado['status'] . "\n";
    print_r($resultado['response']);
} else {
    echo "Error al obtener el Access Token de OAuth2.";
}
?>



<?php
function sendFcmNotification2($project_id, $access_token, array $deviceTokens, $title, $body, $customData = []) {
    $url = "https://fcm.googleapis.com/v1/projects/{$project_id}/messages:send";

    $headers = [
        'Authorization: Bearer ' . $access_token,
        'Content-Type: application/json'
    ];

    $results = [];

    // Inicializar cURL una sola vez fuera del bucle para mejor rendimiento
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    foreach ($deviceTokens as $token) {
        $payload = [
            'message' => [
                'token' => $token,
                'notification' => [
                    'title' => $title,
                    'body'  => $body
                ],
                'data' => $customData
            ]
        ];

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $results[$token] = [
            'status' => $httpCode,
            'response' => json_decode($response, true)
        ];
    }

    curl_close($ch);

    return $results;
}

// Ejemplo de uso:
$tokens = [
    'TOKEN_DISPOSITIVO_1',
    'TOKEN_DISPOSITIVO_2',
    'TOKEN_DISPOSITIVO_3'
];

$respuestas = sendFcmNotification('tu-project-id', $accessToken, $tokens, 'Título', 'Mensaje');

?>