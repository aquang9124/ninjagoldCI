<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ninja Money</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<!-- jQuery Library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<style type="text/css">
	html, body {
		height: 100%;
		width: 100%;
	}
	.container-fluid {
		padding-top: 20px;
	}
	.yourgold {
		display: inline-block;
		width: 8%;
	}
	.getmoney {
		width: 10%;
		border: 1px solid black;
		display: inline-block;
		text-align: center;
		vertical-align: top;
		min-height: 20px;
	}
	.subcontents {
		border: 1px solid black;
		min-height: 150px;
		padding-top: 15px;
		
	}
	.desc {
		font-weight: bold;
		text-align: center;
	}
	.row {
		margin-left: 10px;
		margin-right: 10px;
	}
	form {
		text-align: center;
	}
	.click-gold {
		box-shadow: 1px 2px 2px black;
		border: 1px solid black;
		background-color: white;
	}
	.activity-log {
		border: 1px solid black;
		overflow: auto;
		max-height: 300px;
		min-height: 300px;
	}
	.activities {
		margin-top: 10px;
		margin-bottom: 5px;
	}
	.success {
		color: green;
	}
	.fail {
		color: red;
	}
	.btn {
		float: right;
		margin-top: 20px;
	}
</style>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<p class="yourgold">Your Gold: <div class="getmoney"><?= $golds ?></div></p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-lg-3 subcontents">
				<form action="process_money" method="post" role="form">
					<p class="desc">Farm</p>
					<p>(Earns 10-20 golds)</p>
					<input type="hidden" name="building" value="farm">
					<input class="click-gold" type="submit" value="Find Gold!">
				</form>
			</div>
			<div class="col-md-3 col-lg-3 subcontents">
				<form action="process_money" method="post" role="form">
					<p class="desc">Cave</p>
					<p>(Earns 5-10 golds)</p>
					<input type="hidden" name="building" value="cave">
					<input class="click-gold" type="submit" value="Find Gold!">
				</form>
			</div>
			<div class="col-md-3 col-lg-3 subcontents">
				<form action="process_money" method="post" role="form">
					<p class="desc">House</p>
					<p>(Earns 2-5 golds)</p>
					<input type="hidden" name="building" value="house">
					<input class="click-gold" type="submit" value="Find Gold!">
				</form>
			</div>
			<div class="col-md-3 col-lg-3 subcontents">
				<form action="process_money" method="post" role="form">
					<p class="desc">Casino</p>
					<p>(Earn/Lose 0-50 golds)</p>
					<input type="hidden" name="building" value="casino">
					<input class="click-gold" type="submit" value="Find Gold!">
				</form>
			</div>
		</div>
		<div class="row">
			<p class="activities">Activities: </p>
			<div class="col-md-12 col-lg-12 col-sm-12 activity-log">
			<?php
				if (isset($active_log))
				{
					echo $active_log;
				}
				else 
				{
					echo "Nothing has happened!";
				}
			?>
			</div>
		</div>
		<div class="row">
			<form action="reset" method="post" role="form">
				<a href="reset"><button class="btn btn-danger">Reset</button></a>
			</form>
		</div>
	</div>
</body>
</html>