document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('tourGuideForm');

    form.addEventListener('submit', function(event) {
      event.preventDefault();
      if (validateForm()) {
        
        alert('Form submitted successfully!');
      }
    });

    function validateForm() {
      const name = document.getElementById('name').value;
      const email = document.getElementById('email').value;
      const phone = document.getElementById('phone').value;
      const address = document.getElementById('address').value;
      const picture = document.getElementById('picture').value;
      const language = document.getElementById('language').value;
      const price = document.getElementById('price').value;
      const specialization = document.getElementById('specialization').value;

      
      if (name === '' || email === '' || phone === '' || address === '' || picture === '' || language === '' || price === '' || specialization === '') {
        alert('Please fill in all fields.');
        return false;
      }

      if (phone!==11){
          alert("phone no. must not be less than 11 digits.");
          return;
      }
      if ( isNaN(price) || isNaN(phone)) {
      document.getElementById("error-message").innerHTML = "Numeric values are required for Cost per 3 hours, and Phone No.";
      return false;
    }

      return true;
    }
  });
