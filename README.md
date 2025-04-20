# [Simple AES 256](https://github.com/matheusjohannaraujo/simple-aes-256)

**SimpleAES256** is a PHP class designed to simplify encryption and decryption using AES-256 in CBC or GCM modes.

## 📦 Installation

You can install the library via Composer:

```bash
composer require mjohann/simple-aes-256
```

## ⚙️ Requirements

- PHP 8.0 or higher

## 🚀 Features

- Supported AES 256 CBC and AES 256 GCM:
  - `encrypt`
  - `decrypt`
  - `key`
  - `tag`

## 🧪 Usage Example

```php
<?php

require_once "vendor/autoload.php";

use MJohann\Packlib\Facades\SimpleAES256;

$text = "My name is Matheus";

$aes = SimpleAES256::init("MyPassword");

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
```

For more examples, see the [`example/script.php`](example/script.php) file in the repository.

## 📁 Project Structure

```
simple-aes-256/
├── src/
│   └── SimpleAES256.php
│   └── Facades/
│       └── SimpleAES256.php
├── example/
│   └── script.php
├── composer.json
├── .gitignore
├── LICENSE
└── README.md
```

## 📄 License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more information.

## 👨‍💻 Author

Developed by [Matheus Johann Araújo](https://github.com/matheusjohannaraujo) – Pernambuco, Brazil.
