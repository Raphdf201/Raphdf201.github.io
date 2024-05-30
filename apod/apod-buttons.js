document.addEventListener("DOMContentLoaded", function () {
  const imageButton = document.getElementById("apod-button-image");
  const videoButton = document.getElementById("apod-button-video");

  imageButton.addEventListener("click", function () {
    const image = document.createElement("a");
    image.href = "./apod-image.html";
    image.click();
    end("image");
  });

  videoButton.addEventListener("click", function () {
    const video = document.createElement("a");
    video.href = "./apod-video.html";
    video.click();
    end("video");
  });
});

function end(button) {
  console.log(button + " button clicked");
}
