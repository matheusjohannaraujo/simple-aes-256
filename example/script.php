<?php

/*
	GitHub: https://github.com/matheusjohannaraujo/simple-aes-256
	Country: Brasil
	State: Pernambuco
	Developer: Matheus Johann Araujo
	Date: 2025-04-21
*/

use MJohann\Packlib\Facades\SimpleAES256;

require_once "../vendor/autoload.php";

// Using a Facade to instantiate and configure an instance of the SimpleAES256 class.
SimpleAES256::init("MyPassword");
$text = "My name is Matheus";

// AES 256 CBC -----------------------------------------------
$encrypt1 = SimpleAES256::encrypt_cbc($text);
$decrypt1 = SimpleAES256::decrypt_cbc($encrypt1);

echo "Simple AES 256 CBC", PHP_EOL;
echo "Text: ", $text, PHP_EOL;
echo "Encrypt: ", $encrypt1, PHP_EOL;
echo "Decrypt: ", $decrypt1, PHP_EOL, PHP_EOL;

// AES 256 GCM -----------------------------------------------
$encrypt2 = SimpleAES256::encrypt_gcm($text);
$tag = SimpleAES256::get_tag();
$decrypt2 = SimpleAES256::decrypt_gcm($encrypt2, $tag);

echo "Simple AES 256 GCM", PHP_EOL;
echo "Text: ", $text, PHP_EOL;
echo "Encrypt: ", $encrypt2, PHP_EOL;
echo "Decrypt: ", $decrypt2, PHP_EOL;
echo "Tag: ", $tag, PHP_EOL, PHP_EOL;
