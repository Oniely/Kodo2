<?php

function hash_password($passw) {
$options = [
    'cost' => 12
];
$hashedPassword = password_hash($passw, PASSWORD_BCRYPT, $options);

return $hashedPassword;

}