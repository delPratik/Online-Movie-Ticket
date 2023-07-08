CREATE TABLE movie (
  id INT AUTO_INCREMENT,
  name VARCHAR(255),
  release_date DATE,
  poster VARCHAR(255),
  PRIMARY KEY (id)
);


CREATE TABLE admin (
  id INT AUTO_INCREMENT,
  email VARCHAR(255),
  password VARCHAR(255),
  PRIMARY KEY (id)
);

CREATE TABLE client (
  id INT AUTO_INCREMENT,
  name VARCHAR(255),
  phone_number VARCHAR(10),
  email VARCHAR(255),
  password VARCHAR(255),
  PRIMARY KEY (id)
);

INSERT INTO  admin (email, password) VALUES
('admin@example.com','admin');

INSERT INTO client (name, phone_number, email, password) VALUES
('Faf Du Plesis','9807307300','faf@client.com','clientfaf');


INSERT INTO movie (name, release_date, poster) VALUES
  ('Jaari', '2023-04-14', 'jaari.jpg'),
  ('SatyaPrem Ki Katha', '2023-06-29', 'satya.jpg'),
  ('Insidious: The Red Door', '2023-07-07', 'insidious.jpg'),
  ('Oppenheimer', '2023-07-21', 'oppenheimer.jpg'),
  ('Barbie', '2023-07-21', 'barbie.jpg'),
  ('Rocky Aur Rani Ki Prem Kahani', '2023-07-28', 'rocky.jpg');


