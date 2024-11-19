document.addEventListener("DOMContentLoaded", () => {
  // Variables
  let secretNumber = generateNumber();
  const guessInput = document.getElementById("guessInput");
  const guessButton = document.getElementById("guessButton");
  const feedback = document.getElementById("feedback");
  const winSound = document.getElementById("winSound");
  const guessSound = document.getElementById("guessSound");
  const clock = document.getElementById("clock");

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
    const userGuess = parseInt(guessInput.value, 10);

    // Check if guess is a valid number between 1 and 100
    if (isNaN(userGuess) || userGuess < 1 || userGuess > 100) {
      feedback.textContent = "Please enter a valid number between 1 and 100.";
      feedback.style.color = "red";
      return;
    }

    // guessing sound effect
    guessSound.play();
    
    if (userGuess === secretNumber) {
      feedback.textContent =
        "Correct! The number was " + secretNumber + ". Starting a new game!";
      feedback.style.color = "green";
      winSound.play();
      secretNumber = generateSecretNumber();
    } else if (userGuess < secretNumber) {
      feedback.textContent = "Too low! Try again.";
      feedback.style.color = "blue";
    } else {
      feedback.textContent = "Too high! Try again.";
      feedback.style.color = "orange";
    }

    // restart gaming settings
    guessInput.value = "";
    guessInput.focus(); 
  });
});
