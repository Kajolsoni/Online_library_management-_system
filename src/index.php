<?php
	require "db_connect.php";
	require "header.php";
	session_start();
	
	if(empty($_SESSION['type']));
	else if(strcmp($_SESSION['type'], "librarian") == 0)
		header("Location: librarian/home.php");
	else if(strcmp($_SESSION['type'], "member") == 0)
		header("Location: member/home.php");
?>

<html>
	<head >
		<title>Waltair Library</title>
		<link rel="stylesheet" type="text/css" href="css/index_style.css" />
	</head>
	<body style="background-image: url(img/x.jpg); background-size: cover;">
		<div id="allTheThings">
			<div id="member">
				<a href="member" style="color: yellow">
					<img src="img/ic_member.png" width="250px" height="auto"/><br />
					&nbsp;Member
				</a>
			</div>
			<div id="verticalLine">
				<div id="librarian">
					<a id="librarian-link" href="librarian" style="color: yellow">
						<img src="img/ic_librarian.png" width="250px" height="auto" /><br />
						&nbsp;&nbsp;&nbsp;Librarian
					</a>
				</div>
			</div>
		</div>
	</body>
</html>