var canvas;
var background_r, background_g, background_b;
var i, r, g, b;

function preload() {
  img = loadImage("images/t9hacks_gradient.png");
}

function setup() {
	canvas = createCanvas(windowWidth, windowHeight);
	canvas.id('p5Container');
	
	background_r = 169;
	background_g = 145;
	background_b = 232;
	background(background_r, background_g, background_b);
	strokeWeight(20);
	frameRate(1);
	
	fill(52, 39, 85);
}

function draw() {
	for (i = 0; i < width; i++) {
		r = random(background_r, background_r+10);
		g = random(background_g, background_g+10);
		b = random(background_b, background_b+10);
		
		stroke(r, g, b);
		line(i, 0, i, height);
	}
}

