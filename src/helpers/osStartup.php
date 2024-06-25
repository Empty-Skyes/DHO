<?php include "../includes/head.php"; ?>

<div class="row">
    <div class="card">
        <div class="card-body">
            We're loggin you in!
        </div>
    </div>
</div>
<div id="os-login" class="row">
    <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
        <span class="visually-hidden"></span>
    </div>
</div>

<script>
    $(document).ready(function() {
        setTimeout(function() {
            window.location.href = "../index.php";
        }, 2500);
    });
</script>