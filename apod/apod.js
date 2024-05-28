const imageUrlElement = document.getElementById("imageUrl");

function displayImage(jsonData) {
  imageUrlElement.src = jsonData.hdurl;
  imageUrlElement.alt = "Image retrieved from API"; // Set a descriptive alt text
}

// Fetch the JSON data from the API (replace 'YOUR_API_URL' with the actual URL)
fetch(
  "https://api.nasa.gov/planetary/apod?api_key=us1kMZONrrm7m13WFwtH2cW8x2fXxMoTklfO8oMv"
)
  .then((response) => response.json()) // Parse the JSON response
  .then((data) => displayImage(data)) // Call the function to display the image
  .catch((error) => console.error(error)); // Handle errors during fetching
