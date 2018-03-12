<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Export Report</title>
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
	<div class="form-style">
		<h2>Export Report</h2>
		    <form method="POST" id="form" action="./mvc/controller/controller.php">
		    	<label for="editcheck" class="edit-text">From Date: </label>
			    <input type="date" name="from-date" style="margin-left: 20px" required /><br>
			    <label for="editcheck" class="edit-text">To Date: </label>
			    <input type="date" name="to-date" style="margin-left: 40px" required /><br>
			    <input type="submit" value="Export">
		    </form>
	</div>
</body>
</html>
