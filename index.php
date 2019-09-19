<?php
error_reporting( E_ERROR ); //выводит критические ошибки

// подключаем файлы ядра
require_once $_SERVER['DOCUMENT_ROOT'] . '/settings.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

Core\Route::start(); // запускаем маршрутизатор
