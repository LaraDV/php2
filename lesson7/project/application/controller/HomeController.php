<?php

namespace application\controller;

use \application\controller\base\Controller;
use \application\service\Application as App;

class HomeController extends Controller {

	/**
	 * 1) site.com/home/index -> ?path=home/index
	 * 2) App::dispatch -> controller = HomeController, action = action_index
	 */
	public function action_index() {
		App::view()->render("home/index");
	}

	/**
	 * 1) site.com/home/contact -> ?path=home/contact
	 * 2) App::dispatch -> controller = HomeController, action = action_contact
	 */
	// public function action_contact() {

	// 	$result = null;
	// 	if (App::request()->isPost()) {

	// 		$name = App::request()->post("name");
	// 		$email = App::request()->post("email");
	// 		$message = App::request()->post("message");
	// 		$receoient = $this->defineEmailAddress();

	// 		AppEmail::send(
	// 			$name,
	// 			$email,
	// 			$message
	// 		);

	// 		$result = "Your message has been successfully sent";
	// 	}

	// 	App::view()->render("contact", ["result"=>$result]);
	// }

	// private function defineEmailAddress() {

	// }
}