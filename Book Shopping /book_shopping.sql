CREATE DATABASE book_shopping;

USE book_shopping;
-- SELECT * FROM orders;
-- DROP database book_shopping;

CREATE TABLE books 
(
  book_id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(100) NOT NULL,
  author VARCHAR(50) NOT NULL,
  description VARCHAR(500),
  price DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (book_id)
);

CREATE TABLE orders 
(
  order_id INT NOT NULL AUTO_INCREMENT,
  book_id INT NOT NULL,
  upi_id VARCHAR(50) NOT NULL,
  customer_name VARCHAR(50) NOT NULL,
  customer_email VARCHAR(100) NOT NULL,
  order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  total DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (order_id),
  FOREIGN KEY (book_id) REFERENCES books(book_id)
);

-- data insertion
INSERT INTO books (title, author, description, price) VALUES
('The Great Gatsby', 'F. Scott Fitzgerald', 'A novel about the American Dream', 9.99),
('To Kill a Mockingbird', 'Harper Lee', 'A novel about racial injustice in the American South', 12.99),
('1984', 'George Orwell', 'A dystopian novel about a totalitarian government', 8.99),
('Pride and Prejudice', 'Jane Austen', 'A novel about societal expectations in Georgian England', 6.99),
('The Catcher in the Rye', 'J.D. Salinger', 'A coming-of-age novel about a teenage boy in New York City', 10.99),
('Brave New World', 'Aldous Huxley', 'A dystopian novel about a future society', 7.99),
('The Hobbit', 'J.R.R. Tolkien', 'A fantasy novel about a hobbit who goes on an adventure', 11.99),
('The Lord of the Rings', 'J.R.R. Tolkien', 'A fantasy trilogy about a quest to destroy an evil ring', 29.99),
('Jane Eyre', 'Charlotte Bronte', 'A novel about a governess and her tumultuous relationship with her employer', 8.99),
('Wuthering Heights', 'Emily Bronte', 'A novel about the destructive power of love', 7.99),
('The Adventures of Sherlock Holmes', 'Arthur Conan Doyle', 'A collection of detective stories', 9.99),
('The Picture of Dorian Gray', 'Oscar Wilde', 'A novel about a man who sells his soul for eternal youth', 6.99),
('Dracula', 'Bram Stoker', 'A horror novel about a vampire', 8.99),
('Frankenstein', 'Mary Shelley', 'A science fiction novel about a scientist who creates a monster', 7.99),
('The War of the Worlds', 'H.G. Wells', 'A science fiction novel about a Martian invasion', 10.99),
('The Hitchhiker\'s Guide to the Galaxy', 'Douglas Adams', 'A science fiction comedy about a man who travels the universe', 12.99),
('The Diary of a Young Girl', 'Anne Frank', 'A diary about a young girl during the Holocaust', 5.99),
('One Hundred Years of Solitude', 'Gabriel Garcia Marquez', 'A magical realist novel about a family in Colombia', 11.99),
('The Name of the Rose', 'Umberto Eco', 'A historical murder mystery set in a monastery', 9.99),
('The Alchemist', 'Paulo Coelho', 'A novel about a shepherd who seeks his destiny', 7.99),
('The Hunger Games', 'Suzanne Collins', 'A dystopian novel about a society that forces children to fight to the death', 13.99),
('Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling', 'A fantasy novel about a young boy who discovers he is a wizard', 14.99),
('Gone with the Wind', 'Margaret Mitchell', 'A novel about a woman during the American Civil War', 10.99),
('The God of Small Things', 'Arundhati Roy', 'A novel about a family in Kerala, India', 9.99),
('The Color Purple', 'Alice Walker', 'A novel about a woman in the American South', 8.99);