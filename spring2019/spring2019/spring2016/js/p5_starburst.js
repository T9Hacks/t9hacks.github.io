/*
var canvasHeight = $("header").height();
var canvasWidth = $("header").width();
	
$(document).ready(function(){
	canvasHeight = $("header").height();
	canvasWidth = $("header").width();
	//console.log(canvasHeight + " " + canvasWidth);

	$("#headerCanvas")
		.height(canvasHeight)
		.width(canvasWidth);
	
});

*/






/*

var img;
var smallPoint, largePoint;

var colors = [];
var index = 0;

var angle = 0;

// function preload() {
//   img = loadImage("../images/bg.jpg");

// }
var alph = 10;

function setup() {
  var canvas = createCanvas(windowWidth, windowHeight);
  canvas.id('headerCanvas'); 
  colors.push(color(255, 200, 0, 6));
  colors.push(color(237, 70, 47, 1));
  //colors.push(color(123, 123, 98, alph));
  // colors.push(color(64, 64, 64, alph));  
  smallPoint = 20;
  largePoint = 60;
  imageMode(CENTER);
  noStroke();
  clear();
  angleMode(RADIANS);
}

function draw() {

  for (var i = 0; i < 15; i++) {
    var v = p5.Vector.random2D();

    var wave = map(sin(angle), -1, 1, 0, 4);

    v.mult(random(1, 20*wave));
    var pointillize = random(smallPoint, largePoint);
    var x = mouseX + v.x;//floor(random(img.width));
    var y = mouseY + v.y;//floor(random(img.height));
    //var pix = img.get(x, y);
    //fill(pix[0],pix[1], pix[2], 52);
    fill(colors[index]);
    ellipse(x, y, pointillize, pointillize);
  }

  if (random(1) < 0.01) {
    index = (index + 1) % colors.length;
  }

  angle += 0.02;
}


*/






/*
function setup() {
	var canvas = createCanvas(windowWidth, windowHeight);
	  canvas.id('headerCanvas');
	
	
  noStroke();
}

function draw() {
  drawCloud(mouseX, mouseY);
}

var backRed = 170;
var backGreen = 136;
var backBlue = 170;

var colorDiff = 0;
var rad = 100;

function drawCloud(x, y) {
  
  colorDiff = random(-rad, rad);
  fill(backRed+colorDiff, backGreen+colorDiff, backBlue+colorDiff);
  
  for(var i=-rad; i<rad; i++) {
    for(var j=-rad; j<rad; j++) {
      if( random(1000) < 5 && dist(x, y, (x+i), (y+j))  <= rad ) {
         ellipse(x+i, y+j, 2, 2);
      }
    }
  }
  
}

*/










var starsStart = 100;
var starsCount = starsStart;
var starsMax = 150;
var starsMore = 0;
var stars = new Array(starsMax); 

var backRed = 170;
var backGreen = 136;
var backBlue = 170;

var btnMargin = 20;

var resetBtnHeight = 30;
var resetBtnWidth = 110;
var resetBtnY = 0;
var resetBtnX = btnMargin;

var ee1BtnDiameter = 30;
var ee1BtnRadius = ee1BtnDiameter / 2;
var ee1BtnY = 0;
var ee1BtnX = 0;
var ee1Inside = false;
var ee1On = false;

var ee2BtnDiameter = 30;
var ee2BtnRadius = ee1BtnDiameter / 2;
var ee2BtnY = 0;
var ee2BtnX = 0;
var ee2Inside = false;
var ee2On = false;

var canvasWidth = 0;
var canvasHeight = 0;


