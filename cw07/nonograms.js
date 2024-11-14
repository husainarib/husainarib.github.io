document.addEventListener("DOMContentLoaded", function () {
  // Select all elements with the class 'box'
  const tiles = document.querySelectorAll(".box");

  // Attach a click event listener to each tile
  tiles.forEach((tile) => {
    tile.addEventListener("click", function () {
      tile.classList.toggle("filled");
    });
  });

  const clearButton = document.getElementById("clear-button");

  // Attach a click event listener to the Clear button
  clearButton.addEventListener("click", function () {
    if (confirm("Are you sure you want to clear all tiles?")) {
      tiles.forEach((tile) => {
        tile.classList.remove("filled");
      });
    }
  });
});
