<?php

/*
	GitHub: https://github.com/matheusjohannaraujo/aes_256_cbc_or_gcm
	Country: Brasil
	State: Pernambuco
	Developer: Matheus Johann Araujo
	Date: 2024-05-12
*/

require_once "AES_256.php";

$text = "Matheus Johann Araújo";
$aes = new AES_256;
$aes->setKey("password");

// AES 256 CBC -----------------------------------------------
$encrypt1 = $aes->encrypt_cbc($text);
$decrypt1 = $aes->decrypt_cbc($encrypt1);

echo "AES 256 CBC", PHP_EOL;
echo "Text: ", $text, PHP_EOL;
echo "Encrypt: ", $encrypt1, PHP_EOL;
echo "Decrypt: ", $decrypt1, PHP_EOL;
echo PHP_EOL;

// AES 256 GCM -----------------------------------------------
$tag = "";
$encrypt2 = $aes->encrypt_gcm($text, $tag);
$decrypt2 = $aes->decrypt_gcm($encrypt2, $tag);

echo "AES 256 GCM", PHP_EOL;
echo "Text: ", $text, PHP_EOL;
echo "Encrypt: ", $encrypt2, PHP_EOL;
echo "Decrypt: ", $decrypt2, PHP_EOL;
echo "Tag: ", $tag, PHP_EOL;
echo PHP_EOL;
