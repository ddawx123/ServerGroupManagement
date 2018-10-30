<?php
header('Content-Type: text/plain; charset=UTF-8');
if (!session_id()) session_start();
$_SESSION['account'] = null;
session_destroy();
header('Location: ../frame/loginFrame.html');
exit();