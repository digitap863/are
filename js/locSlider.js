var swiper = new Swiper(".loc_slider", {
  // slidesPerView: 3,
  // spaceBetween: 30,
  initialSlide: 0,
  centerSlide: "true",
  fade: true,
  grabCursor: "true",
  loop: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-nav-loc-nxt",
    prevEl: ".swiper-nav-loc-prv",
  },
  breakpoints: {
    0: { slidesPerView: 2, spaceBetween: 30 },
    500: { slidesPerView: 2, spaceBetween: 20 },
    800: { slidesPerView: 3, spaceBetween: 30 },
  },
});
