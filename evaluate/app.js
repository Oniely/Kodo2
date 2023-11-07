function validateForm() {
    var email = document.getElementById("email").value;
    var radios = document.querySelectorAll('input[type="radio"]:checked');

    if (email === "") {
        alert("Email address is required.");
        return false;
    }

    if (radios.length < 10) {
        alert("Please answer all questions.");
        return false;
    }

    return true;
}
