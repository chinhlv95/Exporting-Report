<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Get File Template</title>
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
	<div class="form-style">
		<h2>GENERATE SCS STG UPDATE MANUAL</h2>
		    <form method="POST" id="form" action="./mvc/view/index.php">
			    <input type="text" name="scsbranch" placeholder="TicketID/Git branch (Ex: SCS-3170)" required />
			    <label for="editcheck" class="edit-text">Edited php.in or yml files: </label>
			    <label class="radio-align"><input type="radio" name="editcheck" value="0" checked>No</label>
			    <label class="radio-align"><input type="radio" name="editcheck" value="1">Yes</label><br>
			    <input type="submit" value="GENERATE">
		    </form>
	</div>
</body>
</html>