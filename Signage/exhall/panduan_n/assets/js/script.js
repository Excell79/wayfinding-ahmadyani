// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var button = document.getElementsByClassName("close")[0];


// When the user clicks on <span> (x), close the modal
button.onclick = function() { 
  modal.style.display = "none";
}


var mybutton = document.getElementById("pesawat")
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}



// var accordions = document.getElementsByClassName("accordion");

// for (var i = 0; i < accordions.length; i++) {
//   accordions[i].onclick = function() {
//     this.classList.toggle('is-open');

//     var content = this.nextElementSibling;
//     if (content.style.maxHeight) {
//       // accordion is currently open, so close it
//       content.style.maxHeight = null;
//     } else {
//       // accordion is currently closed, so open it
//       content.style.maxHeight = content.scrollHeight + "px";
//     }
//   }
// }

