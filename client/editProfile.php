<div class="container">
    <h2>Edit Profile</h2>
    <form class="primary-form" method="post" action="./server/requests.php">
        <input type="hidden" name="editprofile_action" value="true">

        <div class="mb-3 margin-bottom-15">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username"
                value="<?php echo $_SESSION['user']['username']; ?>">
        </div>

        <div class="mb-3 margin-bottom-15">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email"
                value="<?php echo $_SESSION['user']['email']; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Confirm</button>
    </form>
</div>