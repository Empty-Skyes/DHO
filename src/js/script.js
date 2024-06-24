document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.sidebar ul li a');
    const contents = document.querySelectorAll('.content');

    links.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();

            // Remove active class from all contents
            contents.forEach(content => content.classList.remove('active'));

            // Get the content id from the data attribute
            const contentId = this.getAttribute('data-content');
            const activeContent = document.getElementById(contentId);

            // Add active class to the selected content
            activeContent.classList.add('active');
        });
    });
});
