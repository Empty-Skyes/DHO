<?php

function osLogOut() {
    $_SESSION = array();
    session_destroy();
    header("Location: views/osLoginView");
    exit;
}
