CREATE TABLE Users (
  user_id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(255),
  email VARCHAR(255),
  password_hash VARCHAR(255),
  first_name VARCHAR(255),
  last_name VARCHAR(255),
  country VARCHAR(255),
  user_type VARCHAR(255)
);
CREATE TABLE Destinations (
  destination_id INT PRIMARY KEY AUTO_INCREMENT,
  destination_name VARCHAR(255),
  location VARCHAR(255),
  description TEXT,
  image_url VARCHAR(255)
);

CREATE TABLE Tours (
  tour_id INT PRIMARY KEY AUTO_INCREMENT,
  destination_id INT,
  tour_name VARCHAR(255),
  start_date DATE,
  end_date DATE,
  max_capacity INT,
  current_capacity INT,
  price DECIMAL(10, 2),
  FOREIGN KEY (destination_id) REFERENCES Destinations(destination_id)
);

CREATE TABLE Tourists (
  tourist_id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT,
  tour_id INT,
  FOREIGN KEY (user_id) REFERENCES Users(user_id),
  FOREIGN KEY (tour_id) REFERENCES Tours(tour_id)
);
CREATE TABLE Reviews (
  review_id INT PRIMARY KEY  AUTO_INCREMENT,
  tour_id INT,
  user_id INT,
  rating INT,
  review_text TEXT,
  image_url VARCHAR(255),
  FOREIGN KEY (tour_id) REFERENCES Tours(tour_id),
  FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE Articles (
  article_id INT PRIMARY KEY AUTO_INCREMENT,
  destination_id INT,
  title VARCHAR(255),
  content TEXT,
  author_id INT,
  publication_date DATE,
  FOREIGN KEY (destination_id) REFERENCES Destinations(destination_id),
  FOREIGN KEY (author_id) REFERENCES Users(user_id)
);













INSERT INTO Users (username, email, password_hash, first_name, last_name, user_type)
VALUES
('john_doe', 'john@example.com', 'hashed_password', 'John', 'Doe', 'Regular'),
('jane_smith', 'jane@example.com', 'hashed_password', 'Jane', 'Smith', 'Regular'),
('maria_garcia', 'maria@example.com', 'hashed_password', 'Maria', 'Garcia', 'Regular'),
('admin1', 'admin1@example.com', 'admin_password', 'Admin', 'Admin', 'Admin');

INSERT INTO Destinations (destination_name, location, description, image_url)
VALUES
('bromo', 'jawa timur', 'Beautiful mountain in malang', 'bromo_beaches.jpg'),
('gili trawang', 'NTB', 'Visit the famous beach in.', 'gili.jpg'),
('kepulauan seribu', 'Jakarta', 'Experience the iconic archipelago in jakarta.', 'pulau_seribu.jpg');

INSERT INTO Tours (destination_id, tour_name, start_date, end_date, max_capacity, current_capacity, price)
VALUES
(1, 'bromo', '2023-05-15', '2023-05-22', 20, 10, 500.00),
(2, 'gili trawang', '2023-06-10', '2023-06-18', 15, 5, 800.00),
(3, 'kepulauan seribu', '2023-07-01', '2023-07-07', 25, 15, 600.00);

INSERT INTO Tourists (user_id, tour_id)
VALUES
(1, 1),
(2, 1),
(3, 2);


INSERT INTO Reviews (tour_id, user_id, rating, review_text, image_url)
VALUES
(1, 1, 5, 'Great trip to bromo! Highly recommended.', 'review1.jpg'),
(1, 2, 4, 'Enjoyed the beaches, but crowded.', 'review2.jpg'),
(2, 3, 5, 'pulau seribu was fantastic!', 'review3.jpg');

INSERT INTO Articles (destination_id, title, content, author_id, publication_date)
VALUES
(1, 'bromo Travel Tips', 'Discover the best tips for Bali...', 1, '2023-05-10'),
(2, 'Exploring NTB', 'Tokyo, the city of technology...', 2, '2023-06-05'),
(3, 'pulua seribu tips', 'Experience the romance of Paris...', 3, '2023-07-01');