$(function () {
  $("#slider").rotateSlider({});
  $("#sliderA").rotateSlider({});
  $("#sliderB").rotateSlider({});
  $("#sliderC").rotateSlider({});
});

const menuBtn = document.getElementById("navBtn");
const navBar = document.getElementById("navBar");

menuBtn.addEventListener("click", () => {
  navBar.classList.toggle("hidden");
});
