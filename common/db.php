<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "discuss";

$conn = new mysqli($host, $username, $password);
if ($conn->connect_error) {
    echo "not connected!";
    exit();
}

//DATABASE QUERY
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if ($conn->query($sql) === FALSE) {
    echo "Error creating database: " . $conn->error . "<br>";
}

$conn->select_db($dbname);


//TABLE QUERIES
$create_category_table = "CREATE TABLE IF NOT EXISTS category(
    id INT(30) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(256) NOT NULL
)";

$create_users_table = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(256) NOT NULL,
    email VARCHAR(256) NOT NULL UNIQUE,
    password VARCHAR(256) NOT NULL
)";

$create_questions_table = "CREATE TABLE IF NOT EXISTS questions (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description VARCHAR(300) NOT NULL,
    category_id INT(10) NOT NULL,
    user_id INT(10) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE CASCADE
)";

$create_answers_table = "CREATE TABLE IF NOT EXISTS answers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question_id INT NOT NULL,
    user_id INT NOT NULL,
    answer TEXT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE
)";


// Execute table creation
if ($conn->query($create_category_table) === FALSE) {
    echo "Error creating category table: " . $conn->error . "<br>";
}

if ($conn->query($create_users_table) === FALSE) {
    echo "Error creating users table: " . $conn->error . "<br>";
}

if ($conn->query($create_questions_table) === FALSE) {
    echo "Error creating questions table: " . $conn->error . "<br>";
}

if ($conn->query($create_answers_table) === FALSE) {
    echo "Error creating answers table: " . $conn->error . "<br>";
}

?>
