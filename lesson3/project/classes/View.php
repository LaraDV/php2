<?php

namespace Classes;

class View
{

	private $tEngine; //это объект твига(см ниже)

	public function __construct(\Twig_Environment $engine)
	{
		$this->tEngine = $engine; //принимает объект Twig_Environment и сохраняет у себя в свойтсве
	}

	public function render($template, $params)
	/**принимает в себя темплейт и плейсхолдеры и делегирует */
	{
		$template = $this->tEngine->loadTemplate($template . ".tmpl"); //file_get_contents
		echo $template->render($params);
	}
}
/**public function render($name, array $context = [])//функция render() под капотом \Twig_Environment
    {
        return $this->loadTemplate($name)->render($context);
    } */
