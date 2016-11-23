<?php
require_once("autoload.php");

class DetailController extends Controller {

	public function do_not_require_login() {
		return ['show'];
	}

	public function show(){
		$url = $_SERVER["REQUEST_URI"];
		$params = explode("/", $url);
		$picture_id = $params[2];

		$picture = Picture::find_by(['id' => $picture_id]);
		load_template("views/detail/show.php", [
			'path' => $picture->getPath(),
			'title' => $picture->getTitle(),
			'price' => $picture->getPrice(),
		]);
	}
}