<?php

namespace mvc\model;
require_once './../../php-redmine-api-master/lib/autoload.php';

class RedmineData 
{

	function __construct() {
		$config 	  = include('./../../config/config.php');
		$client 	  = new \Redmine\Client($config['redmine_url'], $config['redmine_api_key']);
		$this->issues = $client->issue->all(['project_id' => $config['project_id'], 'tracker_id' => $config['tracker_id']]);
	}

	public function getGitBranch($scsBranch) {

		$gitBranch = 'feature/' . $scsBranch;
		return $gitBranch;
	}

	public function getInfoOfTicket($scsBranch) {

		$scsBranch 			 = strstr( $scsBranch, 'SCS');
		$result['scsBranch'] = $scsBranch;
		$result['gitBranch'] = $this->getGitBranch($scsBranch);
		$result['comment'] 	 = '';
		foreach ($this->issues['issues'] as $issue) {
			if (strpos($issue['subject'], $scsBranch) !== false) {
				$result['comment'] = $issue['subject'];
			}
		}
		return $result;
	}
}