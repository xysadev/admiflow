<?php

require '../../../vendor/autoload.php';
require '../../../system/user_functions.php';

use Xysdev\Admiflow\Session;

Session::start();
Session::destroy();

header('Content-Type: application/json');
echo json_encode(['success' => true, 'redirect' => base_url() . 'signin.html']);
exit();
?>
