document.addEventListener("DOMContentLoaded", function () {
  // Select all elements with the class 'box'
  const tiles = document.querySelectorAll(".box");

  // Attach a click event listener to each tile
  tiles.forEach((tile) => {
    tile.addEventListener("click", function () {
      tile.classList.add("filled");
    });
  });
});