function setup() {
	canvasWidth = windowWidth;
	canvasHeight = $("#header").height();
	
	var canvas = createCanvas(canvasWidth, canvasHeight);
	canvas.id('headerCanvas');
	  
	
	
	resetBtnY = canvasHeight-btnMargin-resetBtnHeight;
	ee1BtnY = canvasHeight-btnMargin-ee1BtnRadius;
	ee1BtnX = canvasWidth-btnMargin-ee1BtnRadius;
	
	ee2BtnY = canvasHeight-btnMargin-ee2BtnRadius;
	ee2BtnX = canvasWidth-btnMargin-ee2BtnDiameter-btnMargin-ee2BtnRadius;
	
	
	
	background(backRed, backGreen, backBlue);
	
	noStroke();
	
	for(var i=0; i<starsCount; i++) {
		var size = Math.floor((Math.random() * 6) + 5); // between 5 and 11 (inclusive)
		var speed = map(size, 5, 11, 0.7, 0.3);
		var speed1 = map(size, 5, 11, 0.7, 0.3) * Math.random()+1;
		var speed2 = map(size, 5, 11, 0.7, 0.3) * Math.random()+1;
		var xSpeed = ( (Math.random() < 0.5) ? (speed*(-1)) : speed );
		var ySpeed = ( (Math.random() < 0.5) ? (speed*(-1)) : speed );
		var colorDiff = map(size, 5, 11, 5, 11);
		stars[i] = {
			x: Math.floor((Math.random() * canvasWidth) + 1), 
			y: Math.floor((Math.random() * canvasHeight) + 1),
			speed: speed,
			speed1: speed1,
			speed2: speed2,
			xSpeed: xSpeed,
			ySpeed: ySpeed,
			colorRed: backRed + colorDiff,
			colorGreen: backGreen + colorDiff,
			colorBlue: backBlue + colorDiff,
			size: size
		};
		drawDot(stars[i], true);
	}
};

function draw() {
	//background(backRed, backGreen, backBlue);
	for(var i=0; i<starsCount; i++) {
		drawDot(stars[i], (i<100));
	}
	
	drawButtons();
	//console.log("in draw");
};

function drawDot(star, preSetDot) {
	// determine fill color
	if(preSetDot) {
		fill(star.colorRed, star.colorGreen, star.colorBlue);
	} else
		fill(200, 184, 226);
	
	// draw dot
	ellipse(star.x, star.y, star.size, star.size);
	
	// if edge, bounce
	if(star.x <= 20 || star.x >= (canvasWidth-6)) {
		star.xSpeed *= (-1);
	}
	if(star.y <= 15 || star.y >= (canvasHeight-4)) {
		star.ySpeed *= (-1);
	}
	
	// move dot
	if(ee1On) {
		star.x += (star.xSpeed + ((Math.random() < 0.5) ? (-1) : 1));
		star.y += (star.ySpeed + ((Math.random() < 0.5) ? (-1) : 1));
	} if(ee2On) {
		star.x += star.xSpeed;
		star.y += star.ySpeed;
	} else {
		star.x += star.xSpeed;
		star.y += star.ySpeed;
	}
};

function drawButtons() {
	// draw the restart button
	if(mouseX >= resetBtnX && mouseX <= resetBtnX+resetBtnWidth && mouseY >= resetBtnY && mouseY <= resetBtnY+resetBtnHeight) 
		fill(backRed-50, backGreen-50, backBlue-50);
	else
		fill(backRed-30, backGreen-30, backBlue-30);
	rect(resetBtnX, resetBtnY, resetBtnWidth, resetBtnHeight);
	fill(0);
	text("Reset Animation", resetBtnX+10, resetBtnY+20);
	//console.log("resetBtnX: " + resetBtnX + " resetBtnY: " + resetBtnY);

	// draw easter egg 1
	if(mouseX >= (ee1BtnX-ee1BtnRadius) && mouseX <= (ee1BtnX+ee1BtnRadius) && mouseY >= (ee1BtnY-ee1BtnRadius) && mouseY <= (ee1BtnY+ee1BtnRadius)) {
		fill(backRed-30, backGreen-30, backBlue-30);
		ellipse(ee1BtnX, ee1BtnY, ee1BtnDiameter, ee1BtnDiameter);
		fill(0);
		text("1", ee1BtnX-2, ee1BtnY+4);
		ee1Inside = true;
	} else if (ee1Inside) {
		ee1Inside = false;
		fill(stars[0].colorRed, stars[0].colorGreen, stars[0].colorBlue);
		ellipse(ee1BtnX-1, ee1BtnY-1, ee1BtnDiameter+2, ee1BtnDiameter+2);
	}
	
	// draw easter egg 2
	if(mouseX >= (ee2BtnX-ee2BtnRadius) && mouseX <= (ee2BtnX+ee2BtnRadius) && mouseY >= (ee2BtnY-ee2BtnRadius) && mouseY <= (ee2BtnY+ee2BtnRadius)) {
		fill(backRed-30, backGreen-30, backBlue-30);
		ellipse(ee2BtnX, ee2BtnY, ee2BtnDiameter, ee2BtnDiameter);
		fill(0);
		text("2", ee2BtnX-2, ee2BtnY+4);
		ee2Inside = true;
	} else if (ee2Inside) {
		ee2Inside = false;
		fill(stars[3].colorRed, stars[3].colorGreen, stars[3].colorBlue);
		ellipse(ee2BtnX-1, ee2BtnY-1, ee2BtnDiameter+2, ee2BtnDiameter+2);
	}
};

