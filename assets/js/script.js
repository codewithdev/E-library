// wait for the entire page to finish loading
window.addEventListener('load', function() {
	
	// setTimeout to simulate the delay from a real page load
	setTimeout(lazyLoad, 1000);
	
});

function lazyLoad() {
	var card_images = document.querySelectorAll('.card-image');
	
	// loop over each card image
	card_images.forEach(function(card_image) {
		var image_url = card_image.getAttribute('data-image-full');
		var content_image = card_image.querySelector('img');
		
		// change the src of the content image to load the new high res photo
		content_image.src = image_url;
		
		// listen for load event when the new photo is finished loading
		content_image.addEventListener('load', function() {
			// swap out the visible background image with the new fully downloaded photo
			card_image.style.backgroundImage = 'url(' + image_url + ')';
			// add a class to remove the blur filter to smoothly transition the image change
			card_image.className = card_image.className + ' is-loaded';
		});
		
	});
	
}



//Navigation Bar Design

const openIcon = document.querySelector('.icon');
const linksWrapper = document.querySelector('.links-wrapper');
const backdrop = document.querySelector('.backdrop');
const closeIcon = document.querySelector('.close-btn');

openIcon.addEventListener('click', () => {
	linksWrapper.classList.add('open');
});
closeIcon.addEventListener('click', () => {
	linksWrapper.classList.remove('open');
});
backdrop.addEventListener('click', () => {
	linksWrapper.classList.remove('open');
});




var scroller = document.querySelector('.gallery-row-scroll');
var leftArrow = document.getElementById('leftArrow');

var direction = 0;
var active = false;
var max = 10;
var Vx = 0;
var x = 0.0;
var prevTime = 0;
var f = 0.2;
var prevScroll = 0;

function physics(time) {
  // Measure how much time has passed
  var diffTime = time - prevTime;
  if (!active) {
    diffTime = 80;
    active = true;
  }
  prevTime = time;

  // Give power to the scrolling

  console.log(diffTime);

  Vx = (direction * max * f + Vx * (1-f)) * (diffTime / 20);

  x += Vx;
  var thisScroll = scroller.scrollLeft;
  var nextScroll = Math.floor(thisScroll + Vx);

  if (Math.abs(Vx) > 0.5 && nextScroll !== prevScroll) {
    scroller.scrollLeft = nextScroll;
    requestAnimationFrame(physics);
  } else {
    Vx = 0;
    active = false;
  }
  prevScroll = nextScroll;
}

leftArrow.addEventListener('mousedown', function () {
  direction = -1;
  if (!active) {
    requestAnimationFrame(physics);
  }
});

leftArrow.addEventListener('mouseup', function () {
  direction = 0;
});

rightArrow.addEventListener('mousedown', function () {
  direction = 1;
  if (!active) {
    requestAnimationFrame(physics);
  }
});
rightArrow.addEventListener('mouseup', function(event){
  direction = 0;
});

// controller stuff
var widthControlled = document.getElementById('widthControlled');
var widthController = document.getElementById('widthController');
widthController.addEventListener('input', function (event) {
  widthControlled.style.width = this.value;
});



