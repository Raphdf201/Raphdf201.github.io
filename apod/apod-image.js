const imageUrlElement = document.getElementById("imageUrl");
const loadingDiv = document.querySelector(".loading");
let apiKey = "DEMO_KEY";
let count = 0;
let loaded = false;
let loadtime = 5; // This is the time of the countdown

function displayImage(jsonData) {
  imageUrlElement.src = jsonData.hdurl;
}

fetch("https://api.nasa.gov/planetary/apod?api_key=" + apiKey)
  .then((response) => response.json())
  .then((data) => displayImage(data))
  .catch((error) => console.error(error));

const interval = setInterval(() => {
  if (count < loadtime + 1) {
    loadCount.textContent = count++;
    progress.style.width = count++ + "%";
  } else if (loaded) {
    loadingDiv.style.opacity = 0;
    clearInterval(interval);

    setTimeout(() => {
      loadingDiv.style.display = "none";
    }, loadtime * 5);
  }
}, loadtime);

window.addEventListener("load", () => {
  console.log("Loaded");
  loaded = true;

  clearInterval(interval);

  loadCount.textContent = 100;
  progress.style.width = 100 + "%";
  loadingDiv.style.opacity = 0;
  setTimeout(() => {
    loadingDiv.style.display = "none";
  }, 450);
});
