function disableMenuPills(tabs) {
    tabs.forEach(function(tab) {
        $('#' + tab + '-tab').addClass('disabled');
    });
}

function redirectIndex() {
    $(document).ready(function() {
        setTimeout(function() {
            window.location.href = "../index.php";
        }, 2000);
    });
}

$(document).ready(function() {
    console.log('DOM ready');
});

$(window).on('load', function() {
    console.log('Page fully loaded');
});

$(document).ready(function() {
    $('#logout').click(function(e) {
        e.preventDefault();

        var confirmLogout = confirm("Are you sure you want to logout?");

        if (confirmLogout) {
            $.ajax({
                url: '../controllers/logout.php',
                type: 'POST',
                success: function(data) {
                    window.location.href = "../views/login.php";
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
});
