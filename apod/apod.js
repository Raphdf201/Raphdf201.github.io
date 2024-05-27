const standardImageButton = document.getElementById("standard-image-button");
const hdImageButton = document.getElementById("hd-image-button");
const displayedImage = document.getElementById("displayed-image");

standardImageButton.addEventListener("click", async function () {
  try {
    const response = await fetch(
      "https://api.nasa.gov/planetary/apod?api_key=us1kMZONrrm7m13WFwtH2cW8x2fXxMoTklfO8oMv" // Replace with your actual key
    );
    if (!response.ok) {
      throw new Error(`API request failed with status ${response.status}`);
    }
    const data = await response.json();
    displayedImage.src = data.url;
  } catch (error) {
    console.error("Error fetching image:", error);
    // You can display an error message to the user here
  }
});

hdImageButton.addEventListener("click", async function () {
  const data = await fetch(
    "https://api.nasa.gov/planetary/apod?api_key=us1kMZONrrm7m13WFwtH2cW8x2fXxMoTklfO8oMv"
  ).then((response) => response.json());
  displayedImage.src = data.hdurl;
});

fetch(
  "https://api.nasa.gov/planetary/apod?api_key=us1kMZONrrm7m13WFwtH2cW8x2fXxMoTklfO8oMv"
)
  .then((response) => response.json())
  .then((data) => {
    standardImageButton.textContent = `Standard Image (${data.url
      .split("/")
      .pop()})`;
    hdImageButton.textContent = `HD Image (${data.hdurl.split("/").pop()})`;
  });
