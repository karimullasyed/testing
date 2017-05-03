<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Session</title>

	
</head>
<body>

<div id="container">
	<h1>Welcome to Session</h1>

	<div id="body">
	<?php echo $this->session->userdata['my_name'];?>
		
	</div>
</div>

</body>
</html>