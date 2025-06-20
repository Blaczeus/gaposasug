<script setup>
import { onMounted } from 'vue';
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay, EffectFade } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

Swiper.use([Navigation, Pagination, Autoplay, EffectFade]);

onMounted(() => {
  const initSwiper = (selector, options) => {
    const el = document.querySelector(selector);
    if (el) {
      new Swiper(el, options); // Use the DOM node directly
    }
  };

  // mySwiper-category-1
  initSwiper('.mySwiper-category-1', {
    slidesPerView: 6,
    spaceBetween: 24,
    loop: true,
    navigation: {
      nextEl: '.rt-next',
      prevEl: '.rt-prev',
    },
    pagination: {
      el: '.rts-swiper-dots',
      clickable: true,
    },
    breakpoints: {
      1700: { slidesPerView: 6 },
      1500: { slidesPerView: 3 },
      1024: { slidesPerView: 3 },
      768: { slidesPerView: 2 },
      640: { slidesPerView: 1 },
      320: { slidesPerView: 1 },
    },
  });

  // testmonial-v2
  initSwiper('.testmonial-v2', {
    slidesPerView: 1,
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });

  // single-testimonial-active
  initSwiper('.single-testimonial-active', {
    slidesPerView: 2,
    loop: true,
    spaceBetween: 30,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    breakpoints: {
      1700: { slidesPerView: 2 },
      1500: { slidesPerView: 2 },
      1024: { slidesPerView: 2 },
      768: { slidesPerView: 2 },
      640: { slidesPerView: 1 },
      320: { slidesPerView: 1 },
    },
  });

  // mySwiper-testimonials-1
  initSwiper('.mySwiper-testimonials-1', {
    slidesPerView: 1,
    spaceBetween: 24,
    loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });

  // dynamic swiper-data
  const initSwipers = (defaults = {}, selector = '.swiper-data') => {
    document.querySelectorAll(selector).forEach((swiperEl) => {
      let options = { ...defaults };
      if (swiperEl.dataset.swiper) {
        try {
          options = { ...options, ...JSON.parse(swiperEl.dataset.swiper) };
        } catch (e) {
          console.warn('Invalid swiper data:', e);
        }
      }
      new Swiper(swiperEl, options);
    });
  };

  initSwipers({ spaceBetween: 30, slidesPerView: 2 });

  // x__slider__active
  initSwiper('.x__slider__active', {
    slidesPerView: 1,
    loop: true,
    navigation: {
      nextEl: '.rts__next',
      prevEl: '.rts__prev',
    },
  });

  // sc__gallery__active
  initSwiper('.sc__gallery__active', {
    slidesPerView: 3.9,
    spaceBetween: 30,
    loop: true,
    navigation: {
      nextEl: '.rt-next',
      prevEl: '.rt-prev',
    },
    breakpoints: {
      1500: { slidesPerView: 3.9 },
      1024: { slidesPerView: 3 },
      768: { slidesPerView: 2 },
      640: { slidesPerView: 2 },
      320: { slidesPerView: 1 },
    },
  });
});
</script>

<template>
  <div style="display:none"><!-- This is a logic-only component, it doesn’t render any markup --></div>
</template>
