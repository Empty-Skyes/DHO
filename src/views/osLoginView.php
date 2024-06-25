<?php
include '../models/authentication.php';
include '../includes/head.php';
?>
<form method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="userLogin" name="username">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="passwordLogin" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>