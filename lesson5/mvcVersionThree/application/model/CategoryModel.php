<?php

namespace application\model;

use \application\service\Service;
use \application\model\BaseModel;

class CategoryModel extends BaseModel
{

	public function getAllCategories()
	{
		$statement = self::$connection->prepare("SELECT * FROM category"); //PDO::prepare() возвращает объект PDOStatement. Представляет подготовленный запрос к базе данных
		$statement->execute();

		return $statement->fetchAll(\PDO::FETCH_ASSOC);//PDOStatement::fetchAll — Возвращает массив, содержащий все строки результирующего набора
	}

	public function getCategoryWithProducts($id)
	{
		$statement = self::$connection->prepare("
			SELECT *
			FROM
				category
			LEFT JOIN
				goods ON (goods.category_id = category.id)
			WHERE
				category.id = :id
			AND
				goods.status = :status
		");
		$statement->bindValue(':id', $id, \PDO::PARAM_INT);//PDOStatement::bindValue — Связывает параметр с заданным значением
		$statement->bindValue(':status', GoodsModel::STATUS_ACTIVE, \PDO::PARAM_INT);
		$statement->execute();//выполнить запрос

		return $statement->fetchAll(\PDO::FETCH_ASSOC);//PDOStatement::fetchAll — Возвращает массив, содержащий все строки результирующего набора
	}
}

// /**PDOStatement implements Traversable {
// /* Свойства */
// readonly stringqueryString;
// /* Методы */
// public bindColumn ( mixed $column , mixed &$param [, int $type [, int $maxlen [, mixed $driverdata ]]] ) : bool
// public bindParam ( mixed $parameter , mixed &$variable [, int $data_type = PDO::PARAM_STR [, int $length [, mixed $driver_options ]]] ) : bool
// public bindValue ( mixed $parameter , mixed $value [, int $data_type = PDO::PARAM_STR ] ) : bool
// public closeCursor ( void ) : bool
// public columnCount ( void ) : int
// public debugDumpParams ( void ) : void
// public errorCode ( void ) : string
// public errorInfo ( void ) : array
// public execute ([ array $input_parameters = NULL ] ) : bool
// public fetch ([ int $fetch_style [, int $cursor_orientation = PDO::FETCH_ORI_NEXT [, int $cursor_offset = 0 ]]] ) : mixed
// public fetchAll ([ int $fetch_style [, mixed $fetch_argument [, array $ctor_args = array() ]]] ) : array
// public fetchColumn ([ int $column_number = 0 ] ) : mixed
// public fetchObject ([ string $class_name = "stdClass" [, array $ctor_args ]] ) : mixed
// public getAttribute ( int $attribute ) : mixed
// public getColumnMeta ( int $column ) : array
// public nextRowset ( void ) : bool
// public rowCount ( void ) : int
// public setAttribute ( int $attribute , mixed $value ) : bool
// public setFetchMode ( int $mode ) : bool
// } */
/**PDOStatement::bindColumn — Связывает столбец с переменной PHP
PDOStatement::bindParam — Привязывает параметр запроса к переменной
PDOStatement::bindValue — Связывает параметр с заданным значением
PDOStatement::closeCursor — Закрывает курсор, переводя запрос в состояние готовности к повторному запуску
PDOStatement::columnCount — Возвращает количество столбцов в результирующем наборе
PDOStatement::debugDumpParams — Вывод информации о подготовленной SQL-команде в целях отладки
PDOStatement::errorCode — Получает код SQLSTATE, связанный с последней операцией в объекте PDOStatement
PDOStatement::errorInfo — Получение расширенной информации об ошибке, произошедшей в результате работы объекта PDOStatement
PDOStatement::execute — Запускает подготовленный запрос на выполнение
PDOStatement::fetch — Извлечение следующей строки из результирующего набора
PDOStatement::fetchAll — Возвращает массив, содержащий все строки результирующего набора
PDOStatement::fetchColumn — Возвращает данные одного столбца следующей строки результирующего набора
PDOStatement::fetchObject — Извлекает следующую строку и возвращает ее в виде объекта
PDOStatement::getAttribute — Получение значения атрибута запроса PDOStatement
PDOStatement::getColumnMeta — Возвращает метаданные столбца в результирующей таблице
PDOStatement::nextRowset — Переход к следующему набору строк в результате запроса
PDOStatement::rowCount — Возвращает количество строк, затронутых последним SQL-запросом
PDOStatement::setAttribute — Устанавливает атрибут объекту PDOStatement
PDOStatement::setFetchMode — Устанавливает режим выборки по умолчанию для объекта запроса */
