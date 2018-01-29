<?php

namespace mvc\view;
use mvc\model\RedmineData;
require_once("./../../mvc/model/RedmineData.php");

$today = date("Ymd");
if (isset($_POST["scsbranch"])) {
	$scsBranch 	= $_POST["scsbranch"];
} else {
	$scsBranch	= "";
}

$redmineData 	= new \mvc\model\RedmineData;
$data 			= $redmineData->getInfoOfTicket($scsBranch);
$scsBranch 		= $data['scsBranch'];
$gitBranch 		= $data['gitBranch'];
$comment 		= $data['comment'];

$editcheck = 0;
if (isset($_POST["editcheck"])) {
	$editcheck = $_POST["editcheck"];
}

$language = "english";
if (isset($_POST["language"])) {
	$language = $_POST["language"];
}

$template = "./" . $language . "_template.php";
include $template;

?>