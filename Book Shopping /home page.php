<!DOCTYPE html>
<html>
<head>
	<title>Bookstore Home Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="navbar">
		<div class="nav-item">
			<a href="#">Home</a>
		</div>
		<div class="nav-item">
            <a href="orders.php">Orders</a>
		</div>
	</div>

	<div class="container">
		<h1 align="center">Welcome to Bookstore</h1>
		<p align="center">We have a wide range of books for you to choose from. Browse our selection below and find your next favorite read!</p>
		<div class="book-grid">
			<?php
                // Connect to the database
                //*ENTER YOUR DATABASE PASSWORD & NAME */
                $mysqli = new mysqli("localhost", "root", "pass", "book_shopping");
                $conn = $mysqli;

                // Check connection
                if (!$conn) 
                {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Get all the books from the database
                $sql = "SELECT * FROM books";
                $result = mysqli_query($conn, $sql);

                // Loop through each book and display it in a container
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    echo '<div class="book-container">';
                    echo '<div class="book-title">' . $row['title'] . '</div>';
                    echo '<div class="book-author">' . $row['author'] . '</div>';
                    echo '<div class="book-description">' . $row['description'] . '</div>';
                    echo '<div class="book-price">' . $row['price'] . '</div>';
                    echo '<div class="buy-button"><a href="payment.php?book_id=' . $row['book_id'] . '">Buy Now</a></div>';
                    echo '</div>';
                }

                // Close the database connection
                mysqli_close($conn);
            ?>
		</div>
	</div>
</body>
</html>