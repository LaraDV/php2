<?php
//Три товара tasty, delicious и excellent; по задумке, у каждого  есть три реализации: цифровая, штучно, на вес. Страна изготовитель один, общий - Россия.
abstract class Product
{
    public static $desc = "";
    public static $country = "Russia";
    public $goods = [
        "tasty" => [
            "priceForOne" => 8,
            "pricePerKg" => 50
        ],
        "delicious" => [
            "priceForOne" => 12,
            "pricePerKg" => 150
        ],
        "excellent" => [
            "priceForOne" => 20,
            "pricePerKg" => 200
        ]
    ];
    public function showDesc()
    {
        echo static::$desc . ". Страна-изгтовитель: " . self::$country;
    }
    abstract public function getTotalSumm($name, $quantity);
}

class DigitalProduct extends Product
{
    public static $desc = "<br>" . "Цифровой товар дешевле штучного товара в два раза.";
    public function getTotalSumm($name, $quantity)
    {
        return "<br>" . "Реализован товар на сумму: " . $this->goods[$name]["priceForOne"] / 2 * $quantity . " рублей.";
    }
}

class PieceProduct extends Product
{
    public static $desc = "<br>" . "Штучный физический товар";
    public function getTotalSumm($name, $quantity)
    {
        return "<br>" . "Реализован товар на сумму: " . $this->goods[$name]["priceForOne"] * $quantity . " рублей.";
    }
}

class BulkProduct extends Product
{
    public static $desc = "<br>" . "Товар на вес";
    public function getTotalSumm($name, $quantity)
    {
        return "<br>" . "Реализован товар на сумму: " . $this->goods[$name]["pricePerKg"] * $quantity . " рублей.";
    }
}

$Digital1 = new DigitalProduct();
$Digital1->showDesc();
echo $Digital1->getTotalSumm("excellent", 8); //80


$Piece1 = new PieceProduct();
$Piece1->showDesc();
echo $Piece1->getTotalSumm("excellent", 8); //160


$bulk1 = new BulkProduct();
$bulk1->showDesc();
echo $bulk1->getTotalSumm("excellent", 8); //1600


//Задание 2

trait SingletonTrait
{
    private static $instance;

    private function __construct()
    {
    }
    private function __clone()
    {
    }
    private function __wakeup()
    {
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) self::$instance = new static();

        return self::$instance;
    }
}

class MyClass {
    use SingletonTrait;
    //...
}

