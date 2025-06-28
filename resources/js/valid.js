// Reset form validation on reload or form submission
window.addEventListener("load", function () {
    const form = document.getElementById("myForm");
    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent form submission for demo purposes
        // Validate the form fields
        if (form.checkValidity() === false) {
            event.stopPropagation();
        } else {
            // If form is valid, you can perform an action here (e.g., submit form, reset)
            console.log("Form is valid!");
        }
        form.classList.add("was-validated"); // Add validated class to show feedback
    });

    // Optionally reset form fields on page reload (to clear validation state)
    form.reset();
    form.classList.remove("was-validated");
});
