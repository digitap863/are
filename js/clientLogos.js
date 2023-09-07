var swiper = new Swiper(".clientLogo", {
  // slidesPerView: 3,
  // spaceBetween: 30,
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
    nextEl: ".cl-prv",
    prevEl: ".cl-nxt",
  },
  breakpoints: {
    0: { slidesPerView: 1, spaceBetween: 30 },
    500: { slidesPerView: 4, spaceBetween: 20 },
    800: { slidesPerView: 4, spaceBetween: 20 },
  },
});
