<?php

namespace application\model;

use \application\service\Service;
use \application\service\Application as App;

abstract class BaseModel
{

	protected static $connection = null;

	public function __construct()
	{

		if (!self::$connection) { //сначала проверяем есть ли оно(подключение)
			$db = App::config()->get("db"); //получаем элемент массива конфига

			self::$connection = new \PDO($db["dsn"], $db["user"], $db["password"]);
			self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			///https://tproger.ru/translations/how-to-configure-and-use-pdo////
			// PDO::ERRMODE_SILENT, PDO::ERRMODE_EXCEPTION и PDO::ERRMODE_WARNING. - 3 варианта поведения в случае ошибки
			/**PDO::ERRMODE_EXCEPTION
Это предпочтительный вариант, при котором в дополнение к информации об ошибке PDO выбрасывает исключение (PDOException).
Исключение прерывает выполнение скрипта, что полезно при использовании транзакций PDO.
Пример приведён ниже при описании транзакций. */
			// $options = [ либо таким образом передаем дополнительные параметры
			// 	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			// 	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC   //PDO::FETCH_NUM//PDO::FETCH_COLUMN//PDO::FETCH_OBJECT//PDO::FETCH_CLASS
			/**$stmt = $pdo->query("SELECT name, color FROM planets");
			 $stmt->setFetchMode(PDO::FETCH_CLASS, 'Planet'); *///применить метод setFetchMode, первый параметр константа PDO::FETCH_CLASS, второй - имя класса
			// ];

			// $pdo = new PDO($dsn, 'testuser', 'testpassword', $options);
			/**PDO::FETCH_ASSOC
Результат сохраняется в ассоциативном массиве, в котором ключ — имя столбца, а значение — соответствующее значение строки:

$stmt = $pdo->query("SELECT * FROM planets");
$results = $stmt->fetch(PDO::FETCH_ASSOC);
В результате получим:

Array
(
    [id] => 1
    [name] => earth
    [color] => blue
) */
		}
	}
}