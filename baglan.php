<?php 
ob_start(); 
$dbhost = "localhost"; //Veritabanın bulunduğu host
$dbuser = "fatih"; //Veritabanı Kullanıcı Adı
$dbpass = "123578951"; //Veritabanı Şifresi
$dbdata = "codesdb"; //Veritabanı Adı

include"dbclass.php";

$bag = new db();

ob_end_flush();
?>