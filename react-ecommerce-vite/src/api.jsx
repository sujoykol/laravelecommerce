// src/api.js
import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost/ecommerce/api', // update if needed
  withCredentials: true, // if using Sanctum
  headers: {
    'Content-Type': 'application/json',
    Accept: 'application/json',
  },
});

export default api;
