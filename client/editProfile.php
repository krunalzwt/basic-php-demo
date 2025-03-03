<div class="container">
    <h2>Edit Profile</h2>
    <form class="primary-form" method="post" action="">
    <input type="hidden" name="editprofile" value="true">
        <div class="mb-3 margin-bottom-15">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['user']['username'] ?>" required>
        </div>

        <div class="mb-3 margin-bottom-15">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['user']['email'] ?>" required>
        </div>

        <button type="submit" class="btn btn-primary" name="editprofile">Confirm</button>
    </form>
</div>

