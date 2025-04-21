<?php

/*
	GitHub: https://github.com/matheusjohannaraujo/simple-aes-256
	Country: Brasil
	State: Pernambuco
	Developer: Matheus Johann Araujo
	Date: 2025-04-21
*/

namespace MJohann\Packlib;

class SimpleAES256
{

    // The key defined here will be used in the AES 256 CBC and AES 256 GCM methods

    private ?string $key = null;
    private ?string $tag = null;

    /**
     * Class constructor.
     * Initializes the class with an encryption key.
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * Sets a new encryption key.
     *
     * @param string $key The encryption key.
     * @return void
     */
    public function set_key(string $key): void
    {
        $this->key = $key;
    }

    /**
     * Returns the current encryption key.
     *
     * @return null|string
     */
    public function get_key(): ?string
    {
        return $this->key;
    }

    /**
     * Returns the current encryption tag.
     *
     * @return null|string
     */
    public function get_tag(): ?string
    {
        $tag = null;
        if ($this->tag !== null) {
            $tag = $this->tag;
            $this->tag = null;
        }
        return $tag;
    }

    // Below are the methods for working with AES 256 with CBC

    /**
     * Encrypts a string using AES-256-CBC mode.
     *
     * @param string $text The plaintext to encrypt (by reference).
     * @param string $key  The encryption key.
     * @return string      The encrypted text (base64 encoded).
     */
    private function enc_cbc(string &$text, string $key): string
    {
        $key = substr(hash('sha256', $key, true), 0, 32);
        $cipher = 'aes-256-cbc';
        $iv_len = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($iv_len);
        $text = openssl_encrypt(base64_encode($text), $cipher, $key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($iv . $text);
    }

    /**
     * Decrypts a string using AES-256-CBC mode.
     *
     * @param string $text The encrypted text (by reference).
     * @param string $key  The decryption key.
     * @return string The decrypted plaintext.
     */
    private function dec_cbc(string &$text, string $key): string
    {
        $key = substr(hash('sha256', $key, true), 0, 32);
        $cipher = 'aes-256-cbc';
        $iv_len = openssl_cipher_iv_length($cipher);
        $text = base64_decode($text);
        $iv = substr($text, 0, $iv_len);
        $text = substr($text, $iv_len);
        return base64_decode(openssl_decrypt($text, $cipher, $key, OPENSSL_RAW_DATA, $iv));
    }

    /**
     * Public method to encrypt a string using AES-256-CBC mode.
     *
     * @param string $text The plaintext to encrypt.
     * @return string      The encrypted text.
     */
    public function encrypt_cbc(string $text): string
    {
        return $this->enc_cbc($text, $this->key);
    }

    /**
     * Public method to decrypt a string using AES-256-CBC mode.
     *
     * @param string $text The encrypted text.
     * @return string      The decrypted plaintext.
     */
    public function decrypt_cbc(string $text): string
    {
        return $this->dec_cbc($text, $this->key);
    }

    // Below are the methods for working with AES 256 with GCM

    /**
     * Encrypts a string using AES-256-GCM mode.
     *
     * @param string $text The plaintext to encrypt (by reference).
     * @param string $key  The encryption key.
     * @param string $tag  The generated authentication tag (by reference).
     * @return string      The encrypted text (base64 encoded).
     */
    private function enc_gcm(string &$text, string $key, string &$tag): string
    {
        $key = substr(hash('sha256', $key, true), 0, 32);
        $cipher = 'aes-256-gcm';
        $iv_len = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($iv_len);
        $tag_length = 16;
        $text = openssl_encrypt(base64_encode($text), $cipher, $key, OPENSSL_RAW_DATA, $iv, $tag, "", $tag_length);
        return base64_encode($iv . $tag . $text);
    }

    /**
     * Decrypts a string using AES-256-GCM mode.
     *
     * @param string $text The encrypted text (by reference).
     * @param string $key  The decryption key.
     * @param string $tag  The authentication tag.
     * @return string The decrypted plaintext.
     */
    private function dec_gcm(string &$text, string $key, string $tag): string
    {
        $tag = base64_decode($tag);
        $key = substr(hash('sha256', $key, true), 0, 32);
        $cipher = 'aes-256-gcm';
        $iv_len = openssl_cipher_iv_length($cipher);
        $tag_length = 16;
        $text = base64_decode($text);
        $iv = substr($text, 0, $iv_len);
        $text = substr($text, $iv_len + $tag_length);
        return base64_decode(openssl_decrypt($text, $cipher, $key, OPENSSL_RAW_DATA, $iv, $tag));
    }

    /**
     * Public method to encrypt a string using AES-256-GCM mode.
     *
     * @param string $text The plaintext to encrypt.
     * @return string      The encrypted text.
     */
    public function encrypt_gcm(string $text): string
    {
        $this->tag = "";
        $text = $this->enc_gcm($text, $this->key, $this->tag);
        $this->tag = base64_encode($this->tag);
        return $text;
    }

    /**
     * Public method to decrypt a string using AES-256-GCM mode.
     *
     * @param string $text The encrypted text.
     * @param string $tag  The authentication tag (base64 encoded).
     * @return string      The decrypted plaintext.
     */
    public function decrypt_gcm(string $text, string $tag): string
    {
        return $this->dec_gcm($text, $this->key, $tag);
    }
}
