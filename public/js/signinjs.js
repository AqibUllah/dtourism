document.addEventListener("DOMContentLoaded", function() {
    const signinLink = document.getElementById("signin");
    const signinSubmenu = document.getElementById("signin-submenu");

    signinLink.addEventListener("click", function(event) {
        event.preventDefault(); // Prevent the link from navigating
        signinSubmenu.style.display = (signinSubmenu.style.display === "block") ? "none" : "block";
    });
});

