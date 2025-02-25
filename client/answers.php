<div class="container">
    <h5>Answers:</h5>
    <?php
    $query = "select * from answers where question_id=$qid";
    $result = $conn->query($query);

    foreach ($result as $row) {
        $answer = $row['answer'];
        echo "<div>
        <p class='answer-wrapper'>$answer</p>
        </div>";
    }
    ?>
</div>