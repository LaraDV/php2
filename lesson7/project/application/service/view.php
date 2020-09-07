<?php

namespace application\service;

class View {

	private $twig;

	public function __construct() {
		$loader = new \Twig_Loader_Filesystem(APP.DIRECTORY_SEPARATOR.'view');
		$this->twig = new \Twig_Environment($loader);
	}

	public function addGlobal($key, $value) {
		$this->twig->addGlobal($key, $value);
	}

	public function render($template, $params = []) {
		$template = $this->twig->loadTemplate($template.".tmpl");
		echo $template->render($params);
	}	
}