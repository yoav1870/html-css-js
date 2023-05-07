const value = document.querySelector("#value_Range")
const input = document.querySelector("#pi_input")
value.textContent = input.value
input.addEventListener("input", (event) => {
    value.textContent = event.target.value
})

function validateForm() {
    var radios = document.getElementsByName("gender");
    var shakedSelected = false;
    for (var i = 0; i < radios.length; i++) {
      if (radios[i].value === "Shaked" && radios[i].checked) {
        shakedSelected = true;
        break;
      }
    }
    if (!shakedSelected) {
      alert("There is only one true king, try again.");
      document.getElementsByName("gender")[3].focus();
      return false;
    }
    return true;
  }
  
  document.querySelector("form").addEventListener("submit", function(event) {
    if (!validateForm()) {
      event.preventDefault();
    }







  });