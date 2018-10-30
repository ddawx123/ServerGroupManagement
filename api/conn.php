<?php
$mysqlhost = '127.0.0.1';
$mysqluser = 'root';
$mysqlpswd = 'root';
$mysqlname = 'test';
$mysqlport = 3306;
$sqlhandle = mysqli_connect($mysqlhost, $mysqluser, $mysqlpswd, $mysqlname, $mysqlport);
$sqlhandle->query('set names utf8');