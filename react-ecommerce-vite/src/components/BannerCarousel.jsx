import React, { useEffect, useState } from 'react';
import axios from 'axios';
import { Swiper, SwiperSlide } from 'swiper/react';
import { Navigation, Autoplay } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';


const BannerCarousel = () => {

  const [brands, setBrands] = useState([]);

   useEffect(() => {
    axios.get("http://localhost/ecommerce/api/brands")
      .then((response) => {
        setBrands(response.data);
      })
      .catch((error) => {
        console.error("Failed to fetch Barnds:", error);

      });
  }, []);


  return (
    <div className="mx-auto mt-10 mb-16 max-w-7xl">
      <Swiper
        modules={[Navigation, Autoplay]}
        navigation
        autoplay={{ delay: 2500 }}
        loop
        slidesPerView={5}
        spaceBetween={20}
        className="rounded-lg"
        breakpoints={{
          320: { slidesPerView: 1 },
          640: { slidesPerView: 2 },
          1024: { slidesPerView: 5 },
        }}
      >
        {brands.map((brand) => (
          <SwiperSlide key={brand.id}>
            <img
              src={brand.image}
              alt={brand.name}
              className="max-h-[500px] object-contain"
             />
          </SwiperSlide>
        ))}
      </Swiper>
    </div>
  );
};

export default BannerCarousel;
