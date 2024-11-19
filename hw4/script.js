document.addEventListener("DOMContentLoaded", () => {
  let secretNumber = generateNumber();

  // Function to generate a random secret number
  function generateNumber() {
    return Math.floor(Math.random() * 100) + 1;
  }

  // Function to update the clock
  function updateClock() {
    const now = new Date();
    const hours = String(now.getHours()).padStart(2, "0");
    const minutes = String(now.getMinutes()).padStart(2, "0");
    const seconds = String(now.getSeconds()).padStart(2, "0");
    clock.textContent = `Current Time: ${hours}:${minutes}:${seconds}`;
  }

  // Update clock every second
  setInterval(updateClock, 1000);

  // Event listener for the guess button
  guessButton.addEventListener("click", () => {
    // TODO: HANDLE GUESS BUTTON LOGIC
  });
});
