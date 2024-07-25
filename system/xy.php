<?php

use Xysdev\Admiflow\Config;

Config::load();

const LICENSE_SERVER_URL = 'https://xysdev.com/api/verify_license';
const REQUIRED_USER_ID = 20;
const REQUIRED_PROJECT_ID = 686; 
const CACHE_FILE = __DIR__ . '/cache.txt';
const CACHE_EXPIRATION = 300;
const ENCRYPTION_METHOD = 'aes-256-cbc';
const SECRET_KEY = 'XySDeV32ByteSecretKeyForAES256!'; 
const SECRET_IV = 'XySDeV16ByteIV1234'; 


function get_developer_credit(): string {
    return 'Powered by <a href="https://xysdev.com/" target="_blank">XysDev</a>';
}
