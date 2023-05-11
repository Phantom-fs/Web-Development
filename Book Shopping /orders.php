<!DOCTYPE html>
<html>
<head>
	<title>Books Bought</title>
	<link rel="stylesheet" type="text/css" href="style_or.css">
</head>
<body>
    <div class="navbar">
		<div class="nav-item">
			<a href="home page.php">Home</a>
		</div>
		<div class="nav-item">
			<a href="#">Orders</a>
		</div>
	</div>

	<div class="container">
		<h1 align="center">Books Bought</h1>
		<form action="" method="post">
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" required>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required>
			<button type="submit" name="submit">View Books Bought</button>
		</form>
		<div class="book-grid">
			<?php
				// Connect to the database
                //*ENTER YOUR DATABASE PASSWORD & NAME */
				$conn = mysqli_connect("localhost", "root", "pass", "book_shopping");

				// Get the customer's orders
				if (isset($_POST['submit'])) 
                {
					$name = $_POST['name'];
					$email = $_POST['email'];
					$sql = "SELECT * FROM orders WHERE customer_name='$name' AND customer_email='$email'";
					$result = mysqli_query($conn, $sql);

					// Display the books bought
					if (mysqli_num_rows($result) > 0) 
                    {
						while ($row = mysqli_fetch_assoc($result)) 
                        {
							$book_id = $row['book_id'];
							$sql = "SELECT * FROM books WHERE book_id='$book_id'";
							$book_result = mysqli_query($conn, $sql);
							$book_row = mysqli_fetch_assoc($book_result);

							echo '<div class="book-container">';
							echo '<div class="book-title">' . $book_row['title'] . '</div>';
							echo '<div class="book-author">' . $book_row['author'] . '</div>';
							echo '<div class="book-description">' . $book_row['description'] . '</div>';
							echo '<div class="book-price">Price: Rs.' . $book_row['price'] . '</div>';
							echo '</div>';
						}
					} 
                    
                    else 
                    {
						echo '<p>No books found.</p>';
					}
				}

				// Close the database connection
				mysqli_close($conn);
			?>
		</div>
	</div>
</body>
</html>