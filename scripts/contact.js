document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    const formResponse = document.getElementById('formResponse');

    contactForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(contactForm);

        fetch('contact_submit.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                formResponse.style.display = 'block';
                formResponse.textContent = data.message;
                formResponse.style.color = 'green';
                contactForm.reset();
            } else {
                formResponse.style.display = 'block';
                formResponse.textContent = data.message;
                formResponse.style.color = 'red';
            }
        })
        .catch(error => {
            formResponse.style.display = 'block';
            formResponse.textContent = 'An error occurred. Please try again later.';
            formResponse.style.color = 'red';
        });
    });
});