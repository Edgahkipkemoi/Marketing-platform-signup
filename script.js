// Get the elements
const loginPopup = document.querySelector('.container');
const closeButton = document.querySelector('.icon-close');
const loginButton = document.querySelector('.btnLogin-popup');

// Add event listeners
closeButton.addEventListener('click', () => {
  loginPopup.style.display = 'none';
});

loginButton.addEventListener('click', () => {
  loginPopup.style.display = 'block';
});

// Use jQuery to bind the click event to the login button
$(document).ready(function() {
  $('.btnLogin-popup').on('click', function(e) {
    e.preventDefault(); // Prevent the default button behavior
    $('.container').show(); // Show the popup container
  });

  // Add an event listener to the close icon to close the popup
  $('.icon-close').on('click', function() {
    $('.container').hide(); // Hide the popup container
  });
});