function mousePressed() {
	// if pressed the mouse reset button
	if(mouseX >= resetBtnX && mouseX <= resetBtnX+resetBtnWidth && mouseY >= resetBtnY && mouseY <= resetBtnY+resetBtnHeight) {
		background(backRed, backGreen, backBlue);
		starsCount = 100;
		starsMore = 0;
		
	// if pressed ee1
	} else if(mouseX >= (ee1BtnX-ee1BtnRadius) && mouseX <= (ee1BtnX+ee1BtnRadius) && mouseY >= (ee1BtnY-ee1BtnRadius) && mouseY <= (ee1BtnY+ee1BtnRadius)) {
		ee1On = !ee1On;
		
		// if pressed ee1
	} else if(mouseX >= (ee2BtnX-ee2BtnRadius) && mouseX <= (ee2BtnX+ee2BtnRadius) && mouseY >= (ee2BtnY-ee2BtnRadius) && mouseY <= (ee2BtnY+ee2BtnRadius)) {
		ee2On = !ee2On;
		
		if(ee2On) {
			for(var i=0; i<starsCount; i++) {
				stars[i].xSpeed = ( (Math.random() < 0.5) ? (stars[i].speed1*(-1)) : stars[i].speed1 );
				stars[i].ySpeed = ( (Math.random() < 0.5) ? (stars[i].speed2*(-1)) : stars[i].speed2 );
			} 
		} else {
			for(var i=0; i<starsCount; i++) {
				stars[i].xSpeed = ( (Math.random() < 0.5) ? (stars[i].speed*(-1)) : stars[i].speed );
				stars[i].ySpeed = ( (Math.random() < 0.5) ? (stars[i].speed*(-1)) : stars[i].speed );
			}
		}
		
	// else add extra line
	} else {
		var size = Math.floor((Math.random() * 6) + 5); // between 5 and 11 (inclusive)
		var speed = map(size, 5, 11, 0.7, 0.3);
		var speed1 = map(size, 5, 11, 0.7, 0.3) * Math.random()+1;
		var speed2 = map(size, 5, 11, 0.7, 0.3) * Math.random()+1;
		var xSpeed = ( (Math.random() < 0.5) ? (speed*(-1)) : speed );
		var ySpeed = ( (Math.random() < 0.5) ? (speed*(-1)) : speed );
		
		stars[(starsStart+starsMore)] = {
			x: mouseX, 
			y: mouseY,
			speed: speed,
			speed1: speed1,
			speed2: speed2,
			xSpeed: xSpeed,
			ySpeed: ySpeed,
			diff: 0,
			size: size
		};
		
		if(starsCount < starsMax) {
			starsCount++;
			starsMore++;
		} else {
			if(starsMore >= (starsMax-starsStart)) {
				starsMore = 0;
			} else {
				starsMore++;
			}
		}
	}
};
