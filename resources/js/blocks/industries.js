import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/navigation';

document.querySelectorAll('.industries-swiper').forEach((slider) => {
  new Swiper(slider, {
    modules: [Navigation],
    loop: false,
    grabCursor: true,
    slidesPerView: 'auto',
    spaceBetween: 24,
    navigation: {
      nextEl: slider.querySelector('.__next'),
      prevEl: slider.querySelector('.__prev'),
    },
  });
});
