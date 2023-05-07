function validateForm() {
    var size = document.forms["orderForm"]["size"].value;
    var color = document.querySelector('input[name="color"]:checked');
    var quantity = document.forms["orderForm"]["quantity"].value;
  
    var sizeError = document.getElementById("sizeError");
    var colorError = document.getElementById("colorError");
    var quantityError = document.getElementById("quantityError");
  
    // reset error messages
    sizeError.innerHTML = "";
    colorError.innerHTML = "";
    quantityError.innerHTML = "";
  
    // validate size input
    if (size === "") {
      sizeError.innerHTML = "Please select a size";
      return false;
    }
  
    // validate color input
    if (!color) {
      colorError.innerHTML = "Please select a color";
      return false;
    }
  
    // validate quantity input
    if (quantity === "" || quantity <= 0) {
      quantityError.innerHTML = "Please enter a valid quantity";
      return false;
    }
  
    return true;
  }
  