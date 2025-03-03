<div class="container">
    <h2>
        Verify OTP
    </h2>

    <form action="./server/requests.php" method="post" class="primary-form">
        <input type="hidden" name="verify-signup" value="true">
        <div class="mb-3 margin-bottom-15">
            <label for="otp" class="form-label">Enter OTP:</label>
            <input type="number" class="form-control" id="otp" name="otp">
        </div>
        <button type="submit" class="btn btn-primary">Verify</button>
    </form> 

</div>