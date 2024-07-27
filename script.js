// // // script.js

// // document.getElementById('signupForm').addEventListener('submit', function(event) {
// //     event.preventDefault(); // Prevent default form submission
    
// //     // Get form inputs
// //     var email = document.getElementById('email').value;
// //     var password = document.getElementById('password').value;
    
// //     // Perform validation (you can add more validation as needed)
// //     if (!email || !password) {
// //       showMessage('Please fill in all fields.', 'error');
// //       return; // Exit function if any field is empty
// //     }
    
// //     // Simulate form submission (you can replace this with your backend logic)
// //     // For demonstration purposes, let's just display a success message
// //     showMessage('Sign up successful! Thank you for joining our platform.', 'success');
    
// //     // Clear form inputs after submission
// //     document.getElementById('email').value = '';
// //     document.getElementById('password').value = '';
// //   });
  
// //   function showMessage(message, type) {
// //     var messageDiv = document.getElementById('message');
// //     messageDiv.textContent = message;
// //     messageDiv.className = type; // Apply CSS class based on message type (error or success)
// //   }
//   const loginForm = document.getElementById('loginForm');
// const loginButton = document.getElementById('loginButton');
// const messageDiv = document.getElementById('message');

// loginForm.addEventListener('submit', (e) => {
//     e.preventDefault();

//     const email = document.getElementById('email').value;
//     const password = document.getElementById('password').value;

//     fetch('login.php', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json'
//         },
//         body: JSON.stringify({ email, password })
//     })
//    .then(response => response.json())
//    .then((data) => {
//         if (data.success) {
//             // Login successful, redirect to dashboard or another page
//             window.location.href = 'dashboard.html';
//         } else {
//             messageDiv.innerHTML = 'Invalid email or password';
//         }
//     })
//    .catch((error) => {
//         console.error('Error:', error);
//     });
// });
// User credentials (replace with a database or API call in a real-world scenario)
const users = {
    "john.doe@example.com": "password123",
    "jane.doe@example.com": "password456",
    // add more users here
  };
  
  // Get the login form and message elements
  const loginForm = document.getElementById("loginForm");
  const messageElement = document.getElementById("message");
  
  // Add an event listener to the login form
  loginForm.addEventListener("submit", (e) => {
    e.preventDefault(); // prevent the form from submitting
  
    // Get the user input
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
  
    // Check if the user exists and the password is correct
    if (users[email] && users[email] === password) {
      // User exists and password is correct, allow login
      messageElement.textContent = "Login successful!";
      // You can redirect the user to a dashboard or another page here
      // window.location.href = "dashboard.html";
    } else {
      // User doesn't exist or password is incorrect
      messageElement.textContent = "Invalid email or password";
    }
  });