<?php

namespace application\model;

use \application\service\Service;
use \application\model\BaseModel;

class ProductsModel extends BaseModel
{

    public function getProducts()
    {
        $statement = self::$connection->prepare("SELECT * FROM products"); //PDO::prepare() возвращает объект PDOStatement. Представляет подготовленный запрос к базе данных
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC); //PDOStatement::fetch
    }

    public function getProduct($id)
    {
        $statement = self::$connection->prepare("
			SELECT *
			FROM
				products
			WHERE
				id = :id
		");
        $statement->bindValue(':id', $id, \PDO::PARAM_INT); //PDOStatement::bindValue — Связывает параметр с заданным значением
        $statement->execute(); //выполнить запрос

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
}
