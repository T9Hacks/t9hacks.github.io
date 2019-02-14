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






var numberSquaresHor = 0;
var numberSquaresVer = 0;
var numberSquaresTotal = 0;
var squareWidth = 0
var squareHeight = 0;
var squareRatio = 300;
var squareArray = [];

var randomColors = [
	[61, 32,  93], [52, 27,  92], [70, 17,  88], [69, 35, 101], [53, 28,  98],
	[54, 18,  88], [55, 21, 101], [60, 25,  96], [59, 30,  93], [69, 26,  96],

	[64, 32,  98], [60, 32, 101], [64, 26,  96], [65, 23,  95], [53, 35, 101],
	[58, 26,  95], [54, 30,  96], [62, 26,  87], [55, 20,  92], [55, 33, 104],

	[63, 19,  94], [64, 23,  95], [51, 19,  98], [61, 25,  94], [62, 27,  90],
	[70, 30,  98], [55, 25,  94], [65, 36,  86], [56, 20,  99], [57, 36, 101],

	[53, 30,  98], [69, 18,  86], [52, 34, 102], [53, 21, 101], [64, 21, 101],
	[68, 25, 103], [57, 18,  91], [66, 21, 100], [54, 22,  92], [53, 34, 101],

	[61, 32,  93], [63, 24,  91], [54, 30,  96], [65, 23,  95], [68, 32,  87],
	[66, 21, 102], [61, 20,  92], [65, 22, 103], [53, 20,  89], [55, 34,  86]
];
var randomColorSpeeds2 = [
	[ 1,  1,  1], [ 1, -1,  1], [ 1, -1, -1], [ 1, -1, -1], [-1, -1,  1],
	[ 1,  1, -1], [-1,  1,  1], [-1, -1, -1], [-1,  1,  1], [-1,  1, -1],

	[ 1, -1,  1], [-1, -1,  1], [-1,  1, -1], [ 1,  1, -1], [-1, -1, -1],
	[ 1, -1,  1], [ 1, -1, -1], [-1, -1, -1], [ 1, -1,  1], [ 1, -1,  1],

	[ 1,  1,  1], [ 1,  1,  1], [-1,  1, -1], [-1,  1, -1], [-1, -1,  1],
	[-1,  1,  1], [ 1, -1, -1], [ 1,  1,  1], [-1,  1, -1], [ 1, -1, -1],

	[-1,  1, -1], [ 1,  1,  1], [-1, -1,  1], [-1, -1, -1], [ 1,  1, -1],
	[-1,  1,  1], [ 1,  1, -1], [-1, -1,  1], [ 1, -1, -1], [-1, -1, -1],

	[-1, -1, -1], [-1,  1,  1], [-1, -1,  1], [-1, -1, -1], [ 1, -1, -1],
	[-1, -1, -1], [ 1, -1,  1], [ 1,  1, -1], [-1, -1, -1], [ 1,  1,  1]
];


function setup() {

	// setup the canvas
	canvasWidth = document.body.clientWidth;
	canvasHeight = window.innerHeight;
	//console.log(canvasWidth + " - " + canvasHeight);

	if(canvasWidth >= 767) {
		canvas = createCanvas(canvasWidth, canvasHeight);
		canvas.id(canvasID);
		canvas.parent(canvasParentID);


		// attributes
		noStroke();
		frameRate(60);
		fill(61, 27, 95, 175);

		// calc number of squares
		var totalPixels = canvasWidth*canvasHeight;
		numberSquaresHor = Math.ceil( (canvasWidth)/squareRatio );
		numberSquaresVer = Math.ceil( (canvasHeight)/squareRatio );
		numberSquaresTotal = numberSquaresHor * numberSquaresVer;
		//console.log(numberSquaresTotal);
		
		// calc size of squares
		squareWidth = Math.ceil(canvasWidth / numberSquaresHor);
		squareHeight = Math.ceil(canvasHeight / numberSquaresVer);
		
		
		// create points
		for(var i=0; i<numberSquaresVer; i++) {
			for(var j=0; j<numberSquaresHor; j++) {
				
			}
		}
		
		
		
	}
};


function draw() {
	if(canvasWidth >= 767) {
		background(255);

		for(var i=0; i<numberBursts; i++) {
			drawBurst(burstsArray[i]);
		}
	}
};