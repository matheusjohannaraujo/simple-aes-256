<?php

/*
	GitHub: https://github.com/matheusjohannaraujo/simple-aes-256
	Country: Brasil
	State: Pernambuco
	Developer: Matheus Johann Araujo
	Date: 2025-04-14
*/

require_once "../vendor/autoload.php";

use MJohann\Packlib\SimpleAES256;

$text = "My name is Matheus";
$aes = new SimpleAES256();
$aes->setKey("MyPassword");

// AES 256 CBC -----------------------------------------------
$encrypt1 = $aes->encrypt_cbc($text);
$decrypt1 = $aes->decrypt_cbc($encrypt1);

echo "Simple AES 256 CBC", PHP_EOL;
echo "Text: ", $text, PHP_EOL;
echo "Encrypt: ", $encrypt1, PHP_EOL;
echo "Decrypt: ", $decrypt1, PHP_EOL, PHP_EOL;

// AES 256 GCM -----------------------------------------------
$tag = "";
$encrypt2 = $aes->encrypt_gcm($text, $tag);
$decrypt2 = $aes->decrypt_gcm($encrypt2, $tag);

echo "Simple AES 256 GCM", PHP_EOL;
echo "Text: ", $text, PHP_EOL;
echo "Encrypt: ", $encrypt2, PHP_EOL;
echo "Decrypt: ", $decrypt2, PHP_EOL;
echo "Tag: ", $tag, PHP_EOL, PHP_EOL;
