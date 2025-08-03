
import { Link } from 'react-router-dom';

const ProductCard = ({ product }) => (
  <div className="border rounded p-4 shadow-md">
    <img src={product.image} alt={product.name} className="w-full h-48 object-cover" />
    <h2 className="text-lg font-semibold mt-2">{product.name}</h2>
    <p className="text-gray-500">${product.price}</p>
    <Link to={`/product/${product.id}`} className="text-blue-600 mt-2 inline-block">View Details</Link>
  </div>
);

export default ProductCard;
