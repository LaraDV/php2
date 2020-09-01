<?php

namespace application\service;

use \application\service\Service;

class FrontController
{

	protected
		$view,
		$config,
		$request,
		$session;

	public function __construct()
	{
		$this->session = Service::session();
		$this->view = Service::view();
		$this->config = Service::config();
		$this->request = Service::request();
	}

	protected function before()
	{
		return true;
	}

	protected function after()
	{
		return true;
	}

	/**
	 * /?path=controller/action
	 * Ex: /?path=home/index
	 */
	public function run()//dispatch
	{

		if ($_SERVER['REQUEST_URI'] == "/") {
			$this->request->set("path", "home/index");
		}

		if (is_null($this->request->get("path"))) {
			throw new \Exception("Wrong path");
		}

		//01:03:00
		list($controller, $action) = explode("/", $this->request->get("path"));//explode — Разбивает строку (/basket/delete&id={{item.basket_id}}) с помощью разделителя

		//HomeController
		$class = '\\application\\controller\\' . ucfirst($controller) . "Controller";//ucfirst — Преобразует первый символ строки в верхний регистр .../BasketController

		if (!class_exists($class)) {
			return $this->view->render("error500");
		}

		$controller = new $class;//

		if (!method_exists($controller, "action_" . $action)) {
			return $this->view->render("error500");//404
		}

		if (!$controller->before()) {//before() здесь вызовет метод класса BaseController или другого класса наследника если будет переопределен//устанавливает this.title из конфига и this.user из сессии
			return $this->view->render("error500");
		}

		$result = $controller->{"action_" . $action}();

		$controller->after();

		return $result;
	}
}
