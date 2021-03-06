/*
	Auto slide image and execute click event
*/
function onLoad() {
	var images = document.getElementsByClassName('slideBox');
	var numSlide = 0;
	images.onclick
	//slide auto run
	var interval =  setInterval(function() {
						numSlide = slide(numSlide);
					}, 4000);

	//button next slide
	var nextSlide = document.getElementById('next');
	nextSlide.onclick = function() {
		numSlide++;
		numSlide = slide(numSlide);
		numSlide--;
		clearInterval(interval);
		interval =  setInterval(function() {
						numSlide = slide(numSlide);
					}, 4000);
	}
	//button previous slide
	var prevSlide = document.getElementById('prev');
	prevSlide.onclick = function() {
		numSlide--;
		numSlide = slide(numSlide);
		numSlide--;
		clearInterval(interval);
		interval =  setInterval(function() {
						numSlide = slide(numSlide);
					}, 4000);
	}
}

/*
	Show image
	@param {number} numSilde image number will show
	@return {number} numSide image number will show on next time
*/
function slide(numSlide){
	var images = document.getElementsByClassName('slideBox');
	if (numSlide <0 ) {
		numSlide = images.length - 1;
	}
	if (numSlide >= images.length) {
		numSlide = 0;
	}
	images[numSlide].style.display = 'block';
	for(var i = 0; i < images.length; i++){
		if(i != numSlide){
			images[i].style.display = 'none';
		}
	}
	numSlide++;
	return numSlide;
}