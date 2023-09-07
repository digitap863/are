const toggleIcon = document.querySelector(".toggle-icon");
const mobileMenuOverlay = document.querySelector(".mobile-menu-overlay");
const closeBtn = document.querySelector(".close-btn");

toggleIcon.addEventListener("click", () => {
  mobileMenuOverlay.classList.add("active");
});

closeBtn.addEventListener("click", () => {
  mobileMenuOverlay.classList.remove("active");
});
