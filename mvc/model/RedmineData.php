<?php

namespace mvc\model;
require_once './../../php-redmine-api-master/lib/autoload.php';

class RedmineData 
{

	function __construct() {

		$client = new \Redmine\Client('http://172.16.40.7/redmine/', 'dde22e933f2ff4f14dc4afcf15d91ea7efb706b9');
		$this->issues = $client->issue->all(['project_id' => 61, 'tracker_id' => 2]);
	}

	public function getSCSBranch($gitBranch) {

		$scsBranch	= strstr((string)$gitBranch, "SCS");
		if ($scsBranch == '') {
			$scsBranch = $gitBranch;
		}
		return $scsBranch;
	}

	public function checkGitBranch($gitBranch) {

		$scsBranch	= $this->getSCSBranch($gitBranch);
		foreach ($this->issues['issues'] as $issue) {
			if (strpos($issue['subject'], $scsBranch) !== false) {
				return true;
			}
		}
		return false;
	}

	public function getInfoOfTicket($gitBranch) {

		$result['gitBranch'] = $gitBranch;
		$result['scsBranch'] = $this->getSCSBranch($gitBranch);
		$scsBranch	= $this->getSCSBranch($gitBranch);
		$result['comment'] = '';
		foreach ($this->issues['issues'] as $issue) {
			if (strpos($issue['subject'], $scsBranch) !== false) {
				$result['comment'] = $issue['subject'];
			}
		}
		return $result;
	}
}