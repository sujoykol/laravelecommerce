
import products from '../data/products.json';
import { useState } from 'react';
import BannerSlider from '../components/BannerSlider';
import Feature from '../components/FeatureProducts';
import More from '../components/MoreProducts';
import Brand from '../components/BannerCarousel';


const Home = () => {
  const [cart, setCart] = useState([]);

  const addToCart = (product) => {
    if (!cart.find(p => p.id === product.id)) {
      setCart([...cart, product]);
    }
  };



  return (
    <div className="p-8">
      {/* Slider */}
      <div className="mb-8">

          <BannerSlider />

      </div>

      {/* Featured Products Row 1 */}
       <Feature />

      {/* Featured Products Row 2 */}
       <More/>

       <Brand />

    </div>
  );
};

export default Home;
