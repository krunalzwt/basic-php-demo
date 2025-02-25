<select name="category" id="category" class="form-control">
    <option value="">Select A Catagory</option>
    <?php 
    include("./common/db.php");
    $query="select * from category";
    $result=$conn->query($query);
    foreach($result as $row){
        $name=$row['name'];
        $id= $row['id'];
        echo "<option value=$id>$name</option>";
    }
    ?>
</select>