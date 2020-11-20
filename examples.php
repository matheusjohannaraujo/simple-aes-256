<?php

/*
	GitHub: https://github.com/matheusjohannaraujo/aes_256_cbc_or_gcm
	Country: Brasil
	State: Pernambuco
	Developer: Matheus Johann Araujo
	Date: 2020-11-20
*/

require_once "AES_256.php";
$text = "Matheus Johann Araújo";
$aes = new AES_256;
$aes->setKey("password");

// AES 256 CBC -----------------------------------------------

$encrypt1 = $aes->encrypt_cbc($text);
$decrypt1 = $aes->decrypt_cbc($encrypt1);

echo "<pre>AES 256 CBC<br><br>";
echo "Text: $text<br><br>";
echo "Encrypt: $encrypt1<br><br>";
echo "Decrypt: $decrypt1<br><br>";

// AES 256 GCM -----------------------------------------------

$tag = "";
$encrypt2 = $aes->encrypt_gcm($text, $tag);
$decrypt2 = $aes->decrypt_gcm($encrypt2, $tag);

echo "<hr>AES 256 GCM<br><br>";
echo "Text: $text<br><br>";
echo "Encrypt: $encrypt2<br><br>";
echo "Tag: $tag<br><br>";
echo "Decrypt: $decrypt2<br><br>";
