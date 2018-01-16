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

$editcheck 	= 0;
if (isset($_POST["editcheck"])) {
	$editcheck = $_POST["editcheck"];
}

header("Content-type: text/html");
header("Content-Disposition: attachment;Filename=merge_branch_$scsBranch-to_develop_$today.txt");

echo "Merge branch $gitBranch to develop \r\n\r\n";
echo "1. Checkout branch $gitBranch \r\n";
echo "$ git checkout $gitBranch \r\n";
echo "$ git pull origin $gitBranch \r\n";
echo "$ git status \r\n\r\n";

echo "2. Checkout branch develop \r\n";
echo "$ git checkout develop \r\n";
echo "$ git pull origin develop \r\n";
echo "$ git status \r\n\r\n";

echo "3. Merge branch $gitBranch to develop \r\n";
echo "$ git merge --no-ff $gitBranch \r\n";
echo "$ git status \r\n\r\n";

echo "4. Fix conflicted files (if have) \r\n";
echo "- resolve conflicted files \r\n";
echo "- fix conflict \r\n";
echo "- show diff \r\n";
echo "$ git diff {file_path} \r\n\r\n";

echo "5. Commit & push \r\n";
echo "$ git commit -a -m '$comment' \r\n";
echo "$ git push origin develop \r\n";
echo "$ git status \r\n\r\n";

echo "6. Update stg by devtool \r\n";
echo "Access devetool \r\n";
echo "http://stgmente.stockcontrol.jp/devtool.php \r\n";
echo "- At 「STAGE ステータス」 Click 実行 \r\n";
echo "- At 「STAGE アップデート」 Click 実行 \r\n\r\n";
if ($editcheck 	== 1) {
	echo "7. Edit .php.in/yml files \r\n";
	echo "- Connect to STG and edit yml and php.ini files  \r\n";
	echo "- Back to devtool \r\n";
	echo "At 「STAGE アップデート」 Click 実行  \r\n";
}
?>