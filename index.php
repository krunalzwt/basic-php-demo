<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discuss</title>
    <?php include('./client/commonFiles.php') ?>
</head>

<body>
    <?php
    session_start();
    include('./client/header.php');
    if (isset($_GET['signup']) && !isset($_SESSION['user']['username'])) {
        include('./client/signup.php');
    } else if (isset($_GET['login']) && !isset($_SESSION['user']['username'])) {
        include('./client/login.php');
    } else if (isset($_GET['ask'])) {
        include('./client/ask.php');
    } else if (isset($_GET['q-id'])) {
        $qid = $_GET['q-id'];
        include('./client/question-details.php');
    } else if (isset($_GET['c-id'])) {
        $cid = $_GET['c-id'];
        include('./client/questions.php');
    } else if (isset($_GET['search'])) {
        $search = $_GET['search'];
        include('./client/questions.php');
    } else {
        include('./client/questions.php');
    }
    ?>
</body>

</html>