function checkForm() {
    // initalize form inputs
    const name = document.getElementById("fullName");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const passwordConfirm = document.getElementById("passwordConfirm");
    const formErrors = document.getElementById("formErrors");

    // clear any previous errors
    formErrors.innerHTML = "";
    formErrors.classList.add("hide");

    // store errors in an array
    let errors = [];

    // validate name input
    if (name.value.trim() === "") {
        errors.push("Missing full name.");
    };
    // validate email input
    if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,5}$/.test(email.value)) {
        errors.push("Invalid or missing email address.");
    }
    // validate password input
    if (password.value.length < 10 || password.value.length > 20) {
        errors.push("Password must be between 10 and 20 characters.");
    }
    if (!/[a-z]/.test(password.value)) {
        errors.push("Password must contain at least one lowercase character.");
    }
    if (!/[A-Z]/.test(password.value)) {
        errors.push("Password must contain at least one uppercase character.");
    }
    if (!/[0-9]/.test(password.value)) {
        errors.push("Password must contain at least one digit.");
    }
    if (password.value !== passwordConfirm.value) {
        errors.push("Password and confirmation password don't match.");
    }
    if (errors.length > 0) {
        formErrors.innerHTML = "<ul><li>" + errors.join("</li><li>") + "</li></ul>";
        formErrors.classList.remove("hide");
        return false;
    }
    return true;
}

document.getElementById("submit").addEventListener("click", function (event) {
    checkForm();
    // Prevent default form action. DO NOT REMOVE THIS LINE
    event.preventDefault();
});