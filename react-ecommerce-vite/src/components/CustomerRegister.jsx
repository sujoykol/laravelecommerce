import React, { useState } from 'react';
import axios from 'axios';

const Register = () => {
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    password: ''
  });

  const [message, setMessage] = useState('');
  const [loading, setLoading] = useState(false);

  const handleChange = e => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleSubmit = async e => {
    e.preventDefault();
    setLoading(true);
    setMessage('');
    try {
      const response = await axios.post('http://localhost/ecommerce/api/register', formData); // Update URL if needed
      //setMessage('✅ Registered successfully!');
      setMessage(response.data.message);
      setFormData({ name: '', email: '', password: '' });
    } catch (error) {
      setMessage('❌ Registration failed: ' + (error.response?.data?.message || 'Server error'));
    } finally {
      setLoading(false);
    }
  };

  return (
    <div style={{ maxWidth: '400px', margin: '40px auto', padding: '20px', border: '1px solid #ccc', borderRadius: '8px' }}>
      <h2 style={{ textAlign: 'center' }}>Register</h2>
        {message && <div className="mb-4 text-green-600">{message}</div>}
      <form onSubmit={handleSubmit}>
        <input
          type="text"
          name="name"
          value={formData.name}
          placeholder="Name"
          onChange={handleChange}
          required
          style={{ width: '100%', padding: '10px', marginBottom: '10px' }}
        />
        <input
          type="email"
          name="email"
          value={formData.email}
          placeholder="Email"
          onChange={handleChange}
          required
          style={{ width: '100%', padding: '10px', marginBottom: '10px' }}
        />
        <input
          type="password"
          name="password"
          value={formData.password}
          placeholder="Password"
          onChange={handleChange}
          required
          style={{ width: '100%', padding: '10px', marginBottom: '15px' }}
        />
        <button type="submit" disabled={loading} style={{ width: '100%', padding: '10px', background: '#333', color: '#fff', border: 'none' }}>
          {loading ? 'Registering...' : 'Register'}
        </button>
      </form>

    </div>
  );
};

export default Register;
