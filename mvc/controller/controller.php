<?php

namespace mvc\view;
use mvc\model\RedmineData;
use mvc\model\Report;
require_once("./../../mvc/model/RedmineData.php");
require_once("./../../mvc/model/Report.php");

$today = date("Ymd");
$config = include('./../../config/config.php');
if (isset($_POST["from-date"])) {
	$startDate 	= $_POST["from-date"];
} else {
	$startDate	= "";
}

if (isset($_POST["to-date"])) {
	$dueDate 	= $_POST["to-date"];
} else {
	$dueDate	= "";
}

$redmineData 	= new \mvc\model\RedmineData($config['redmine_url'], $config['redmine_api_key']);
$report 		= new \Report();

$project1Id 	= $config['project_id_1'];
$project2Id 	= $config['project_id_2'];

$timeEntryParam1 = array('from' 		=> $startDate,
				    	'to' 			=> $dueDate,
				    	'project_id' 	=> $project1Id,
				    	'offset'		=> 0,
				    	'limit' 		=> 100);
$timeEntryParam2 = array('from' 		=> $startDate,
				    	'to' 			=> $dueDate,
				    	'project_id' 	=> $project2Id,
				    	'offset'		=> 0,
				    	'limit' 		=> 100);
$timeEntries 	= array();
$redmineData->getTimeEntries($startDate, $dueDate, $timeEntryParam1, $timeEntryParam2, $timeEntries);

$issueParam1 	= array('project_id' 	=> $project1Id,
						'offset'		=> 0,
				    	'limit' 		=> 100,
				    	'sort' 			=> 'id');
$issueParam2 	= array('project_id' 	=> $project2Id,
						'offset'		=> 0,
				    	'limit' 		=> 100,
				    	'sort' 			=> 'id');
$issueClosedParam1 	= array('project_id' => $project1Id,
						'offset'		=> 0,
				    	'limit' 		=> 100,
				    	'status_id' 	=> 'closed',
				    	'sort' 			=> 'id');
$issueClosedParam2 	= array('project_id' => $project2Id,
						'offset'		=> 0,
				    	'limit' 		=> 100,
				    	'status_id' 	=> 'closed',
				    	'sort' 			=> 'id');
$issues = array();
$redmineData->getIssue($issueParam1, $issueParam2, $issueClosedParam1, $issueClosedParam2, $issues);

$reportData 	= array();
$reportData 	= $report->getReportData($issues, $timeEntries);
$report->exportReportFile($startDate, $dueDate, $reportData);

