<?php
	require 'header.php';
?>
<link href="slideShow.css" rel="stylesheet" />
<link href="home.css" rel="stylesheet" />
<!-- Hours box -->
 <h2>HOURS</h2>
 <article id="pageContent">
 <article id="hours">
<b>Tuesday, Wednesday, and Thursday: 11AM - 7PM</b>
<br>
<b>Friday & Saturday: 11AM - 9PM</b>            
<br>
<b>Monday & Sunday: Closed</b>
<br>
</article>
 <br>
 <br>
</script>
 <!-- Slide show -->
<div class="slideshow-container">

<div class="mySlides fade">
  <img src="images/sugarcookies.jpg" style="width:70%">
</div>

<div class="mySlides fade">
  <img src="images/bread.jpg" style="width:70%">
</div>
  <div class="mySlides fade">
    <img src="images/cake.jpg" style="width:70%">
  </div>
    <div class="mySlides fade">
    <img src="images/cookies.jpg" style="width:70%">
  </div>
    <div class="mySlides fade">
    <img src="images/pizza.jpg" style="width:70%">
  </div>
</div>
<br>


<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span> 
  </div>
 
 <script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 5 seconds
}
</script>

<br>
<!-- mission statement -->
<h2>Mission Statement</h2>
<article id="mission">
 <b>We at Sinfully Gluten Free are dedicated to provide the best gluten free we possibly can.
<p>Our goal is to not only provide great products for those that can't have gluten, but products that everyone will love.</p>
<p>Come in and give us a try and we might surprise you with great pizza, sandwiches, and many baked goods.​</p></b>
<br>
</article>
</article>

<br>
<?php
	require 'footer.php';
?>