// modefosc.js 

// Function to toggle dark mode on or off
function toggleDarkMode() {
    // Add or remove the 'modo-oscuro' class from the body, navbar, and footer
    document.body.classList.toggle('modo-oscuro'); // Dark mode for the entire page body
    document.querySelector('.navbar').classList.toggle('modo-oscuro'); // Dark mode for the navigation bar
    document.querySelector('.footer.php').classList.toggle('modo-oscuro'); // Dark mode for the footer
}

// Add the click event for the moon button
document.getElementById('toggleDarkMode').addEventListener('click', toggleDarkMode);