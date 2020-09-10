<?php

namespace tests;

define("BASE_PATH", dirname(dirname(__FILE__)));
define("APP", dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."/application");

use PHPUnit\Framework\TestCase;
use application\service\Application as App;

abstract class BaseTest extends TestCase {

    protected function setUp() {
        App::get();
    }
    public function request($method, $controller, $action)
    {
        ob_start();
        $controller->$action();

        return ob_get_clean();
    }
    protected function tearDown()
    {
        
    }
}