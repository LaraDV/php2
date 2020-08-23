<?php

namespace Classes;

class Application
{

	private $view;

	public function __construct(View $view)
	{
		$this->view = $view;
	}

	public function index(){
		$name = "Aleksej";
		$pages = [
			"images",
		];
		$this->view->render("index", array(
			'name' 		=> $name,
			'pages'		=> $pages
		));
	}

	public function images($dbh)
	{

		$sql = "SELECT id_images, image_name, image_size FROM images";
		$sth = $dbh->query($sql);
		while ($row = $sth->fetchObject()) {
			$data[] = $row;
		}
		unset($dbh);
		$images = $data;

		// var_dump($images);

		$this->view->render("images", array(
			'images' => $images
		));
	}

	public function imagepage($dbh){
		// var_dump($_GET['id_images']);
				$sql = "SELECT * FROM images WHERE id_images = " . $_GET['id_images'];
				$sth = $dbh->query($sql);
				$image = $sth->fetchObject();
				unset($dbh);
				// var_dump($image);
			$this->view->render("imagepage", array(
				'image' => $image
			));
		}
}
