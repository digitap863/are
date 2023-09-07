const addProductButton = document.getElementById("addProductButton");
const addProjectButton = document.getElementById("addProjectButton");
const addProductModal = document.getElementById("addProductModal");
const addProjectModal = document.getElementById("addProjectModal");
const closeProductModal = document.getElementById("closeProductModal");
const closeProjectModal = document.getElementById("closeProjectModal");
const addProductForm = document.getElementById("addProductForm");
const addProjectForm = document.getElementById("addProjectForm");
const productImageInput = document.getElementById("productImage");
const projectImageInput = document.getElementById("projectImage");
const productImageError = document.getElementById("productImageError");
const projectImageError = document.getElementById("projectImageError");

addProductButton.addEventListener("click", () => {
  addProductModal.style.display = "block";
  productImageError.textContent = ""; // Clear any previous error messages
});

addProjectButton.addEventListener("click", () => {
  addProjectModal.style.display = "block";
  projectImageError.textContent = ""; // Clear any previous error messages
});

closeProductModal.addEventListener("click", () => {
  addProductModal.style.display = "none";
});

closeProjectModal.addEventListener("click", () => {
  addProjectModal.style.display = "none";
});

window.addEventListener("click", (event) => {
  if (event.target === addProductModal) {
    addProductModal.style.display = "none";
  }
  if (event.target === addProjectModal) {
    addProjectModal.style.display = "none";
  }
});

// Validate image size before form submission
addProductForm.addEventListener("submit", (event) => {
  const imageSize = productImageInput.files[0]?.size || 0;

  if (imageSize > 500 * 1024) {
    event.preventDefault();
    productImageError.textContent = "Image size should be less than 500KB.";
  }
});

addProjectForm.addEventListener("submit", (event) => {
  const imageSize = projectImageInput.files[0]?.size || 0;

  if (imageSize > 500 * 1024) {
    event.preventDefault();
    projectImageError.textContent = "Image size should be less than 500KB.";
  }
});
