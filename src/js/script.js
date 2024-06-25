function disableMenuPills(tabs) {
    tabs.forEach(function(tab) {
        $('#' + tab + '-tab').addClass('disabled');
    });
}

$(document).ready(function() {
    console.log('DOM ready');
});

$(window).on('load', function() {
    console.log('Page fully loaded');
});

$(document).ready(function() {
    // Logout click handler
    $('#logout').click(function(e) {
        e.preventDefault();

        var confirmLogout = confirm("Are you sure you want to logout?");

        if (confirmLogout) {
            $.ajax({
                url: '../controllers/osLogOut.php',
                type: 'POST', // or 'GET'
                success: function(data) {
                    window.location.href = "../views/osLoginView.php";
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
});

$(document).ready(function() {
    $('#redirectButton').click(function() {
        window.location.href = "../index.php";
    });
});