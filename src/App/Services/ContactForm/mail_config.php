<?php

return [
    'host' => 'smtp.gmail.com',
    'username' => $_ENV["MAIL_SENDER_USERNAME"],
    'password' => $_ENV["MAIL_SENDER_PASSWORD"],
    'port' => 587,
    'encryption' => 'tls',
];