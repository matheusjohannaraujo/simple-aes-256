# [Simple AES 256](https://github.com/matheusjohannaraujo/simple-aes-256)

**SimpleAES256** is a PHP class designed to simplify encryption and decryption using AES-256 in CBC or GCM modes.

## 📦 Installation

You can install the library via [Packagist/Composer](https://packagist.org/packages/mjohann/simple-aes-256):

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

### Example AES 256 CBC
```php
<?php

use MJohann\Packlib\SimpleAES256;

require_once "vendor/autoload.php";

$aes = new SimpleAES256("MyPassword");
$text = "My name is Matheus";

$encrypt = $aes->encrypt_cbc($text);
$decrypt = $aes->decrypt_cbc($encrypt);

echo "Simple AES 256 CBC", PHP_EOL;
echo "Text: ", $text, PHP_EOL;
echo "Encrypt: ", $encrypt, PHP_EOL;
echo "Decrypt: ", $decrypt, PHP_EOL, PHP_EOL;
```

### Example AES 256 GCM

```php
<?php

use MJohann\Packlib\SimpleAES256;

require_once "vendor/autoload.php";

$aes = new SimpleAES256("MyPassword");
$text = "My name is Matheus";

$encrypt = $aes->encrypt_gcm($text);
$tag = $aes->get_tag();
$decrypt = $aes->decrypt_gcm($encrypt, $tag);

echo "Simple AES 256 GCM", PHP_EOL;
echo "Text: ", $text, PHP_EOL;
echo "Encrypt: ", $encrypt, PHP_EOL;
echo "Tag: ", $tag, PHP_EOL, PHP_EOL;
echo "Decrypt: ", $decrypt, PHP_EOL;
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
