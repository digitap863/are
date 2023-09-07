var swiper = new Swiper(".rltd_prd_slider", {
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
    nextEl: ".swiper-nav-rltdPrd-nxt",
    prevEl: ".swiper-nav-rltdPrd-prv",
  },
  breakpoints: {
    0: { slidesPerView: 1 },
    500: { slidesPerView: 2, spaceBetween: 20 },
    800: { slidesPerView: 3, spaceBetween: 20 },
  },
});
