<div class="container">
    <h2>My Profile</h2>
    <input type="hidden" name="profile" value="true">
    <div class="mb-3 margin-bottom-15">
            <?php
            include('./common/db.php');
            $res = mysqli_query($conn, "SELECT profilepicture FROM users WHERE id=" . $_SESSION['user']['user_id']);
            $row = mysqli_fetch_assoc($res);
            if(empty($row['profilepicture'])){
                $profilePicture = 'profile.svg';

            }else{
                $profilePicture = $row['profilepicture'];
            }
            ?>
            <img src="./assets/<?php echo $profilePicture; ?>" alt="Profile Picture">
        </div>
    <div class="row">
        <p><b>username:</b><?php echo $_SESSION ['user']['username']?></p>
        <p><b>email:</b><?php echo $_SESSION ['user']['email']?></p>
        <a class="btn btn-primary" href="?edit=<?php echo $_SESSION['user']['user_id'] ?>">Edit Profile</a>
    </div>
</div>