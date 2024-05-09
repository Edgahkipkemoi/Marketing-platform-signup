// script.js

document.getElementById('signupForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission
    
    // Get form inputs
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    
    // Perform validation (you can add more validation as needed)
    if (!email || !password) {
      showMessage('Please fill in all fields.', 'error');
      return; // Exit function if any field is empty
    }
    
    // Simulate form submission (you can replace this with your backend logic)
    // For demonstration purposes, let's just display a success message
    showMessage('Sign up successful! Thank you for joining our platform.', 'success');
    
    // Clear form inputs after submission
    document.getElementById('email').value = '';
    document.getElementById('password').value = '';
  });
  
  function showMessage(message, type) {
    var messageDiv = document.getElementById('message');
    messageDiv.textContent = message;
    messageDiv.className = type; // Apply CSS class based on message type (error or success)
  }
  