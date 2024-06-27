<?php require_once '../includes/osHead.php'; ?>

<!-- Login Form -->

<form id="loginForm" method="post" action="../controllers/login_submit.php">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="userLogin" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="passwordLogin" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <a class="btn btn-outline-primary" href="signup.php" role="button">Sign Up</a>
</form>