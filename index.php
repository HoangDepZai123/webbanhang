<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/9574192529.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<title>Web Clothes</title>
</head>
<body>
	<div class="wrapper">

		<?php
		session_start();
		include("admincp/config/config.php");
		include("pages/header.php");
		include("pages/menu.php");
		include("pages/main.php");
		include("pages/footer.php");
		?>
		
	
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script types="text/javascript">
		$(document).ready(function() {

		var back = $(".prev");
		var next = $(".next");
		var steps = $(".step");

		next.bind("click", function() {
		
		$.each(steps, function(i) {
			if (!$(steps[i]).hasClass('current') && !$(steps[i]).hasClass('done')) {
			$(steps[i]).addClass('current');
			$(steps[i - 1]).removeClass('current').addClass('done');
			return false;
			}
		})
		});
		back.bind("click", function() {
		$.each(steps, function(i) {
			if ($(steps[i]).hasClass('done') && $(steps[i + 1]).hasClass('current')) {
			$(steps[i + 1]).removeClass('current');
			$(steps[i]).removeClass('done').addClass('current');
			return false;
			}
		})
		});

		}) -->
</script>
</body>
		
</html>