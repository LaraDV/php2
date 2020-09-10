<?php

namespace tests;

use application\controller\HomeController;
use tests\BaseTest;

final class HomeControllerTest extends BaseTest {
    public function testIndex() {
    	
        $controller = new HomeController();

        $output = $this->request("GET", $controller, "action_index");
        $expected = "<h2>ГЛАВНАЯ</h2>";
        $this->assertContains($expected, $output);
    }
}