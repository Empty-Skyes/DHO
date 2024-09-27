<?php

$part = 'osSidebar';

$path = '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
</svg>'

?>

<div id="os-sidebar">
    <div class="nav flex-column nav-pills" id="pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" id="home-tab" data-toggle="pill" href="#pill-home" role="tab" aria-controls="pill-home" aria-selected="true">
            <?php echo $path; ?>
            Home
        </a>
        <a id="desktopAppAnimation" class="nav-link" href="#">
            <?php echo $path; ?>
            The World
        </a>
        <a class="nav-link" id="mailer-tab" data-toggle="pill" href="#os-mailer" role="tab" aria-controls="pill-mailer" aria-selected="false">
            <?php echo $path; ?>
            Mailer
        </a>
        <a class="nav-link" id="news-tab" data-toggle="pill" href="#os-news" role="tab" aria-controls="pill-news" aria-selected="false">
            <?php echo $path; ?>
            News
        </a>
        <a class="nav-link" id="accessory-tab" data-toggle="pill" href="#os-accessory" role="tab" aria-controls="pill-accessory" aria-selected="false">
            <?php echo $path; ?>
            Accessory
        </a>
        <a class="nav-link" id="audio-tab" data-toggle="pill" href="#os-audio" role="tab" aria-controls="pill-audio" aria-selected="true">
            <?php echo $path; ?>
            Audio
        </a>
        <a class="nav-link" id="user-tab" data-toggle="pill" href="#os-user" role="tab" aria-controls="pill-user" aria-selected="true">
            <?php echo $path; ?>
            User
        </a>
        <a id="log-file" class="nav-link" id="data-tab" data-toggle="pill" href="#os-data" role="tab" aria-controls="pill-data" aria-selected="true">
            <?php echo $path; ?>
            Data
        </a>
        <a id="logout" class="nav-link" href="#">
            <?php echo $path; ?>
            Log Out
        </a>
    </div>
</div>

