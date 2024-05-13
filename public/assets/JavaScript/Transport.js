function submitForm() {
        
    document.getElementById('errorContainer').innerHTML = '';

    const companyName = document.getElementById('companyName').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const city = document.getElementById('city').value;
    const vehicleType = document.getElementById('vehicleType').value;
    const capacity = document.getElementById('capacity').value;
    const price = document.getElementById('price').value;
    const picture = document.getElementById('picture').value;
    if (name == "" || companyName == "" || email== "" || phone == "" || city == "" || capacity == ""||price== ""||picture=="") {
    document.getElementById("error-message").innerHTML = "All fields are required.";
    return false;
  }

    if (phone!==11){
        alert("phone no. must not be less than 11 digits.");
        return;
    }
    if (isNaN(phone) || isNaN(price) || isNaN(capacity)) {
    document.getElementById("error-message").innerHTML = "Numeric values are required for Capacity, Cost per 50KM, and Phone No.";
    return false;
  }

    console.log('Form submitted successfully!');
}   