const images = [
  "partb_imgs/car1.jpg",
  "partb_imgs/car2.jpg",
  "partb_imgs/car3.jpg",
  "partb_imgs/car4.jpg",
  "partb_imgs/car5.jpg",
  "partb_imgs/car6.jpg",
  // twice the same image
  "partb_imgs/car1.jpg",
  "partb_imgs/car2.jpg",
  "partb_imgs/car3.jpg",
  "partb_imgs/car4.jpg",
  "partb_imgs/car5.jpg",
  "partb_imgs/car6.jpg",
];

let gameCards = [];
let selectedCards = [];
let matchedPairs = 0;
let timer;
let timeRemaining;
let memorizeTimer;

function startGame(cardCount, difficulty) {
  const gameBoard = document.getElementById("game-board");
  const timerDisplay = document.getElementById("timer");
  const resultDisplay = document.getElementById("result");

  // Reset game state
  gameBoard.innerHTML = "";
  selectedCards = [];
  matchedPairs = 0;
  resultDisplay.innerHTML = "";

  // Set time for card count
  if (cardCount === 8) {
    timeRemaining = 120;
  } else if (cardCount === 10) {
    timeRemaining = 150;
  } else {
    timeRemaining = 180;
  }
  timerDisplay.textContent = `Time Remaining: ${timeRemaining} Seconds`;

  // Select and duplicate images
  const selectedImages = images.slice(0, cardCount / 2);
  gameCards = [...selectedImages, ...selectedImages].sort(
    () => Math.random() - 0.5
  );

  // Create game grid
  gameBoard.style.gridTemplateColumns = `repeat(${cardCount / 2}, 100px)`;

  gameCards.forEach((image, index) => {
    const card = document.createElement("div");
    card.classList.add("card");
    card.dataset.index = index;

    const img = document.createElement("img");
    img.src = image;
    card.appendChild(img);

    card.addEventListener("click", () => handleCardClick(card));
    gameBoard.appendChild(card);
  });

  // Determine memorization period based on difficulty
  let memorizationTime;
  if (difficulty === "easy") {
    memorizationTime = 8;
  } else if (difficulty === "medium") {
    memorizationTime = 5;
  } else if (difficulty === "hard") {
    memorizationTime = 3;
  }

  const cards = document.querySelectorAll(".card");
  cards.forEach((card) => card.classList.add("revealed"));

  memorizeTimer = setTimeout(() => {
    cards.forEach((card) => card.classList.remove("revealed"));

    // Start the game timer after memorization timer ends
    startTimer();
  }, memorizationTime * 1000); 
}

function handleCardClick(card) {
  if (
    card.classList.contains("matched") ||
    card.classList.contains("revealed") ||
    selectedCards.length === 2
  )
    return;

  card.classList.add("revealed");
  selectedCards.push(card);

  if (selectedCards.length === 2) {
    const [first, second] = selectedCards;
    const firstImg = first.querySelector("img").src;
    const secondImg = second.querySelector("img").src;

    if (firstImg === secondImg) {
      first.classList.add("matched");
      second.classList.add("matched");
      matchedPairs++;
    } else {
      setTimeout(() => {
        first.classList.remove("revealed");
        second.classList.remove("revealed");
      }, 1000);
    }

    selectedCards = [];

    // Check win condition
    if (matchedPairs === gameCards.length / 2) {
      clearInterval(timer);
      const resultElement = document.getElementById("result");
      resultElement.innerHTML = "Congratulations! You Won!";
      resultElement.style.color = "green";
    }
  }
}

function startTimer() {
  // show time remaining
  timer = setInterval(() => {
    timeRemaining--;
    document.getElementById(
      "timer"
    ).textContent = `Time Remaining: ${timeRemaining} Seconds`;

    if (timeRemaining <= 0) {
      clearInterval(timer);
      document.getElementById("result").innerHTML = "Time's up! Game Over";
      document
        .querySelectorAll(".card")
        .forEach((card) => card.classList.add("revealed"));
    }
  }, 1000);
}
