<div class="container">
    <h2>My Profile</h2>
    <input type="hidden" name="profile" value="true">
    <div class="row">
        <p><b>username:</b><?php echo $_SESSION ['user']['username']?></p>
        <p><b>email:</b><?php echo $_SESSION ['user']['email']?></p>
        <a class="btn btn-primary" href="?edit=<?php echo $_SESSION['user']['user_id'] ?>">Edit Profile</a>
    </div>
</div>