const express = require('express');
const bcrypt = require('bcrypt');
const mongoose = require('mongoose');

const app = express();

// Connect to MongoDB
mongoose.connect('mongodb://localhost:27017/mydatabase', { useNewUrlParser: true, useUnifiedTopology: true });

// Define the user schema
const userSchema = new mongoose.Schema({
  email: String,
  password: String
});

// Create a model for the user
const User = mongoose.model('User', userSchema);

// Hash a password using bcrypt
async function hashPassword(password) {
  const salt = await bcrypt.genSalt(10);
  const hashedPassword = await bcrypt.hash(password, salt);
  return hashedPassword;
}

// Compare a password with a hashed password using bcrypt
async function comparePassword(password, hashedPassword) {
  return await bcrypt.compare(password, hashedPassword);
}

// Register a new user
app.post('/register', async (req, res) => {
  const { email, password } = req.body;
  const hashedPassword = await hashPassword(password);
  const user = new User({ email, password: hashedPassword });
  try {
    await user.save();
    res.send('User created successfully!');
  } catch (err) {
    res.status(500).send('Error creating user');
  }
});

// Login a user
app.post('/login', async (req, res) => {
  const { email, password } = req.body;
  const user = await User.findOne({ email });
  if (!user) {
    res.status(401).send('Invalid email or password');
  } else {
    const isValid = await comparePassword(password, user.password);
    if (isValid) {
      res.send('Login successful!');
    } else {
      res.status(401).send('Invalid email or password');
    }
  }
});

app.listen(3000, () => {
  console.log('Server listening on port 3000');
});