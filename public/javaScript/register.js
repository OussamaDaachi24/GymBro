
function isAlphaNum(str) {
    const alphaNumRegex = /^[a-zA-Z0-9]+$/;
    return alphaNumRegex.test(str);
}

// Add this to your register.js file
document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.querySelector('input[type="file"]'); // Select the actual file input
    const imagePreview = document.querySelector('.img_input'); // Select the preview image

    fileInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.alt = 'Uploaded Image';
            }

            reader.readAsDataURL(file);
        }
    });
});

function inputvalid() {
    console.log("we start");
    const form = document.querySelector(".Basic-details-inputs-container");
    let btn = document.querySelector(".Submit-button");
    let confirm = document.querySelector(".confirm-pswd");
    let password = document.querySelector(".pswd");
    let email = document.querySelector(".inp-email");
    let name = document.querySelector(".inp-name");
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        
        // Reset previous error states
        confirm.placeholder = "Confirm Password";
        confirm.classList.remove("error-placeholder");
        email.placeholder = "Enter email";
        email.classList.remove("email-error");
        name.placeholder = "Enter name";
        name.classList.remove("pwd-error");
        password.placeholder = "Enter Password";
        password.classList.remove("pwd-error");

        // Track if there are any errors
        let hasError = false;
        
        if(password.value.trim() ===""){
            password.placeholder="Please Enter a Password"
            password.classList.add("pwd-error")
            hasError= true;
        }
        if(email.value ==""){
            email.placeholder="Please Enter an Email"
            email.classList.add("email-error")
            hasError= true;
        }
        if(confirm.value == "" && password.value != ""){
            confirm.placeholder= "Please Confirm Your Password"
            confirm.classList.add("error-placeholder")
            hasError=true
        }
        // Validate confirm password
        if (password.value !== confirm.value && confirm.value != "") {
            confirm.value = "";
            confirm.placeholder = "The password is not the same";
            confirm.classList.add("error-placeholder");
            hasError = true;
            console.log("passwords are not the same");
        }

        // Validate email
        if (!emailRegex.test(email.value) && email.value != "") {
            email.value = "";
            email.placeholder = "This is not a valid email";
            email.classList.add("email-error");
            hasError = true;
            console.log("email is not valid");
        }

        // Validate name
        if (name.value === "") {
            name.value = "";
            name.placeholder = "Please Enter a name";
            name.classList.add("pwd-error");
            hasError = true;
            console.log("no name");
        }

        // Validate password strength
        if ((password.value.length < 8 || isAlphaNum(password.value)) && password.value != "") {
            password.value = "";
            password.placeholder = "This password is weak!";
            password.classList.add("pwd-error");
            hasError = true;
            console.log("password is weak");
        }

        // If validation passes, let the form submit naturally
        if (!hasError) {
            console.log("Form data being submitted:", {
                name: name.value,
                email: email.value,
                password: password.value,
                confirm: confirm.value
            });
            form.submit();
        }
    });
}

document.addEventListener('DOMContentLoaded', () => {
    inputvalid();
});
