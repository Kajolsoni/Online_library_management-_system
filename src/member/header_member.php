<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/header_member_style.css" />
	</head>
	<body style="background-color: #F2F5A9">
		<header>
			<div id="cd-logo">
				<a href="../">
					<img src="img/ic_logo.svg" alt="Logo" />
					<p>BOOKFLIX</p>
				</a>
			</div>
			
			<div class="dropdown">
				<button class="dropbtn">
					<p id="librarian-name"><?php echo $_SESSION['username'] ?></p>
				</button>
				<div class="dropdown-content">
					<a>
						<?php
							$query = $con->prepare("SELECT balance FROM member WHERE username = ?;");
							$query->bind_param("s", $_SESSION['username']);
							$query->execute();
							$balance = (int)$query->get_result()->fetch_array()[0];
							echo "Balance: $".$balance;
						?>
					</a>
					<a href="my_books.php">My books</a>
					<a href="../logout.php">Logout</a>
				</div>
			</div>
		</header>
	</body>
</html>