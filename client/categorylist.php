
    <h1>Categories</h1>
    <?php
    include("./common/db.php");

    $query = "SELECT * FROM category";
    $result = $conn->query($query);

    foreach ($result as $row) {
        $name = $row['name'];
        $id = $row['id'];
        echo"
         <h4 class='card-title'>
            <a href='?c-id=$id'>$name</a>
        </h4>";
    }
    ?>
