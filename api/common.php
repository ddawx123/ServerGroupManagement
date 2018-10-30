<?php
if (!session_id()) session_start();
$session = !empty($_SESSION['account']) ? $_SESSION['account'] : null;
if (is_null($session)) exit('UnAuthorized');