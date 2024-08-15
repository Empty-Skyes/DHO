/*
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

*/

$(function () {
    $('[data-bs-toggle="tooltip"]').tooltip()
})

$(document).ready(function() {
    console.log('DOM ready');
});

$(window).on('load', function() {
    console.log('Page fully loaded');
});

$(document).ready(function() {
    $('#os-background').on('error', function() {
        $(this).hide();
    });
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
                console.log('Response:', xhr.responseText);
                alert('An error occurred. Please try again later.');
            }
        });
    });
});

$(document).ready(function() {
    $('#signupForm').submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: '../controllers/signup_submit.php',
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
                console.log('Response:', xhr.responseText);
                alert('An error occurred. Please try again later.');
            }
        });
    });
});

$(document).ready(function() {
    $('#logout').click(function(e) {
        e.preventDefault();

        let confirmLogout = confirm("Are you sure you want to logout?");

        if (confirmLogout) {
            $.ajax({
                url: '../controllers/logout.php',
                type: 'POST',
                success: function() {
                    window.location.href = "../views/login.php";
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    console.log('Response:', xhr.responseText);
                }
            });
        }
    });
});

$(document).ready(function() {
    $('#desktopAppAnimation').click(function() {
        let randomLeft = Math.random() * 50 + 25;
        let randomTop = Math.random() * 50 + 25;

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
        }, 6000);

        setTimeout(function() {
            $('#gameCreditStartup').fadeOut();
        }, 7000);

        setTimeout(function() {
            $('#gameNameStartup').fadeIn();
        }, 8000);

        setTimeout(function() {
            $('#gameNameStartup').fadeOut(1000, function() {
                setTimeout(function() {
                    window.location.href = "../helpers/gameLogin.php";
                }, 1500);
            });
        }, 9000);
    });
});