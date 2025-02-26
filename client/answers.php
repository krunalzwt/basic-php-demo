<div class="container">
    <h5>Answers:</h5>
    <?php
    $query = "SELECT answers.answer, users.username 
              FROM answers
              JOIN users ON answers.user_id = users.id
              WHERE answers.question_id = $qid";
    $result = $conn->query($query);
    // $username = $_SESSION['user']['username'];
    
    foreach ($result as $row) {
        $answer = $row['answer'];
        $username = $row['username'];
        echo "<div>
        <p class='answer-wrapper'>$username:$answer</p>
        </div>";
    }
    ?>
</div>