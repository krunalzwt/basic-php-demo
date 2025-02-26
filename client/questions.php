<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <h1 class="heading text-primary">Questions</h1>
            <?php
            include("./common/db.php");

            if (isset($_GET["c-id"])) {
                $query = "select * from questions where category_id=$cid";
            } else if (isset($_GET["search"])) {
                $query = "select * from questions where `title` LIKE '%$search%' ";
            } else if (isset($_GET["u-id"])) {
                $query = "select * from questions where user_id=$uid";
            } else {
                $query = "select * from questions";
            }

            // $query = "SELECT * FROM questions";
            $result = $conn->query($query);

            foreach ($result as $row) {
                $title = $row['title'];
                $id = $row['id'];
                echo "<div class='card mb-3 shadow-sm question-list'>  
                        <div class='card-body'>  
                            <h4 class='card-title my-question'>
                                <a href='?q-id=$id'>$title</a>";
                if (!empty($uid)) {
                    echo "<a href='./server/requests.php?delete=$id'>Delete</a>";
                }

                echo "</h4>  
                        </div>  
                      </div>";
            }
            ?>
        </div>
        <div class="col-md-4">
            <?php include('./client/categorylist.php') ?>
        </div>
    </div>
</div>