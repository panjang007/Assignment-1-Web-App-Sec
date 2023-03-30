document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('validation-form');
    const successMessage = document.createElement('div');
    const submitButton = form.querySelector('button[type="submit"]');

    successMessage.style.display = 'none';
    successMessage.innerHTML = 'Form submitted successfully!';
    successMessage.style.backgroundColor = '#4caf50';
    successMessage.style.color = 'white';
    successMessage.style.padding = '15px';
    successMessage.style.textAlign = 'center';
    successMessage.style.marginBottom = '15px';
    successMessage.style.borderRadius = '3px';

    form.insertBefore(successMessage, submitButton);

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        // Form validation
        const name = document.getElementById('name');
        const matricNo = document.getElementById('matric-no');
        const currentAddress = document.getElementById('current-address');
        const homeAddress = document.getElementById('home-address');
        const email = document.getElementById('email');
        const mobilePhone = document.getElementById('mobile-phone');
        const homePhone = document.getElementById('home-phone');

        const nameRegex = /^[a-zA-Z\s]+$/;
        const matricNoRegex = /^[0-9]+$/;
        const addressRegex = /^[A-Za-z0-9\s\.,\-]+$/;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const phoneRegex = /^\d{10,15}$/;

        if (!nameRegex.test(name.value)) {
            alert('Please enter a valid name.');
            return;
        }

        if (!matricNoRegex.test(matricNo.value)) {
            alert('Please enter a valid matric number.');
            return;
        }

        if (!addressRegex.test(currentAddress.value)) {
            alert('Please enter a valid current address.');
            return;
        }

        if (!addressRegex.test(homeAddress.value)) {
            alert('Please enter a valid home address.');
            return;
        }

        if (!emailRegex.test(email.value)) {
            alert('Please enter a valid email address.');
            return;
        }

        if (!phoneRegex.test(mobilePhone.value)) {
            alert('Please enter a valid mobile phone number.');
            return;
        }

        if (!phoneRegex.test(homePhone.value)) {
            alert('Please enter a valid home phone number.');
            return;
        }

        // If all validations pass, show the success message
        successMessage.style.display = 'block';
    });
});
