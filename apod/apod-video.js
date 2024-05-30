const iframe = document.getElementById("apod-iframe");

function displayImage(jsonData) {
  iframe.src = jsonData.url;
}

fetch("https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY")
  .then((response) => response.json())
  .then((data) => displayImage(data))
  .catch((error) => console.error(error));
