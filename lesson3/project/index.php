<?php

require_once 'Twig/Autoloader.php'; // Подгружаем автозагрузчик Twig-а
require_once 'classes/Application.php'; // Указывает, где хранятся шаблоны
require_once 'classes/View.php'; // Инициализируем Twig

Twig_Autoloader::register(); //активируем автозагрузчик Twig-а, чтобы не использовать require_once для того, чтобы подгружать используемые классы Twig-a


try {

	// Указывает, где хранятся шаблоны
	$loader = new Twig_Loader_Filesystem('templates'); //все подчеркивания меняются на /, таким образом автозагрузчик строит пути к файлам

	// Инициализируем Twig
	$twig = new Twig_Environment($loader); //используем один объект для создания другого объекта
	//Получаем объект твиг,
	//который иммеет определенный набор свойств и его используем для того, чтобы можно было рендерить используя свой класс view
	$view = new \Classes\View($twig); //рендерер темплейтов


	$app = new \Classes\Application($view);

	try { ///
		$dbh = new PDO('mysql:dbname=trialdb;host=localhost:3306', 'root', 'NEW_DL15');
	} catch (PDOException $e) {
		echo "Error: Could not connect. " . $e->getMessage();
	} ///https://docs.google.com/document/d/1RQyfphtWUAEMzWwnr_5cPc5yaxDHjrvDbH5r8RFT0Hs/edit#   пример из методички


	$page = $_GET["p"];

	switch ($page) {
		case "":{
			$app->index();
		break;
		}
		case "images": {
			$app->images($dbh);
		break;
		}
		case "imagepage": {
			$app->imagepage($dbh);
		break;
		}
	}
} catch (Exception $e) {
	die('ERROR: ' . $e->getMessage());
}

