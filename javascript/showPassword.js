 //show password field
 function showPassword() {
    var inputToBeToggled = document.querySelectorAll(".form-control.password");
    inputToBeToggled.forEach(element => {
        if (element.type === "password") {
            element.type = "text";
        } else {
            element.type = "password";
        }
    });

}