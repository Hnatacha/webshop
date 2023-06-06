
$(document).ready(function () {

    // Get the input field
    var input = document.getElementById("search");

    // Execute a function when the user presses a key on the keyboard
    input.addEventListener("keypress", function (event) {
        // If the user presses the "Enter" key on the keyboard
        if (event.key === "Enter") {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            search();
        }
    });

    $('#search-btn').click(function () {
        search();
    });

    search = () =>  window.location.href = window.location.origin +'/webshop/frontend/products.php?search='+input.value;
    

});