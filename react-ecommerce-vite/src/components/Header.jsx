import { Link, useNavigate  } from 'react-router-dom';
import React, { useEffect, useState } from 'react';
import axios from 'axios';
import products from '../data/products.json';

const Header = () => {
  const [cart, setCart] = useState([]);
  const [showMiniCart, setShowMiniCart] = useState(false);
  const navigate = useNavigate();
  const token = localStorage.getItem('token');
  const userName = localStorage.getItem('userName');

  // For demo purpose: Simulate cart with first product
  const addDemoItem = () => {
    const sample = products[0];
    if (!cart.find(p => p.id === sample.id)) {
      setCart([...cart, sample]);
    }
  };



const handleLogout = async () => {
  try {
    await axios.post(
      'http://localhost/ecommerce/api/logout',
      {},
      {
        headers: {
          Authorization: `Bearer ${localStorage.getItem('token')}`,
        },
      }
    );

    // Remove token and redirect
    localStorage.removeItem('token');
    navigate('/login');
  } catch (err) {
    console.error('Logout failed:', err);
    // Still clear token and redirect on failure (optional)
    localStorage.removeItem('token');
    navigate('/login');
  }
};



  return (
    <header className="sticky top-0 z-50 flex items-center justify-between p-4 text-white bg-blue-600 shadow-md">

      <Link to="/" className="text-2xl font-bold">ShopEasy</Link>

      <nav className="flex items-center space-x-6">
        <Link to="/" className="hover:text-yellow-300">Home</Link>
         {token ? (
            <>
            <span>Welcome, ({userName})</span>
            <button onClick={handleLogout} className="text-red-400 hover:text-red-200">Logout</button>
            </>

        ) : (
          <>
            <Link to="/login" className="hover:text-yellow-300">Login</Link>
        <Link to="/register" className="hover:text-yellow-300">Register</Link>
          </>
        )}
        <Link to="/products" className="hover:text-yellow-300">Products</Link>

        {/* Cart Section */}
        <div
          className="relative"
          onMouseEnter={() => setShowMiniCart(true)}
          onMouseLeave={() => setShowMiniCart(false)}
        >
          <Link to="/cart" className="relative hover:text-yellow-300">
            Cart
            <span className="px-2 ml-1 text-sm font-bold text-blue-800 bg-yellow-400 rounded-full">
              {cart.length}
            </span>
          </Link>

          {/* Mini Cart */}
          {showMiniCart && cart.length > 0 && (
            <div className="absolute right-0 z-30 w-64 mt-2 text-black bg-white border rounded shadow-lg">
              <ul className="p-4 space-y-2 overflow-y-auto max-h-60">
                {cart.map((item) => (
                  <li key={item.id} className="pb-2 border-b">
                    <p className="text-sm font-medium">{item.name}</p>
                    <p className="text-xs text-gray-600">${item.price}</p>
                  </li>
                ))}
              </ul>
              <div className="p-2 text-center">
                <Link to="/cart" className="text-sm font-semibold text-blue-600 hover:underline">View Full Cart</Link>
              </div>
            </div>
          )}
        </div>

        {/* Demo Button: Add item to cart */}
        <button
          onClick={addDemoItem}
          className="px-2 py-1 text-sm text-blue-800 bg-yellow-400 rounded hover:bg-yellow-500"
        >
          + Demo Item
        </button>
      </nav>
    </header>
  );
};

export default Header;

