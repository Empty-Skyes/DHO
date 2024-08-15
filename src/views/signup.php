<?php require_once '../includes/osHead.php'; ?>

<!-- Sign Up Form -->

<form id="signupForm" method="post" action="../controllers/signup_submit.php" class="osForm">
    <div class="form-group">
        <label for="username">Username<input type="text" class="form-control" id="userSignup" name="username" required></label>
    </div>
    <div class="form-group">
        <label for="password">Password<input type="password" class="form-control" id="passwordSignup" name="password" required></label>
    </div>
    <div class="form-group">
        <label for="passwordRepeat">Repeat Password<input type="password" class="form-control" id="passwordRepeat" name="passwordRepeat" required></label>
    </div>
    <button type="submit" class="btn btn-primary">Sign Up</button>
    <a class="btn btn-outline-primary" href="login.php" role="button">Login</a>
    <button
            id="signupTip"
            class="btn btn-secondary"
            data-bs-toggle="tooltip"
            data-bs-html="true"
            title="Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.">
        ?
    </button>
</form>


