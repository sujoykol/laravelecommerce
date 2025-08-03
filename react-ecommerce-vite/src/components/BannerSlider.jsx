import React, { useEffect, useState } from 'react';
import axios from 'axios';
import { Swiper, SwiperSlide } from 'swiper/react';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';


const BannerSlider = () => {

 const [sliders, setSliders] = useState([]);
  const [loading, setLoading] = useState(true);
   useEffect(() => {
    axios.get("http://localhost/ecommerce/api/sliders")
      .then((response) => {
        setSliders(response.data);
        setLoading(false);
      })
      .catch((error) => {
        console.error("Failed to fetch sliders:", error);
        setLoading(false);
      });
  }, []);

  if (loading) return <p>Loading sliders...</p>;
  return (
    <div className="w-full mt-0">
      <Swiper
        modules={[Navigation, Pagination, Autoplay]}
        navigation
        pagination={{ clickable: true }}
        autoplay={{ delay: 3000 }}
        loop
        className="w-full h-[250px] sm:h-[300px] md:h-[400px] lg:h-[500px]"
      >
        {sliders.map((slider) => (
          <SwiperSlide key={slider.id}>
            <img
              src={slider.image}
              alt={slider.name}
              className="object-cover w-full h-full"
            />
          </SwiperSlide>
        ))}
      </Swiper>
    </div>
  );
};

export default BannerSlider;
