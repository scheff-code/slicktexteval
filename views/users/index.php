<?php

use \App\Route;

include_once '../views/template/head.php';
include_once '../views/template/body-top.php';
include_once '../views/users/actions/_' . Route::getAction() .  '.php';
include_once '../views/template/body-bottom.php';
