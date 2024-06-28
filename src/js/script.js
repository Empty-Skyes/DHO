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
    $('#loginForm').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('form').fadeOut(1000, function() {
                        window.location.href = '../index.php';
                    });
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status, error);
                alert('An error occurred. Please try again later.');
            }
        });
    });
});

$(document).ready(function() {
    $('#signupForm').submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: '/controllers/signup_submit.php',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    window.location.href = '../views/login.php';
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status, error);
                alert('An error occurred. Please try again later.');
            }
        });
    });
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

$(document).ready(function() {
    $('#desktopAppAnimation').click(function() {
        var randomLeft = Math.random() * 50 + 25;
        var randomTop = Math.random() * 50 + 25;

        $('#overlay').css({
            'display': 'block',
            'opacity': '1',
            'width': '0',
            'height': '0',
            'left': randomLeft + '%',
            'top': randomTop + 'vh'
        }).animate({
            'width': '100%',
            'height': '100%',
            'opacity': '1',
            'top': '0',
            'left': '0%'
        }, 500, function() {
            setTimeout(function() {
                $('#overlay').addClass('overlay-flicker');
            }, 500);
        });

        setTimeout(function() {
            $('#overlay').css('background-color', 'white');
            $('#gameCreditStartup').fadeIn();
        }, 5500);

        setTimeout(function() {
            $('#gameCreditStartup').fadeOut(1000, function() {
                setTimeout(function() {
                    window.location.href = "../helpers/gameLogin.php";
                }, 1500);
            });
        }, 7500);
    });
});