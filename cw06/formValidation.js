function validateForm() {
  // set up variables for form inputs
  const id = document.getElementById("userID").value;
  const firstName = document.getElementById("firstName").value;
  const lastName = document.getElementById("lastName").value;

  let errors = [];

  // Clear previous error messages
  document.getElementById("idError").innerHTML = "";
  document.getElementById("firstNameError").innerHTML = "";
  document.getElementById("lastNameError").innerHTML = "";

  // Check for empty fields
  if (!id) {
    errors.push("ID is required");
    document.getElementById("idError").innerHTML = "ID is missing";
  }
  if (!firstName) {
    errors.push("First Name is required");
    document.getElementById("firstNameError").innerHTML =
      "First Name is missing";
  }
  if (!lastName) {
    errors.push("Last Name is required");
    document.getElementById("lastNameError").innerHTML = "Last Name is missing";
  }

  if (errors.length > 0) {
    alert(errors.join("\n"));
  } else {
    // TODO ADD DISPLAY FORM INPUT
  }
}
