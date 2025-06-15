// Form handling Js
    document.getElementById('contactForm').addEventListener('submit', function(e) {
      e.preventDefault();
      let valid = true;
      const name = document.getElementById('name');
      const email = document.getElementById('email');
      const phone = document.getElementById('phone');
      const formMessage = document.getElementById('form-message');

      document.getElementById('name-error').innerText = '';
      document.getElementById('email-error').innerText = '';
      document.getElementById('phone-error').innerText = '';
      document.getElementById('services-error').innerText = '';
      formMessage.innerText = '';

      if (name.value.trim() === '') {
        document.getElementById('name-error').innerText = 'Name is required';
        valid = false;
      }

      if (email.value.trim() === '') {
        document.getElementById('email-error').innerText = 'Email is required';
        valid = false;
      } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {
        document.getElementById('email-error').innerText = 'Please enter a valid email';
        valid = false;
      }

      if (phone.value.trim() === '') {
        document.getElementById('phone-error').innerText = 'Phone number is required';
        valid = false;
      }

      if (valid) {
        formMessage.innerText = 'Form submitted successfully!';
        formMessage.style.color = 'green';
        this.reset();
      } else {
        formMessage.innerText = 'Please fix the errors above.';
        formMessage.style.color = 'red';
      }
    });

