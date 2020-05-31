<?php
	require "../db_connect.php";
	require "../message_display.php";
	require "verify_librarian.php";
	require "header_librarian.php";
?>

<html>
	<head>
		<title>Add book</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css" />
		<link rel="stylesheet" type="text/css" href="../css/form_styles.css" />
	</head>
	<body style="background-color: #F2F5A9">
		<form class="cd-form" method="POST" action="#">
			<legend>Enter book details</legend>
			
				<div class="error-message" id="error-message">
					<p id="error"></p>
				</div>
				<input class="b-isbn" id="b_isbn" type="number" name="b_isbn" placeholder="ISBN" required />
				<input class="b-title" type="text" name="b_title" placeholder="Title" required />
				<input class="b-author" type="text" name="b_author" placeholder="Author" required />
				<div>
				<h4>Category</h4>
						<select name="b_category">
							<option>Fiction</option>
							<option>Non-fiction</option>
							<option>Education</option>
						</select>
				</div>
				<input class="b-price" type="number" name="b_price" placeholder="Price" required />
				<input class="b-copies" type="number" name="b_copies" placeholder="Copies" required /><br>
				<input class="b-isbn" type="submit" name="b_add" value="Add book" />
		</form>
	<body>
	
	<?php
		if(isset($_POST['b_add']))
		{
			$query = $con->prepare("SELECT isbn FROM book WHERE isbn = ?;");
			$query->bind_param("s", $_POST['b_isbn']);
			$query->execute();
			
			if(mysqli_num_rows($query->get_result()) != 0)
				echo error_with_field("A book with that ISBN already exists", "b_isbn");
			else
			{
				$query = $con->prepare("INSERT INTO book VALUES(?, ?, ?, ?, ?, ?);");
				$query->bind_param("ssssdd", $_POST['b_isbn'], $_POST['b_title'], $_POST['b_author'], $_POST['b_category'], $_POST['b_price'], $_POST['b_copies']);
				
				if(!$query->execute())
					die(error_without_field("ERROR: Couldn't add book"));
				echo success("Successfully added book");
			}
		}
	?>
</html>