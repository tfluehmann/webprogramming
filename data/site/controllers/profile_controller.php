<?php
/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 23/11/16
 * Time: 01:59
 */
require_once("autoload.php");

class ProfileController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function show() {
		$lang = get_language();
		$pictures = Picture::where(['deleted' => ['value' => '0', 'comparator' => '='], 'owner_id' => ['value' => current_user()->getId(), 'comparator' => '=']], ['AND'], null, null);
		$my_pictures = Localization::find_by(["qualifier" => "my_pictures", 'lang' => $lang])->getValue();
		$no_pictures = Localization::find_by(['qualifier' => 'no_pictures', 'lang' => $lang])->getValue();
		$no_orders = Localization::find_by(["qualifier" => "no_orders", 'lang' => $lang])->getValue();
		$my_orders = Localization::find_by(["qualifier" => "my_orders", 'lang' => $lang])->getValue();
		$upload = Localization::find_by(["qualifier" => "upload", 'lang' => $lang])->getValue();
		$edit_profile = Localization::find_by(["qualifier" => "edit", 'lang' => $lang])->getValue();
		$translations = [];
		foreach (['budget', 'edit_profile', 'my_pictures', 'no_pictures', 'no_orders', 'my_orders', 'upload', 'edit'] as $translate) {
			$translations["lang_$translate"] = Localization::find_by(['lang' => get_language(), 'qualifier' => $translate])->getValue();
		}
		load_template("views/profile/show.php", array_merge([
			'user' => current_user(),
			'pictures' => $pictures,
			'orders' => current_user()->orders(),
			'no_pictures' => $no_pictures,
			'my_pictures' => $my_pictures,
			'no_orders' => $no_orders,
			'my_orders' => $my_orders,
			'edit' => $edit_profile,
			'upload' => $upload,
		], $translations));
	}
}