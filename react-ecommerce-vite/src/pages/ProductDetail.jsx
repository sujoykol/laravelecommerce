
import { useParams } from 'react-router-dom';
import products from '../data/products.json';

const ProductDetail = () => {
  const { id } = useParams();
  const product = products.find(p => p.id === parseInt(id));

  if (!product) return <p>Product not found</p>;

  return (
    <div className="p-8">
      <img src={product.image} alt={product.name} className="w-64 h-64 object-cover mx-auto" />
      <h2 className="text-2xl font-bold mt-4 text-center">{product.name}</h2>
      <p className="text-center text-gray-600">${product.price}</p>
      <p className="mt-4 text-center">{product.description}</p>
    </div>
  );
};

export default ProductDetail;
