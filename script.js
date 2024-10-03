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

