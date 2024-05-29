const imageUrlElement = document.getElementById("imageUrl");

function displayImage(jsonData) {
  imageUrlElement.src = jsonData.hdurl;
}

fetch("https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY")
  .then((response) => response.json())
  .then((data) => displayImage(data))
  .catch((error) => console.error(error));
