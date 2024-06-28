<?php require_once '../includes/osHead.php'; ?>

<!-- Sign Up Form -->

<form id="signupForm" method="post" action="../controllers/signup_submit.php">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="userSignup" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="passwordSignup" name="password" required>
    </div>
    <div class="form-group">
        <label for="passwordRepeat">Repeat Password</label>
        <input type="password" class="form-control" id="passwordRepeat" name="passwordRepeat" required>
    </div>
    <button type="submit" class="btn btn-primary">Sign Up</button>
    <a class="btn btn-outline-primary" href="login.php" role="button">Login</a>
</form>


