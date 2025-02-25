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
                            <h4 class='card-title'>
                                <a href='?q-id=$id'>$title</a>
                            </h4>  
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