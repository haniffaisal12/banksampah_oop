var x = document.getElementById("formAbsenLat");
var y = document.getElementById("formAbsenLang");

// document.getElementById("getLocation").addEventListener('click', (e) => {
//   if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(showPosition, showError);
//   } else {
//     x.setAttribute('value', 'Geolocation is not supported by this browser.');
//     y.setAttribute('value', 'Geolocation is not supported by this browser.');
//   }
// })

function showPosition(position) {
  x.classList.add('active');
  x.value = position.coords.latitude;
  y.classList.add('active');
  y.value = position.coords.longitude;
}

function showError(error) {
  switch (error.code) {
    case error.PERMISSION_DENIED:
      x.innerHTML = "User denied the request for Geolocation."
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML = "Location information is unavailable."
      break;
    case error.TIMEOUT:
      x.innerHTML = "The request to get user location timed out."
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML = "An unknown error occurred."
      break;
  }
}

let camera_button = document.querySelector("#start-camera");
let video = document.querySelector("#video");
let click_button = document.querySelector("#click-photo");
let canvas = document.querySelector("#canvas");
let dataurl = document.querySelector("#dataurl");
let dataurl_container = document.querySelector("#dataurl-container");

camera_button.addEventListener('click', async function () {
  let stream = null;

  try {
    stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: false });
  }
  catch (error) {
    alert(error.message);
    return;
  }

  video.srcObject = stream;

  video.style.display = 'block';
  camera_button.style.display = 'none';
  click_button.style.display = 'block';
});

click_button.addEventListener('click', (e) => {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  } else {
    x.setAttribute('value', 'Geolocation is not supported by this browser.');
    y.setAttribute('value', 'Geolocation is not supported by this browser.');
  }

  canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
  let image_data_url = canvas.toDataURL('image/jpeg');

  dataurl.value = image_data_url;
  dataurl_container.style.display = 'block';


});
