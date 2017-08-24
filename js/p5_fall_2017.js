var canvas;
var i, r, g, b;

function preload() {
  img = loadImage("images/t9hacks_gradient.png");
}

function setup() {
	canvas = createCanvas(windowWidth, windowHeight);
	canvas.id('p5Container');
	
	background(32, 19, 65);
	strokeWeight(20);
	frameRate(1);
	
	fill(52, 39, 85);
}

function draw() {
	for (i = 0; i < width; i++) {
		r = random(32, 42);
		g = random(19, 29);
		b = random(65, 75);
		
		stroke(r, g, b);
		line(i, 0, i, height);
	}
}

