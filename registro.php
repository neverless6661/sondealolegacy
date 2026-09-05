<?php
$fcmUrl = 'https://googleapis.com';
$token = 'd1ysjfivTCGnDib8RYy7vO:APA91bEQcYbVJRqCrD5HdTCAyCqPXoFxMKFSK_SiooQchJ3D-4XyLwAtLHCZHkL1SHGk_IP6HZtCCFgt97H9ql4pEF26FnAgZnkfmoDLFwxsdZNFY7xnf8w';

$notification = [
    'message' => [
        'token' => $token,
        'notification' => [
            'title' => 'Título de prueba',
            'body' => 'Este es el cuerpo de la notificación push'
        ]
    ]
];

$headers = [
    'Authorization: Bearer ' . 'AAAAryQC3Bo:APA91bGXnR7fvPEW5kovmSJj_ZspYRCEnfWT3DGpn3fW1Ro6OzJWo6ybKF8n_HOdB-b6fKUOF6ajg5R7nmOf4gJL3oM617vqfCqw-qxUCGanibHSUQy8N5vMx7jJMLEThxjKKh1ObAtM',
    'Content-Type: application/json'
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $fcmUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($notification));

$result = curl_exec($ch);
curl_close($ch);

var_dump($result);
?>