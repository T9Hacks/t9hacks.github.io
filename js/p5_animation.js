/*
 * TODO:
 * - change color of circles, so they aren't all the same shade
 * - add a decleration speed, so when the mouse is hovering over
 * 		circle and moves out, the circle keeps moving in that
 * 		direction, and slowly slows down
 * - change speeds of circles so they aren't as slow
 * 		- change speeds of circles based on location of page?
 * - change size of canvas when window resizes
 *
 */

// canvas info
var canvasID = "backgroundAnimationCanvas";
var canvasParentID = "backgroundAnimationParent";

var canvasWidth = 0;
var canvasHeight = 0;

var canvas;


// resize canvas with window change
var resizeTimer;

$(window).on('resize', function(e) {

	clearTimeout(resizeTimer);
	resizeTimer = setTimeout(function() {

		canvasWidth = document.body.clientWidth;
		canvasHeight = window.innerHeight;

		//$("#" + canvasID).height(canvasHeight).width(canvasWidth);
		canvas = createCanvas(canvasWidth, canvasHeight);
		canvas.id(canvasID);
		canvas.parent(canvasParentID);

		fill(61, 27, 95, 175);

	}, 250);

});


// background info
var backgroundRed = 51;
var backgroundGreen = 17;
var backgroundBlue = 85;


// properties of bursts
var burstMinDiameter = 200;
var burstMaxDiameter = 500;
var speedMin = 0.03;
var speedMax = 0.1;
//var advoidMultiplier = 7;

//var numberStaticBursts = 150;
//var numberChangingBursts = 150;
//var staticBurstsArray = [];
//var changingBurstsArray = [];
//var numberBursts = 200;
var burstsArray = [];

// scene data
//var frame = 0;
//var NumBurstPerSquarePixelsRatio = 5000;




function setup() {

	// setup the canvas
	canvasWidth = document.body.clientWidth;
	canvasHeight = window.innerHeight;
	//console.log(canvasWidth + " - " + canvasHeight);

	canvas = createCanvas(canvasWidth, canvasHeight);
	canvas.id(canvasID);
	canvas.parent(canvasParentID);


	// background
	background(backgroundRed, backgroundGreen, backgroundBlue);


	// attributes
	noStroke();
	frameRate(60);
	numberChangingBursts = (canvasWidth * canvasHeight) / NumBurstPerSquarePixelsRatio;
	fill(61, 27, 95, 175);

	// create random diameters, so not based on random
	var randomDiameters = new Array(25);
	for(var i=0; i<25; i++) {
		randomDiameters[i] = (burstMinDiameter + (i*2));
	}

	// create random speeds, so not random
	var o = [(-0.05), (-0.04), (-0.03), (-0.02), (-0.01), (0.01), (0.02), (0.03), (0.04), (0.05)];
	for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
	var randomSpeeds = o;

	// create bursts
	/*var diameter = 0;
	var x = 0;
	var y = 0;
	var xSpeed = 0;
	var ySpeed = 0;
	var randomDiametersIndex = 0;
	var randomSpeedsIndex = 0;
	for(var i=0; i<numberChangingBursts; i++) {
		diameter = randomDiameters[randomDiametersIndex];
		x = Math.floor(Math.random() * (canvasWidth + 1));
		y = Math.floor(Math.random() * (canvasHeight + 1));
		xSpeed = randomSpeeds[randomSpeedsIndex];
		ySpeed = randomSpeeds[randomSpeedsIndex];
		//ellipse(x, y, diameter, diameter);
		newBurst = {
			diameter: diameter,
			x: x,
			y: y,
			xSpeed: xSpeed,
			ySpeed: ySpeed
		}
		changingBurstsArray.push(newBurst);

		randomDiametersIndex++
		if(randomDiametersIndex == 25) randomDiametersIndex = 0;

		randomSpeedsIndex++;
		if(randomSpeedsIndex == 10) randomSpeedsIndex = 0;
	}*/

	changingBurstsArray.push(newBurst);


};

function draw() {
	background(backgroundRed, backgroundGreen, backgroundBlue);

	for(var i=0; i<numberChangingBursts; i++) {
		drawBurst(changingBurstsArray[i]);
	}

	frame++;
};

var dist = 0;
function drawBurst(burst) {

	// check if mouse over circle
	/*dist = Math.sqrt( (burst.x-mouseX)*(burst.x-mouseX) + (burst.y-mouseY)*(burst.y-mouseY) );
	if( dist < (burst.diameter/2) ) {
		// burst to left of mouse
		if( burst.x < mouseX && (burst.x+(burst.diameter/2)) > mouseX ) {
			burst.xSpeed = Math.abs(burst.xSpeed) * (-1);
			burst.x += (burst.xSpeed*advoidMultiplier);
		}

		// burst to right of mouse
		if( burst.x > mouseX && (burst.x-(burst.diameter/2)) < mouseX ) {
			burst.xSpeed = Math.abs(burst.xSpeed);
			burst.x += (burst.xSpeed*advoidMultiplier);
		}

		// burst above mouse
		if( burst.y < mouseY && (burst.y+(burst.diameter/2)) > mouseY ) {
			burst.ySpeed = Math.abs(burst.ySpeed) * (-1);
			burst.y += (burst.ySpeed*advoidMultiplier);
		}

		// burst below mouse
		if( burst.y > mouseY && (burst.y-(burst.diameter/2)) < mouseY ) {
			burst.ySpeed = Math.abs(burst.ySpeed);
			burst.y += (burst.ySpeed*advoidMultiplier);
		}
	}*/

	// hit edge - top
	if(burst.y <= 0) {
		burst.ySpeed = Math.abs(burst.ySpeed) * (-1);
	}
	// bottom
	if(burst.y >= canvasHeight) {
		burst.ySpeed = Math.abs(burst.ySpeed);
	}
	// left
	if(burst.x <= 0) {
		burst.xSpeed = Math.abs(burst.xSpeed);
	}
	// right
	if(burst.x >= canvasWidth) {
		burst.xSpeed = Math.abs(burst.xSpeed) * (-1);
	}

	burst.x += burst.xSpeed;
	burst.y += burst.ySpeed;


	// draw it
	ellipse(burst.x, burst.y, burst.diameter, burst.diameter);
}
