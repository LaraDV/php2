<?php

class Article {

	public $id;
	public $title;
	public $content;

	public static $version = 1;

	public function __construct(
		int $id,
		string $title,
		string $content
	) {
		$this->id = $id;
		$this->title = $title;
		$this->content = $content;
	}

	public function showContent() {
		echo $this->content;
		echo self::$version;
	}

	public function plus($article) {
		return $this->content.$article->content;
	}

	public static function getVersion() {
		return self::$version;
	}
}

$article = new Article(1, "Title", "Content"); // Article
$article->showContent();

$article2 = new Article(1, "Title", "Content"); // Article
$article2->showContent();

Article::$version = 2;
echo Article::getVersion();

interface Movable {
	public function stop();
}

abstract class Car implements Movable {

	protected $color = "yellow";
	public $price;
	public $power;
	public $engine;

	public function __construct($color, $price, $power, $brand, $engine) {

	}

	protected function move() {
		//logic 1
	}

	public function brake() {

	}

	public function signal() {

	}

	public function rotate() {
		
	}
}

class Mercedes extends Car {
	private $forsaje;
}

class MercedesX200 extends Mercedes {

	const STATUS_IN_PROCESS = 10;

	private $color = "red";
	private $stopColorList = [
		"white",
		"green"
	];

	public function __construct() {

	}

	protected function move() {
		//logic 2
	}

	public function setColor($color) {
		if (!in_array($color, $this->stopColorList)) {
			$this->checkColorAvailibility();
			$this->color = $color;
		}
	}

	public function getColor() {
		return $this->color;
	}
}

$merc = new MercedesX200(); // Movable, Car, Mercedes, MercedesX200
$merc->setColor("black");
$merc->move();
echo $merc->getColor();

function Go(Car $car) {

}

Go($merc);

function parser(Parser $parser) {
	$parser->run();
}

$parserCurl = new ParserCurl();
$parserFile = new ParserFile();
$parserSocket = new ParserSocket();

parser($parserCurl);
parser($parserFile);
parser($parserSocket);

class Type
{
    const TRANSFER = 10;
    const SEPA_TRANSFER = 11;
    const SAVINGS_TRANSFER = 12;

    const SEPA_DIRECTDEBIT = 20;

    // Codes indicating transfers by the bank.
    const BANK_COSTS = 30;
    const BANK_INTEREST = 31;

    const ATM_WITHDRAWAL = 40;
    const PAYMENT_TERMINAL = 50;
    const UNKNOWN = 99;
}

Type::TRANSFER;