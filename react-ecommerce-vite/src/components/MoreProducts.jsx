import React, { useEffect, useState } from 'react';
import axios from 'axios';

function FeatureProducts() {

 const [featured2, setProducts] = useState([]);
  useEffect(() => {
    axios.get("http://localhost/ecommerce/api/randomproducts")
      .then((response) => {
        setProducts(response.data);
      })
      .catch((error) => {
        console.error("Failed to fetch sliders:", error);

      });
  }, []);


  return (
    <div>
         <h2 className="mb-4 text-xl font-semibold">More Products</h2>
      <div className="grid grid-cols-1 gap-6 md:grid-cols-3">
        {featured2.map(product => (
          <div key={product.id + '-row2'} className="p-4 border rounded shadow-md">
            <img src={product.image} alt={product.name} className="object-cover w-full h-48" />
            <h2 className="mt-2 text-lg font-semibold">{product.name}</h2>
            <p className="text-gray-500">${product.price}</p>
            <button
              onClick={() => addToCart(product)}
              className="px-4 py-2 mt-2 text-white bg-blue-600 rounded hover:bg-blue-700"
            >
              Add to Cart
            </button>
          </div>
        ))}
      </div>


    </div>
  )
}

export default FeatureProducts
