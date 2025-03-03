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
    } else if (isset($_GET['u-id'])) {
        $uid = $_GET['u-id'];
        include('./client/questions.php');
    } else if (isset($_GET['profile'])) {
        $uid = $_GET['profile'];
        include('./client/myProfile.php');
    } else if (isset($_GET['edit'])) {
        // $uid = $_GET['  '];
        include('./client/editProfile.php');
    } else {
        include('./client/questions.php');
    }
    ?>
</body>

</html>


<!-- comment for demo commit -->