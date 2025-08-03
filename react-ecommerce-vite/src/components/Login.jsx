// src/components/Login.js
import React, { useState } from 'react';
import api from '../api';
import { useNavigate } from 'react-router-dom';

const Login = () => {
  const [credentials, setCredentials] = useState({ email: '', password: '' });

  const [message, setMessage] = useState('');
  const [loading, setLoading] = useState(false);
   const navigate = useNavigate();

  const handleChange = e => {
    setCredentials({ ...credentials, [e.target.name]: e.target.value });
  };

  const handleSubmit = async e => {
    e.preventDefault();
    setLoading(true);
    try {
      const res = await api.post('/login', credentials);
      localStorage.setItem('token', res.data.token);
      localStorage.setItem('userName', res.data.user.name); // If token is returned
      setMessage('Login successful!');
      navigate('/dashboard');
    } catch (error) {
      setMessage('Invalid credentials');
    }finally {
      setLoading(false);
    }
  };

  return (
    <div style={{ maxWidth: '400px', margin: '40px auto', padding: '20px', border: '1px solid #ccc', borderRadius: '8px' }}>
      <h2 style={{ textAlign: 'center' }}>Login</h2>
      {message && <div className="mb-4 text-green-600">{message}</div>}
      <form onSubmit={handleSubmit}>
        <input type="email" name="email" placeholder="Email" onChange={handleChange} required  style={{ width: '100%', padding: '10px', marginBottom: '10px' }}/>
        <input type="password" name="password" placeholder="Password" onChange={handleChange} required  style={{ width: '100%', padding: '10px', marginBottom: '10px' }}/>

          <button type="submit" disabled={loading} style={{ width: '100%', padding: '10px', background: '#333', color: '#fff', border: 'none' }}>
          {loading ? 'Logging...' : 'Login'}
        </button>
      </form>
      <p>{message}</p>
    </div>
  );
};

export default Login;
