

  

document.getElementsByClassName("tablink")[0].click();

var gambar = document.getElementById("gambar");

gambar.style.display = "none";

var x = document.getElementsByClassName("city");
var y = document.getElementsByClassName("tab");
y.onclick = function(){
  //gambar.style.display = "none";
};

function openCity(evt, cityName) {
  var i, tablinks;
  //document.getElementsByClassName('tabcontent1').style.display="block";
  
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].classList.remove("w3-light-grey");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.classList.add("w3-light-grey");
}

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

