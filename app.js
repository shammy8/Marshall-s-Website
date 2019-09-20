let sliderImages = document.querySelectorAll('.slide');
let arrowRight = document.querySelector('#arrow-right');
let arrowLeft = document.querySelector('#arrow-left');
let arrowDown = document.querySelector('#arrow-down');
let header = document.querySelector('header');
let description = document.querySelector('.description');
let current = 0;

function reset(){
    for (let i=0; i<sliderImages.length; i++) {
        sliderImages[i].style.display = 'none';
    }
}

function startSlide() {
    reset();
    sliderImages[0].style.display = 'block';
}

function slideLeft(){
    reset();
    sliderImages[current - 1].style.display = 'block';
    current--;
}

function slideRight(){
    reset();
    sliderImages[current + 1].style.display = 'block';
    current++;
}

function addFade() {
    //add a fade effect to the photo slider 
    for (let i=0; i<sliderImages.length; i++) {
        sliderImages[i].classList.add('fade');
    }
}

arrowLeft.addEventListener('click', () => {
    if (current === 0) {
        current = sliderImages.length;
    }
    addFade();  //fade effect only added to the photo slider after the left or right arrows are clicked so it doesn't affect the startup animation
    slideLeft();
});

arrowRight.addEventListener('click', () => {
    if (current === sliderImages.length - 1) {
        current = -1;
    }
    addFade();  //fade effect only added to the photo slider after the left or right arrows are clicked so it doesn't affect the startup animation
    slideRight();
});

arrowDown.addEventListener('click', () => {
    description.scrollIntoView({ behavior: "smooth" });
});

startSlide();


//Animation on page load: slide main title, buttons in and fade in main photo  
const tl = new TimelineMax();
tl.fromTo(arrowLeft, 2, {x: "-100%"}, {x:'0%'})
  .fromTo(arrowRight, 2, {x: "100%"}, {x:'0%', ease: Power2.easeOut}, '-=2')
  .fromTo(arrowDown, 2, {y: "100%"}, {y:'0%', ease: Power2.easeOut}, '-=2')
  .fromTo(header, 2, {y: "-100%%"}, {y:'0%', ease: Power2.easeOut}, '-=2')
  .fromTo(sliderImages, 1.5, {opacity: "0"}, {opacity:'1', ease: Power2.easeIn})
  ;


//used to slide in map and description on scroll
let controller = new ScrollMagic.Controller();
let scene = new ScrollMagic.Scene({
    triggerElement: '.description'
})
.setClassToggle('.description, .mapdiv', 'slidein')
// .reverse(false)
.addTo(controller);