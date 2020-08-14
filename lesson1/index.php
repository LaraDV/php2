<?php

///Задания 1-4 Лестницы (id, высота, количество ступенек)--- наследник посадочные лестницы (добавлено свойство тип топлива)
// class Stairs
// {

//     public $id;
//     public $height;
//     public $numberOfsteps;

//     public static $country = "Russia";

//     public function __construct(
//         int $id,
//         string $height,
//         string $numberOfsteps
//     ) {
//         $this->id = $id;
//         $this->title = $height;
//         $this->content = $numberOfsteps;
//     }

//     public function showChar()
//     {
//         echo 'Высота лестницы: ' . $this->height . 'Количество ступенек: ' . $this->numberOfsteps;
//         echo 'Страна-изготовитель' . self::$country;
//     }

//     public static function getCountry()
//     {
//         return self::$country;
//     }
// }

// class boardingStairs extends Stairs
// {
//     public $fuelType = "Diesel";
//     public function __construct(
//         int $id,
//         string $height,
//         string $numberOfsteps,
//         string $fuelType
//     ) {
//         parent::__construct($id, $height, $numberOfsteps);
//         $this->fuelType = $fuelType;
//     }
// }

//Задание 5
// class A {
//     public function foo() {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// $a1 = new A();
// $a2 = new A();
// $a1->foo();//1
// $a2->foo();//2
// $a1->foo();//3
// $a2->foo();//4
//$x - статическая переменная, присваивание $x = 0 выполняется только один раз.
//Значение помеченной переменной сохраняется после окончания работы функции, вызывая метод foo инкрементируем её же.


//Задание 6
//Немного изменим п.5:
// class A {
//     public function foo() {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// class B extends A {
// }
// $a1 = new A();
// $b1 = new B();
// $a1->foo();//1
// $b1->foo();//1
// $a1->foo();//2
// $b1->foo();//2

//Инкременируем две разные переменные.

//Задание 7. *Дан код. Что он выведет на каждом шаге? Почему?:
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
$a1->foo(); //инкрементирукем статическую переменную $x класса A
$b1->foo(); //инкрементирукем статическую переменную $x класса B
$a1->foo(); //инкрементирукем статическую переменную $x класса A
$b1->foo(); //инкрементирукем статическую переменную $x класса B