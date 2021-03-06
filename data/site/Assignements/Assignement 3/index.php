<?php
/**
 * @author Jan Dellsberger, extended Tobias Flühmann
 */
session_start();

$url = $_SERVER["REQUEST_URI"];
$params = explode("/", $url);
require_once("includes/functions.php");

require_once("autoload.php");
require_once('db/init_db.php');
set_language();
if (sizeof($params) > 2 && in_array($params[2], $GLOBALS['languages'])) {
    $language = $params[1];
    $pageId = $params[2];
}else {
    $pageId = $params[1];
}

$pageId = explode("?", $pageId)[0];

if (!empty($pageId) && in_array($pageId, array_keys($GLOBALS['controllers']))) {
    $GLOBALS['page'] = $pageId;
} else {
    //crap
    echo $pageId;
    echo "<br>crap";
}
$method = determine_method();
$controller = get_controller($pageId);
if(!is_null($controller)){
		$controller->$method();
}else{
	echo "page not found.";
	die;
}
