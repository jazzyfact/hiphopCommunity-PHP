<?php
include "../include/header.php"
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>full width profile card design</title>
     
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    
    <style>
     @import url('https://i.icomoon.io/public/c88de6d4a5/JeffPannoneWeb/style.css');
*, *:before, *:after {
  box-sizing: inherit;
}
html {
  box-sizing: border-box;
}
html, body, .page-wrap {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
}
body {
 font-family: 'Oswald', sans-serif;
  font-size: 100%;
  font-weight: 400;
  line-height: 1;
  overflow: hidden;
  background: #000;
    
}
h1, h2, h3, h4, h5, h6 {
  font-family: 'Oswald', sans-serif;
  font-weight: 400;
    text-transform: uppercase;
    color: white;
    letter-spacing: 2px;
}
i {
  position: relative;
}
.overlay {
  position: absolute;
  z-index: 1;
  top: -10%;
  left: -10%;
  width: 120%;
  height: 120%;
  background: rgba(0, 0, 0, .3);
  background-position: center center;
  background-size: 100%;
  opacity: 1;
  filter: blur(5px);
  background-color: #fff;
  background-image: url(https://cl.ly/2J0M3R1D072t/webb-mtn-drone.jpg);
  background-image: url(https://cl.ly/2y2t3e2t1c0t/rt87-bw-hills.jpg);
  background-size: cover;
}
@keyframes Gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}
.page-wrap {
  position: relative;
  z-index: 100;
  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;
    background-image: url(night-4184916_960_720.jpg);
    background-size: cover;
    background-position: center;
    height: 100vh;
    
}
.wrap-center {
  width: 480px;
  overflow: hidden;
  transition: width 0.5s, background 0.5s;
}
.wrap-center.expand-width {
  width: 630px;
}
.light-theme .wrap-center {
  background: rgba(255, 255, 255, .0);
  color: rgba(0, 0, 0, .7);
}
.light-theme .wrap-center.bio-active {
  background: rgba(255, 255, 255, .3);
}
.dark-theme .wrap-center {
  background: rgba(0, 0, 0, .0);
  color: rgba(255, 255, 255, .9);
}
.dark-theme .wrap-center.bio-active {
  background: rgba(0, 0, 0, .3);
}
.header {
  width: 100%;
  position: relative;
  padding: 30px 0;
  font-size: 1.2rem;
  border-bottom: 1px solid rgba(0, 0, 0, .0);
  transition: border-bottom-color 0.5s;
}
.expand-width .header {
  border-bottom-color: rgba(0, 0, 0, .075);
}
.header .hello-h1 {
  display: block;
  cursor: pointer;
  font-size: 2.2em;
  margin-bottom: 25px;
  font-weight: 700;
  transition: font-size 0.5s;
     color: white;
    letter-spacing: 2px;
}
.expand-width .header .hello-h1 {
  font-size: 1.5em;
   
}
.header .name {
  display: block;
  margin: 15px 0;
  font-size: 1.2em;
    color: white;
}
.header .avatar {
  width: 180px;
  margin: 0 auto;
  backface-visibility: hidden;
  opacity: 1;
  transition: opacity 0.5s, width 0.5s;
    border: 3px solid white;
    border-radius: 150px;
    padding: 7px;
}
.expand-width .header .avatar {
  opacity: 0.5;
  width: 90px;
}
.expand-width .header .avatar:hover {
  opacity: 1;
}
.header img {
  display: block;
  width: 100%;
  border-radius: 100%;
}
.main-nav {
  position: relative;
  padding-bottom: 40px;
}
.main-nav ul li {
  display: inline-block;
}
.main-nav .nav-btn {
  cursor: pointer;
  display: block;
  font-size: 0.75em;
  text-transform: none;
  padding: 0.95em;
  margin: 2px 0;
  width: 120px;
  border-radius: 100px;
  backface-visibility: hidden;
  transition: background 0.3s;
    background: white;
  
  
}
.main-nav .nav-btn:hover {
  background: rgba(0, 0, 0, 0.25);
}
.main-nav .nav-btn i {
  font-size: 70%;
  top: -0.075em;
}
.toggle-about {
  cursor: pointer;
  border-radius: 100%;
  height: 36px;
  width: 36px;
  position: absolute;
  left: 50%;
  margin-left:-21px;
  margin-top: 30px;
  padding: 10px 0 0 1px;
  text-align: center;
  font-size: 0.7em;
  display: block;
  transform: rotate(0deg);
  transition: transform 0.3s;
  backface-visibility: hidden;
  transition: background 0.3s;
  border: 3px solid white;
  color: white;
}
.toggle-about:hover {
  background: rgba(0, 0, 0, 0.25);
}
.expand-height .toggle-about {
  transform: rotate(180deg);
}
.about {
  font-weight: 400;
  width: 100%;
  padding: 40px 60px 0px;
  text-align: left;
  overflow: hidden;
  height: 0px;
  padding-top: 0px;
  padding-bottom: 0px;
  transition: height 0.5s, padding-top 0.2s;
}
.about .copy-block {
  padding-top: 40px;
}
.expand-height .about {
  height: 450px;
}
.about .close-about {
  margin: 0 auto;
  font-size: 2.2em;
}
.about h2 {
  font-size: 1.5em;
  margin: 0;
  font-weight: 600;
  margin-bottom: 0.5em;
   
}
.about p {
  margin-bottom: 1.25em;
  font-size: 0.9em;
  line-height: 1.7;
}

    
    
    </style>
</head>
<body>
   <div class="overlay"></div>
   <div class="showcase">
       <div class="showcaseTitle">


       <div class="page-wrap light-theme">
  
  <div class="wrap-center">
    <header class="header">
      <div class="avatar">
        <div class=""></div>
        <img src="client-2.jpg" alt="Jeff Pannone">
      </div>
      
      <span class="name">ALEXANDRA </span>
      <h1 class="hello-h1">PROFILE CARD DESIGN</h1>
      <nav class="main-nav">
  <span class="toggle-about"><i class="i-chevron-down"></i></span>
 
      </nav>
    </header>

    <div class="about" id="about">
      <div class="copy-block">
        <h2>About</h2>
        <p>Currently living in southern Connecticut and working at BrandShop, I'm passionate about Front-End Design & Development and building scalable & fluid websites. In my free time you'll likely find me exploring and capturing the world with an iPhone
          6, Nikon D90, and more recently a 35mm Nikon N80.</p>
        <h2>Ecommerce/CX</h2>
        <p>The design of a site should be based upon its intended purpose. A website must not only look good, but it should work properly as well. Quality over quantity and simplicity over complexity. I believe in minimalist approach to web design and strive
          to build functional, responsive, and progressively enhanced interfaces.</p>
      </div>
      
 
      
    </div>
  </div>
</div>


       </div>
   </div>
 <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script>
    // default state of bio
var bioActive = false;

// toggle bio with animations/timing relative to its state
// if closed, expand width first, then height
// if open, expand height first, then width
function toggleBio(){
  if(bioActive == false){
    firstClass = 'expand-width';
    secondClass = 'expand-height';  
    bioActive = true;
  }else{
    firstClass = 'expand-height';
    secondClass = 'expand-width';    
    bioActive = false;
  } 
  
  $(".wrap-center").toggleClass("bio-active").toggleClass(firstClass).delay(500).queue(function(){
    $(this).toggleClass(secondClass).dequeue();
  }); 
}

// run bio toggle on click
$(".btn-about, .close-about, .toggle-about").on("click", toggleBio);

    
</script>
</body>
</html>