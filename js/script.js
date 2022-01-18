// HORIZONTAL SCROLL FOR TEAM SECTION 

// const spaceHolder = document.querySelector('.space-holder');
// const horizontal = document.querySelector('.horizontal');
// spaceHolder.style.height = `${calcDynamicHeight(horizontal)}px`;

// function calcDynamicHeight(ref) {
//   const vw = window.innerWidth;
//   const vh = window.innerHeight;
//   const objectWidth = ref.scrollWidth;
//   return objectWidth - vw + vh + 150; // 150 is the padding (in pixels) desired on the right side of the .cards container. This can be set to whatever your styles dictate
// }

// window.addEventListener('scroll', () => {
//   const sticky = document.querySelector('.sticky');
//   horizontal.style.transform = `translateX(-${sticky.offsetTop}px)`;
// });

// window.addEventListener('resize', () => {
//   spaceHolder.style.height = `${calcDynamicHeight(horizontal)}px`;
// });


//TRANSITION MENU
// $('ul a,#gotoTop').click(function(){
// 	let lienHref=$(this).attr('href');
// 	let positionHrefTop=$(lienHref).offset().top;
// 	$('html,body').animate({scrollTop:positionHrefTop-50},1000);
// 	return false;
// });

// CONTACT OFFICES 
// let mapNantes = document.querySelector('.map-nantes>div>p');

// function mapNantesChanges() {
//   mapNantes.innerHTML = "Arthur Geidel<br/>44000 Nantes ";
// }
// function mapParisChanges() {
//   mapNantes.innerHTML = "Arthur Raffin! <br />75000 Paris<br /> ";
// }


// MENU NAVBAR SMOOTH TRANSITION 

const links = document.querySelectorAll(".li-links");

for (const link of links) {
  link.addEventListener("click", clickHandler);
}

function clickHandler(e) {
  e.preventDefault();
  const href = this.getAttribute("href");

  document.querySelector(href).scrollIntoView({
    behavior: "smooth"
  });
}

// STICKY MENU ON SCROLL 

let nav = document.getElementById('barre-menu');

window.addEventListener('scroll',() => {
  if(window.scrollY > 930 ) {
    nav.classList.add('sticky-nav-js');
  }
  else{
    nav.classList.remove('sticky-nav-js');
  }
});

// GALLERY SLIDER 
const gap = 16;
const carousel = document.getElementById("carousel"),
  content = document.getElementById("content"),
  next = document.getElementById("next"),
  prev = document.getElementById("prev");

next.addEventListener("click", e => {
  carousel.scrollBy(width + gap, 0);
  if (carousel.scrollWidth !== 0) {
    prev.style.display = "flex";
  }
  if (content.scrollWidth - width - gap <= carousel.scrollLeft + width) {
    next.style.display = "none";
  }
});
prev.addEventListener("click", e => {
  carousel.scrollBy(-(width + gap), 0);
  if (carousel.scrollLeft - width - gap <= 0) {
    prev.style.display = "none";
  }
  if (!content.scrollWidth - width - gap <= carousel.scrollLeft + width) {
    next.style.display = "flex";
  }
});

let width = carousel.offsetWidth;
window.addEventListener("resize", e => (width = carousel.offsetWidth));

// SERVICE LEARN MORE 
let more = document.querySelectorAll('.more');
for (let i = 0; i<more.length;i++){
  more[i].addEventListener('click',function(){
    more[i].parentNode.classList.toggle('active');
  });
}


// MOBIL NAV BAR 
function navBarMobilFunction() {
	var burgerMenu = document.getElementById('burger-menu');
	var overlay = document.getElementById('menu');

	burgerMenu.classList.toggle("close");
	overlay.classList.toggle("overlay");
}