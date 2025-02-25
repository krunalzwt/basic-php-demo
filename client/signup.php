<div class="container">
    <h2>Sign Up</h2>
    <form action="./server/requests.php" method="post">
    <input type="hidden" name="signup" value="true">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="email" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3 margin-bottom-15">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <button type="submit" class="btn btn-primary">SignUp</button>
    </form>
</div>