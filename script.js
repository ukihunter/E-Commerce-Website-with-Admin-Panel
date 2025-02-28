document.addEventListener("DOMContentLoaded", () => {
  const menBtn = document.getElementById("men-btn");
  const womenBtn = document.getElementById("women-btn");
  const menClothing = document.getElementById("men-clothing");
  const womenClothing = document.getElementById("women-clothing");

  menBtn.addEventListener("click", () => {
    menClothing.classList.add("visible");
    womenClothing.classList.remove("visible");
    menBtn.classList.add("active");
    womenBtn.classList.remove("active");
  });

  womenBtn.addEventListener("click", () => {
    womenClothing.classList.add("visible");
    menClothing.classList.remove("visible");
    womenBtn.classList.add("active");
    menBtn.classList.remove("active");
  });

  // Set default view to men’s clothing
  menClothing.classList.add("visible");

  // Assuming you want to show the clothing items based on a button click
  document
    .getElementById("show-clothing-button")
    .addEventListener("click", function () {
      const clothingItems = document.querySelectorAll(".clothing-category1");
      clothingItems.forEach((item) => {
        item.classList.toggle("visible"); // Toggle the class to show/hide items
      });
    });
});

document.addEventListener("DOMContentLoaded", function () {
  const profilePic = document.getElementById("profilePic");
  const subMenu = document.getElementById("subMenu");

  profilePic.addEventListener("click", function (event) {
    event.stopPropagation(); // Prevent the click from bubbling up
    subMenu.style.display =
      subMenu.style.display === "block" ? "none" : "block";
  });

  // Close the submenu when clicking outside
  document.addEventListener("click", function (event) {
    if (!subMenu.contains(event.target)) {
      subMenu.style.display = "none";
    }
  });
});
