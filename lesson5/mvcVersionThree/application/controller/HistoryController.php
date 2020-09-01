<?php

namespace application\controller;

use \application\service\Service;
use \application\controller\BaseController;

class HistoryController extends BaseController {

	public function before() {
		parent::before();
		return true;
	}

	public function action_index() {
		return $this->view->render("history/index");
	}
}