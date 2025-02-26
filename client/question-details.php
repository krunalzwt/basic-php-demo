<div class="container mt-4">
    <h1 class="heading text-primary center">Question</h1>
    <?php
    include("./common/db.php");
    $query = "select * from questions where id=$qid";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    // print_r($row);
    echo "<h4 class='question-title'>Question:" . $row['title'] . "</h4>
        <p>" . $row['description'] . "</p>";
    include("./client/answers.php");
    ?>
    <?php
    // $user_id = $_SESSION['user']['user_id'];
    if ($_SESSION) {
        echo "<form action='./server/requests.php' method='post'>
             <input type='hidden' name='question_id' value=$qid>
             <textarea class='form-control margin-bottom-15' name='answer' placeholder='Your answer...'></textarea>
             <button class='btn btn-primary'>Write your answer</button>
         </form>";
    }else{
        echo "<h4>Please <a href='?login=true'>LogIn</a> or <a href='?signup=true'>SignUp</a> to write your own answer...</h4>";
    }
    ?>

</div>