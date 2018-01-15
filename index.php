<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Get File Template</title>
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
	<div class="form-style">
		<h2>Get Template</h2>
		    <form method="POST" action="./mvc/view/index.php">
			    <input type="text" name="gitbranch" placeholder="TicketID/Git branch" required />
			    <label for="editcheck" class="edit-text">Edited php.in or yml files: </label>
			    <label class="radio-align"><input type="radio" name="editcheck" value="0" checked>No</label>
			    <label class="radio-align"><input type="radio" name="editcheck" value="1">Yes</label><br>
			    <input type="submit" value="Get">
		    </form>
	</div>
</body>
<script src="public/js/script.js"></script>
</html>