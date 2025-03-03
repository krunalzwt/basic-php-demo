<?php
include("../common/db.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["signup"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $query = "SELECT username, email FROM users WHERE username = '$username' OR email = '$email'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['username'] === $username) {
                    echo "Error: Username already exists!";
                }
                if ($row['email'] === $email) {
                    echo "Error: Email already exists!";
                }
            }
        } else {
            $user = $conn->prepare("
            INSERT INTO users
            (`username`, `email`, `password`) 
            VALUES 
            ('$username','$email','$password')");

            $result = $user->execute();
            // echo $user->insert_id;
            if ($result) {
                $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user->insert_id];
                header("location: /discuss");
            } else {
                echo "error creating user!";
            }
        }
    } else if (isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $username = "";
        $user_id = 0;
        $query = "select * from users where email='$email' and password='$password'";
        $result = $conn->query($query);
        if ($result->num_rows == 1) {
            foreach ($result as $row) {
                $username = $row['username'];
                $user_id = $row['id'];
            }
            echo $username;
            $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user_id];
            header("location: /discuss");
        } else {
            echo "Invalid Credentials!!";
        }
    } else if (isset($_POST["ask"])) {

        $title = $_POST["title"];
        $description = $_POST["description"];
        $category_id = $_POST["category"];
        $user_id = $_SESSION['user']['user_id'];

        $question = $conn->prepare("
        INSERT INTO questions
        (`title`, `description`, `category_id`,`user_id`) 
        VALUES 
        ('$title','$description','$category_id','$user_id')");

        $result = $question->execute();
        // echo $user->insert_id;
        if ($result) {
            header("location: /discuss");
        } else {
            echo "Question not added!";
        }
    } else if (isset($_POST["answer"])) {
        print_r($_POST);
        $answer = $_POST["answer"];
        $question_id = $_POST["question_id"];
        $user_id = $_SESSION['user']['user_id'];

        $query = $conn->prepare("
        INSERT INTO answers
        (`answer`, `question_id`,`user_id`) 
        VALUES 
        ('$answer','$question_id','$user_id')");

        $result = $query->execute();
        // echo $user->insert_id;
        if ($result) {
            header("location: /discuss?q-id=$question_id");
        } else {
            echo "Answer not added!";
        }
    }
}
if (isset($_GET["logout"])) {
    session_unset();
    header("location: /discuss");
}
if(isset($_GET["delete"])) {
    $qid=$_GET['delete'];
    $user_id = $_SESSION['user']['user_id'];
    $query = $conn->prepare("delete from questions where id='$qid'");
    $result = $query->execute();
    if ($result) {
        header("location: /discuss/?u-id=$user_id");
    } else {
        echo "Qustion not deleted!";
    }
}

if (isset($_GET["logout"])) {
    session_unset();
    header("location: /discuss");
}