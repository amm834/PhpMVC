<?php
ob_start();
require_once '../app/config/message.php';
require_once '../app/app.php';
new Core();
new Database();
ob_end_flush();
?>

