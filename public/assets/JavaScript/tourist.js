document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('touristForm');

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
      const age = document.getElementById('age').value;
      const address = document.getElementById('address').value;
      const gender = document.getElementById('gender').value;
      const nationality = document.getElementById('nationality').value;

      if (name === '' || email === '' || phone === '' || address === ''||age==='' || gender === '' || nationality === '' ) {
        alert('Please fill in all fields.');
        return false;
      }
      if (phone!==11){
        alert("phone no. must not be less than 11 digits.");
        return;
    }
    if ( isNaN(age) || isNaN(phone)) {
    document.getElementById("error-message").innerHTML = "Numeric values are required for age, and Phone No.";
    return false;
  }

    return true;
  }
});
