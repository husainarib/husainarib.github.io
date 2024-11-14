document.addEventListener("DOMContentLoaded", function () {
  const tiles = document.querySelectorAll(".box");
  let isDragging = false;
  let initialFillState = null;

  // Toggle fill for tiles on click
  tiles.forEach((tile) => {
    tile.addEventListener("mousedown", function (event) {
      event.preventDefault();

      isDragging = true;
      initialFillState = tile.classList.contains("filled");

      // Toggle the clicked tile's fill state
      if (initialFillState) {
        tile.classList.remove("filled");
      } else {
        tile.classList.add("filled");
      }
    });
    // Check if dragging mode is active
    tile.addEventListener("mouseenter", function () {
      if (isDragging) {
        if (initialFillState) {
          tile.classList.remove("filled");
        } else {
          tile.classList.add("filled");
        }
      }
    });
  });

  // Stop drag action on mouse up or out of box
  document.addEventListener("mouseup", function () {
    isDragging = false;
  });

  document.addEventListener("mousedown", function (event) {
    if (!event.target.classList.contains("box")) {
      isDragging = false;
    }
  });

  // Clear button logic
  const clearButton = document.getElementById("clear-button");
  clearButton.addEventListener("click", function () {
    if (confirm("Are you sure you want to clear all tiles?")) {
      tiles.forEach((tile) => {
        tile.classList.remove("filled");
      });
    }
  });
});
