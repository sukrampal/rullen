<form  action="<?= base_url('home/verify_otp') ?>" method="POST">


    <div class="form-label-group">
        <input type="text" id="otp" name="otp" class="form-control" placeholder="OTP" required>
        <label for="phone-number">Enter OTP</label>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Verify OTP</button>
    <a href="<?= base_url('OTPmanager') ?>" class="btn btn-lg btn-danger btn-block" type="submit">Back</a>
</form>
