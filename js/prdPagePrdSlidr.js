var swiper = new Swiper(".prd_slider500", {
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
    nextEl: ".swiper-nav-nxt",
    prevEl: ".swiper-nav-prv",
  },
  breakpoints: {
    0: { slidesPerView: 1, spaceBetween: 0 },
    768: { slidesPerView: 2, spaceBetween: 20 },
    992: { slidesPerView: 3, spaceBetween: 30 },
  },
});
