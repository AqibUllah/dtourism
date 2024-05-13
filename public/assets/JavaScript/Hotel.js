function validateForm() {
      var name = document.getElementById("name").value;
      var totalRooms = document.getElementById("totalRooms").value;
      var availableRooms = document.getElementById("availableRooms").value;
      var costPerDay = document.getElementById("costPerDay").value;
      var phoneNo = document.getElementById("category").value;
      var phoneNo = document.getElementById("address").value;
      var phoneNo = document.getElementById("phoneNo").value;
      var email = document.getElementById("email").value;

      if (name == "" || totalRooms == "" || availableRooms == "" || costPerDay == "" || phoneNo == "" || email == ""|| category==""||address=="") {
        document.getElementById("error-message").innerHTML = "All fields are required.";
        return false;
      }

      if (isNaN(totalRooms) || isNaN(availableRooms) || isNaN(costPerDay) || isNaN(phoneNo)) {
        document.getElementById("error-message").innerHTML = "Numeric values are required for Total Rooms, Available Rooms, Cost per Day, and Phone No.";
        return false;
      }

      if (phoneNo!==11){
            alert("phone no. must not be less than 11 digits.");
            return;
        }

      return true;
    }