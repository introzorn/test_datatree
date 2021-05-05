<?php

use App\Cont\C;
use App\Models\M;
use App\Cont\A;

session_start();

require_once("SQL.php");
require_once("m/db.php");
require_once("c/auth.php");
require_once("c/cont.php");

A::Login();
A::$LogError = null;
$_SESSION['aw_login'] = '';



$m = new M();
$c = new C();
//var_dump($m->GetData());
$a = $m->GetData();
$c->GetTREE($a);

//реквест блок

if ($_POST['cmd'] == 'login') {
    A::Login();

}
if ($_POST['cmd'] == 'reg') {
    A::Reg();

}
if ($_GET['cmd'] == 'logout') {
    A::Logout();
    header('location: ./');
   die;
}

if ($_POST['cmd'] == 'add') {
    $c->addTREE();
    header('location: ./');
    die;
}
if ($_POST['cmd'] == 'edit') {
    $c->addTREE(true);
    header('location: ./');
    die;
}
if ($_POST['cmd'] == 'dell') {
    $c->dellTREE();
    header('location: ./');
   die;
}

require_once("v/main.php");
