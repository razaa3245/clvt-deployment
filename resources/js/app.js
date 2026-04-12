import './bootstrap';
import axios from 'axios';

// Get token from localStorage
const token = localStorage.getItem('token');

// If token exists, add it to all requests automatically
if (token) {
  axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
}

axios.defaults.headers.common['Accept'] = 'application/json';
