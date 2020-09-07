<?php

namespace application\service;

use \application\service\View;
use \application\service\Config;
use \application\service\Request;
use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;

class Application
{

	public static $app = null;
	private
		$view,
		$config,
		$request,
		$logger;

	private function __construct()
	{

		$this->view = new View();
		$this->config = new Config();
		$this->request = new Request();

		$this->logger = new Logger('common');
		$this->logger->pushHandler(new StreamHandler(BASE_PATH . '/logs/common.log', Logger::WARNING));
	}

	private function __clone()
	{
	}

	public static function get()
	{
		if (is_null(self::$app)) {
			self::$app = new Application();
		}

		return self::$app;
	}

	/**
	 * Для ренедера наших темплейтов
	 * Например $this->view->render("home/index", []);
	 */
	public static function view()
	{
		return self::get()->view;
	}

	/**
	 * Для получения данных из конфигурации
	 * Например: данные для подключения к БД
	 * $this->config->get("db");
	 */
	public static function config()
	{
		return self::get()->config;
	}

	/**
	 * Для получения $_GET и $_POST данных
	 * Например: $this->request->get("path"); -> $_GET["path"]
	 * Например: $this->request->post("login"); -> $_POST["login"]
	 * Например: Application::get()->request->get("path"); -> $_GET["path"]
	 */
	public static function request()
	{
		return self::get()->request;
	}

	public static function logger()
	{
		return self::get()->logger;
	}

	/**
	 * Необходим для поиска нужного контроллера и экшна
	 * /?path=home/index
	 * controller = home
	 * action = index
	 */
	public function dispatch()
	{

		try {

			if ($_SERVER['REQUEST_URI'] == "/") {
				$this->request->set("path", "home/index");
			}

			if (!$this->request->data("path")) {
				throw new \Exception("Wrong URL format " . $_SERVER['REQUEST_URI']);
			}

			list(
				$controller,
				$action
			) = explode("/", $this->request->data("path"));

			$class = '\\application\\controller\\' . ucfirst($controller) . "Controller";

			if (!class_exists($class)) {
				throw new \Exception("Class " . $class . " doesn't exist");
			}

			$controller = new $class;

			if (!method_exists($controller, "action_" . $action)) {
				throw new \Exception("Action action_" . $action . " doesn't exist");
			}

			$result = $controller->{"action_" . $action}();
		} catch (\Exception $ex) {
			$this->logger->error($ex->getMessage());
			$this->view->render("error500");
		}
	}
}
