window.requestAnimationFrame = function() {
	return window.requestAnimationFrame ||
		window.webkitRequestAnimationFrame ||
		window.mozRequestAnimationFrame ||
		window.msRequestAnimationFrame ||
		window.oRequestAnimationFrame ||
		function(f) {
			window.setTimeout(f,1e3/60);
		}
}();

var canvas = document.querySelector('canvas');
var ctx = canvas.getContext('2d');

var W = canvas.width;
var H = canvas.height;

// We want to move/slide/scroll the background
// as the player moves or the game progresses

// Velocity X
var vx = 0;

var img = new Image();
img.src = "img/city.png";

(function renderGame() {
	window.requestAnimationFrame(renderGame);
	
	ctx.clearRect(0, 0, W, H);
	
	ctx.fillStyle = "rgba(0, 0, 0, 0)"
	ctx.fillRect(0, 0, 1366, 350);
	
	ctx.drawImage(img, vx, 0);
	ctx.drawImage(img, img.width-Math.abs(vx), 0);
	
	if (Math.abs(vx) > img.width) {
		vx = 0;
	}
	
	vx -= 0.25;
}());