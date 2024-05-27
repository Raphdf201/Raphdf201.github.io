fetch("https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY")
  .then((response) => response.json())
  .then((data) => {
    const imageUrl = data.hdurl;

    const imageElement = document.getElementById("apod-image");
    imageElement.src = imageUrl;
  })
  .catch((error) => {
    console.error("Error fetching JSON data:", error);
  });

fetch("https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY")
  .then((response) => response.json())
  .then((data) => {
    const imageUrls = data.url;

    const imageContainer = document.getElementById("image-container");

    imageUrls.forEach((imageUrl) => {
      const imageElement = document.createElement("img");
      imageElement.src = imageUrl;
      imageContainer.appendChild(imageElement);
    });
  })
  .catch((error) => {
    console.error("Error fetching JSON data:", error);
  });
