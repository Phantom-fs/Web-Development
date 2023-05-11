<!DOCTYPE html>
<html>
<head>
	<title>Payment Page</title>
	<link rel="stylesheet" type="text/css" href="style_py.css">
</head>
<body>
	<div class="navbar">
		<div class="nav-item">
			<a href="home page.php">Home</a>
		</div>
		<div class="nav-item">
			<a href="orders.php">Orders</a>
		</div>
	</div>

	<div class="container">
		<h1 class="page-title">Payment Page</h1>
		<div class="payment-form">
		<?php
			// Check if book ID is provided in URL
			if (isset($_GET['book_id'])) 
			{
    
				// Connect to the database
                //*ENTER YOUR DATABASE PASSWORD & NAME */
				$conn = mysqli_connect("localhost", "root", "pass", "book_shopping");
    
				// Check connection
    			if (!$conn) 
    			{
        			die("Connection failed: " . mysqli_connect_error());
    			}

				// Get book details from the database
				$book_id = $_GET['book_id'];
				$sql = "SELECT * FROM books WHERE book_id = $book_id";
				$result = mysqli_query($conn, $sql);

				// Check if book exists
				if (mysqli_num_rows($result) > 0) 
				{
					$row = mysqli_fetch_assoc($result);

					// Display book details and payment form
					echo '<div class="book-details">';
					echo '<div class="book-title">Title: ' . $row['title'] . '</div>';
					echo '<div class="book-author">Author: ' . $row['author'] . '</div>';
					echo '<div class="book-description">Description: ' . $row['description'] . '</div>';
					echo '<div class="book-price">Price: Rs.' . $row['price'] . '</div>';
					echo '</div>';

					echo '<form action="" method="post">';
					echo '<input type="hidden" name="book_id" value="' . $book_id . '">';
					echo '<input type="text" name="name" placeholder="Name" required>';
					echo '<input type="email" name="email" placeholder="Email" required>';
					echo '<input type="text" name="upi_id" placeholder="UPI ID" required>';
					echo '<input type="number" name="quantity" placeholder="Quantity" required>';
					echo '<button type="submit" name="submit">Pay Now</button>';
					echo '</form>';

					// Process payment and update the database
					if (isset($_POST['submit'])) 
					{
						// Get form data
						$book_id = $_POST['book_id'];
						$name = $_POST['name'];
						$email = $_POST['email'];
						$upi_id = $_POST['upi_id'];
						$quantity = $_POST['quantity'];
						$total = $quantity * $row['price'];

						// Insert order details into the database
						$sql = "INSERT INTO orders (book_id, upi_id, customer_name, customer_email, total) VALUES ($book_id, '$upi_id', '$name', '$email', $total)";

						if (mysqli_query($conn, $sql)) 
						{
							echo '<p>Order placed successfully.</p>';
						} 
						else 
						{
							echo '<p>Error placing order: ' . mysqli_error($conn) . '</p>';
						}
					}
				} 
				else 
				{
					echo '<p>Book not found.</p>';
				}

				// Close the database connection
				mysqli_close($conn);
			} 
			else 
			{
				echo '<p>Book ID not provided.</p>';
			}
		?>
		</div>
	</div>
</body>
</html>
