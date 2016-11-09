<?php
/**
 * Created by PhpStorm.
 * User: tgdflto1
 * Date: 04/10/16
 * Time: 21:04
 */

$lang = get_param('lang', 'de');
$categories = ["Home", "Detail", "Shit", "Upload", "Register"];
$translation = yaml_parse_file("languages.yml");
$trans = $translation['languages'][$lang];
$navigation = "<div class='navigation-placeholder'></div><nav class='nav'><ul>";
foreach ($categories as $category) {
	$navigation .= "<li class='category'><a href='/" . strtolower($category) . "'>" . $trans[strtolower($category)] . "</a></li>";
}



$site = get_param('site', 'home');
$clang = 'Deutsch';
$clangShort = 'de';
if ($lang == $clangShort) {
	$clang = 'English';
	$clangShort = 'en';
}
$navigation .= "</ul><br><br><br>";
$navigation .= "<div class='topten'><h4>Categories</h4><ul>";
$tags = Tag::all();
foreach($tags as $tag){
    $tag_name = $tag->getName();
    $tag_id = $tag->getId();
    $navigation .= "<li><a href='/tags/$tag_id'>$tag_name</a></li>";
}

$navigation .= "</ul></div>";


$navigation .= "<br /><br /><a href='old_index.php?site=$site&lang=$clangShort'>$clang</a></nav>";
echo $navigation;