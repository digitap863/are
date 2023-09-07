var swiper = new Swiper(".testimonial-card_slider", {
  slidesPerView: 1,
  spaceBetween: 30,
  initialSlide: 0,
  centerSlide: "true",
  fade: true,
  grabCursor: "true",
  loop: true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-nav-nxt-testi",
    prevEl: ".swiper-nav-prv-testi",
  },

  // breakpoints: {
  //   0: { slidesPerView: 1, spaceBetween: 30 },
  //   680: { slidesPerView: 2, spaceBetween: 30 },
  //   966: { slidesPerView: 3, spaceBetween: 20 },
  //   1220: { slidesPerView: 4, spaceBetween: 25 },
  // },
});
