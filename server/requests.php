<?php
include("../common/db.php");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST["signup"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $profilepicture = $_FILES['picture']['name'];
        $tempname = $_FILES['picture']['tmp_name'];
        $ext = pathinfo($profilepicture, PATHINFO_EXTENSION);
        $uniqueProfilePicture = time() . '_' . uniqid() . '.' . $ext;
        $folder = '../assets/' . $uniqueProfilePicture;

        move_uploaded_file($tempname, $folder);
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
            (`username`, `email`, `password`,`profilepicture`) 
            VALUES 
            ('$username','$email','$hash','$uniqueProfilePicture')");

            $result = $user->execute();
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

        $query = "select * from users where email='$email'";
        $result = $conn->query($query);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                $username = $row['username'];
                $user_id = $row['id'];

                $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user_id];
                header("location: /discuss");
                exit();
            } else {
                echo "Invalid Credentials!!";
            }
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
        if ($result) {
            header("location: /discuss?q-id=$question_id");
        } else {
            echo "Answer not added!";
        }
    } else if (isset($_POST["editprofile_action"])) {

        $username = $_POST["username"];
        $email = $_POST["email"];
        $user_id = $_SESSION['user']['user_id'];
        if (!empty($_FILES['picture']['name'])) {
            $profilepicture = $_FILES['picture']['name'];
            $tempname = $_FILES['picture']['tmp_name'];
            $ext = pathinfo($profilepicture, PATHINFO_EXTENSION);
            $uniqueProfilePicture = time() . '_' . uniqid() . '.' . $ext;
            $folder = '../assets/' . $uniqueProfilePicture;
            $query=$conn->prepare('select * from users where id='.$user_id);
            $query->execute();
            $result =$query->get_result(); 
            $row=$result->fetch_assoc();
            $existingProfilePicture= $row['profilepicture'];

            if (!empty($existingProfilePicture) && file_exists("../assets/" . $existingProfilePicture)) {
                unlink("../assets/" . $existingProfilePicture);
            }

            if (move_uploaded_file($tempname, $folder)) {
                $_SESSION['user']['profilepicture'] = $uniqueProfilePicture;
                $query = $conn->prepare("
                UPDATE users SET username='$username', email='$email', profilepicture='$uniqueProfilePicture' WHERE id='$user_id'");
                echo "file uploaded!!";
            } else {
                echo "File upload failed!";
                exit();
            }
        } else {
            $query = $conn->prepare("
            UPDATE users SET username='$username', email='$email' WHERE id='$user_id'");
        }
        $result = $query->execute();

        if ($result) {
            $_SESSION['user']['username'] = $username;
            $_SESSION['user']['email'] = $email;
            header("location: /discuss?edit=$user_id");
        } else {
            echo "User not updated!";
        }
    }
}
if (isset($_GET["logout"])) {
    session_unset();
    header("location: /discuss");
}
if (isset($_GET["delete"])) {
    $qid = $_GET['delete'];
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
