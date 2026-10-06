import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';

import 'swiper/css';

const initSlider = () => {
  const sliders = document.querySelectorAll('.slider-standard');
  if (!sliders.length) return;

  sliders.forEach((slider) => {
    new Swiper(slider, {
      modules: [Navigation],
      loop: false,
      grabCursor: true,
      slidesPerView: 1.1,
      spaceBetween: 24,
      breakpoints: {
        640: { slidesPerView: 2.1 },
        768: { slidesPerView: 2.5 },
        1024: { slidesPerView: 3.2 },
        1280: { slidesPerView: 4.2 },
      },
      navigation: {
        nextEl: slider.querySelector('.__next'),
        prevEl: slider.querySelector('.__prev'),
      },
    });
  });
};

initSlider();