<html>
<head>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script>
// function Map() {
	// this.tiles = [
		// {
			// // width: 96,
			// // height: 93,
			// width: 64,
			// height: 64,
			// x: -1,
			// y: 0,
			// z: 0,
			// coord_width: 1,
			// coord_height: 1,
			// tile_set_file: 'tilesets/war2_trees_autotile.png',
			// tile_set_width: 96,
			// tile_set_height: 125,
			// tile_offset_x: 0,
			// tile_offset_y: 33,
			// tile_width: 95,
			// tile_height: 93,
		// },
		// {
			// // width: 96,
			// // height: 93,
			// width: 64,
			// height: 64,
			// x: 0,
			// y: 0,
			// z: 0,
			// coord_width: 1,
			// coord_height: 1,
			// tile_set_file: 'tilesets/war2_trees_autotile.png',
			// tile_set_width: 96,
			// tile_set_height: 125,
			// tile_offset_x: 0,
			// tile_offset_y: 33,
			// tile_width: 95,
			// tile_height: 93
		// },
		// {
			// // width: 96,
			// // height: 93,
			// width: 64,
			// height: 64,
			// x: 1,
			// y: 0,
			// z: 0,
			// coord_width: 1,
			// coord_height: 1,
			// tile_set_file: 'tilesets/war2_trees_autotile.png',
			// tile_set_width: 96,
			// tile_set_height: 125,
			// tile_offset_x: 0,
			// tile_offset_y: 33,
			// tile_width: 95,
			// tile_height: 93
		// },
		// {
			// // width: 96,
			// // height: 93,
			// width: 64,
			// height: 64,
			// x: 0,
			// y: -1,
			// z: 0,
			// coord_width: 1,
			// coord_height: 1,
			// tile_set_file: 'tilesets/war2_trees_autotile.png',
			// tile_set_width: 96,
			// tile_set_height: 125,
			// tile_offset_x: 0,
			// tile_offset_y: 33,
			// tile_width: 95,
			// tile_height: 93
		// },
		// {
			// // width: 96,
			// // height: 93,
			// width: 64,
			// height: 64,
			// x: 0,
			// y: 1,
			// z: 0,
			// coord_width: 1,
			// coord_height: 1,
			// tile_set_file: 'tilesets/war2_trees_autotile.png',
			// tile_set_width: 96,
			// tile_set_height: 125,
			// tile_offset_x: 0,
			// tile_offset_y: 33,
			// tile_width: 95,
			// tile_height: 93
		// },
	// ];
// }
// Map.prototype.draw = function() {
	// var map = this;
	// $(this.tiles).each(function() {
		// map.drawTile(this);
	// });
// };
// Map.prototype.drawTile = function(tile) {
	// if (!tile.element)
	// {
		// tile.element = $('<div/>');
	// }
	// tile.element
		// .addClass(tile.attr_class)
		// .css('position', 'absolute')
		// .css('width', tile.width*tile.coord_width + 'px')
		// .css('height', tile.height*tile.coord_height + 'px')
		// .css('top', '50%')
		// .css('left', '50%')
		// .css('margin-left', -tile.width/2 + tile.x*tile.width + 'px')
		// .css('margin-top', -tile.height/2 + tile.y*tile.height + 'px')
		// .css('background-image', 'url("' + tile.tile_set_file + '")')
		// // .css('background-position', -tile.tile_offset_x*tile.width/(tile.tile_width * tile.coord_width) + 'px ' + -tile.tile_offset_y*tile.height/(tile.tile_height * tile.coord_height) + 'px')
		// .css('background-position', -tile.tile_offset_x*tile.width*tile.coord_width/tile.tile_set_width + 'px ' + -tile.tile_offset_y*tile.height*tile.coord_height/tile.tile_set_height + 'px')
		// .css('background-size', tile.width*tile.coord_width/tile.tile_width*tile.tile_set_width + 'px ' + tile.height*tile.coord_height/tile.tile_height*tile.tile_set_height + 'px')
		// .css('background-repeat', 'no-repeat')
		// // .css('background-size', 'cover')
		// .css('z-index', tile.z)
		// .appendTo('.map')
	// ;
// };
// var map = new Map();
// $(function() {
	// var knight = {
		// width: 64,
		// height: 64,
		// x: 0,
		// y: -1,
		// z: 1,
		// coord_width: 1,
		// coord_height: 2,
		// tile_set_file: 'tilesets/Fighter black.png',
		// tile_set_width: 200,
		// tile_set_height: 200,
		// tile_offset_x: 0,
		// tile_offset_y: 100,
		// tile_width: 50,
		// tile_height: 50,
		// attr_class: 'player'
	// };
	// map.tiles.push(knight);
	// map.draw();
	// // $(knight.element).css('background-image', 'url(
	// // Move player right 1
	// $(map.tiles).each(function() {
		// if ($(this.element).hasClass('player')) {
			// // var stepping_right1 = $.extend({}, knight);
			// // var facing_right1 = $.extend({}, knight);
			// // var stepping_right2 = $.extend({}, knight);
			// // var facing_right2 = $.extend({}, knight);
			
			// // stepping_right1.tile_offset_x = 0;
			// // stepping_right1.tile_offset_y = 100;
			// // stepping_right1.duration = 250;
			
			// // facing_right1.tile_offset_x = 50;
			// // facing_right1.tile_offset_y = 100;
			// // facing_right1.duration = 250;
			
			// // stepping_right2.tile_offset_x = 100;
			// // stepping_right2.tile_offset_y = 100;
			// // stepping_right2.duration = 250;
			
			// // facing_right2.tile_offset_x = 150;
			// // facing_right2.tile_offset_y = 100;
			// // facing_right2.duration = 250;
			
			// // var walk_right_frames = [
				// // facing_right2,
				// // stepping_right1,
				// // facing_right1,
				// // stepping_right2,
				// // facing_right2,
				// // // stepping_right1,
				// // // stepping_right2,
				// // // stepping_right1,
				// // // stepping_right2,
				// // // facing_right2
				// // // facing_right2
			// // ];
			
			// // var walk_right_anim_duration = 1000;
			// // $(walk_right_frames).each(function() {
				// // this.duration = walk_right_anim_duration/walk_right_frames.length;
			// // });
			
			// // (function(frames) {
				// // function animate(frames) {
					// // var frame = frames.shift();
					// // console.log(frame);
					// // if (!frame) {
						// // return;
					// // }
					// // map.drawTile(frame);
					// // setTimeout(function(){animate(frames)}, frame.duration);
				// // }
				// // animate(frames);
			// // })(walk_right_frames);
			// return;
		// }
		// var this_tile = this;
		// $(this.element).animate
		// (
			// {
				// 'margin-left': parseInt($(this.element).css('margin-left')) - this.width
			// },
			// {
				// duration: 1000,
				// step: function() {
				// },
				// complete: function() {
					
				// },
				// easing: 0,
				// progress: function(animation, progress, remainingMs)
				// {
				// }
			// }
		// );
	// });
	// // $('div:not(.map .player)').each(function() {
		// // $(this).animate
		// // )
	// // );
// });

function ScreenElement(cssClass)
{
	this.cssClass = cssClass;
	this.element = $("<div/>");
}

function WorldObject(pos, dim, cssClass)
{
	this.pos = pos;
	this.dim = dim;
	this.se = new ScreenElement(cssClass);
}

var screen = {};

var xPxPerWu;
var yPxPerWu;
	
var loadClient = function()
{
	var xWu = parseFloat($("#main-screen").attr("worldunitsx"));
	var yWu = parseFloat($("#main-screen").attr("worldunitsy"));
	var xPx = parseFloat($("#main-screen").css("width"));
	var yPx = parseFloat($("#main-screen").css("height"));
	
	xPxPerWu = xPx / xWu;
	yPxPerWu = yPx / yWu;
	
	// wuToPx = function(wu)
	// {
		// return 
	// };
	
	// pxToWu = function(px)
	// {
		
	// };
	
	var xWorldOffset = -parseFloat($("#main-screen").attr("worldoriginx")) + "px";
	var yWorldOffset = -parseFloat($("#main-screen").attr("worldoriginy")) + "px";
	
	// screen.xWu = xWu;
	// screen.yWu = yWu;
	// screen.xPx = yPx;
	
	// screen.xPxPerWu = xPxPerWu;
	// screen.yPxPerWu = yPxPerWu;
	
	$(".world").css("left", xWorldOffset);
	$(".world").css("top", yWorldOffset);
	
	var worldObjects = [];
	worldObjects.push
	(
		new WorldObject
		(
			{
				x: 1000,
				y: 1000
			},
			{
				// w: 150,
				// h: 150
				w: 50,
				h: 50
			},
			"fighter-red-01"
		)
	);
	
	$(worldObjects).each(function(i, wo)
	{
		var leftPx = wo.pos.x * xPxPerWu + "px";
		var topPx  = wo.pos.y * yPxPerWu + "px";
		var widthPx = wo.dim.w * xPxPerWu + "px";
		var heightPx = wo.dim.h * yPxPerWu + "px";
		
		wo.se.element.css("position", "absolute");
		wo.se.element.css("left", leftPx);
		wo.se.element.css("top", topPx);
		wo.se.element.css("width", widthPx);
		wo.se.element.css("height", heightPx);
		wo.se.element.addClass("sprite");
		wo.se.element.addClass(wo.se.cssClass);
		wo.se.element.appendTo(".world");
	});
	
	var moveSpeedWuPerS = 10;
	
	var keyPress = function(event)
	{
		// "a"
		if (97 == event.which)
		{
			// mode.keyPressLeft();
			moveLeft(moveSpeedWuPerS);
		}
		// "d"
		else if (100 == event.which)
		{
			moveRight(moveSpeedWuPerS);
			// mode.keyPressRight();
		}
	};
	
	$("body").keypress(keyPress);
};

function moveLeft(wu)
{
	moveRight(-wu);
}

function moveRight(wu)
{
	var leftPx = parseFloat($(".world").css("left"));
	leftPx += wu * xPxPerWu;
	console.log("Moving world left" + (-(wu * xPxPerWu)) + ".");
	$(".world").animate
	(
		{
			"left": leftPx + "px"
		},
		{
			duration: 1000,
			step: function() {
			},
			complete: function() {
				
			},
			easing: 0,
			progress: function(animation, progress, remainingMs)
			{
			}
		}
	);
}

$(loadClient);
</script>
<style>
#main-screen
{
	width: 500px;
	height: 500px;
	overflow: hidden;
	margin-left: auto;
	margin-right: auto;
}
.world
{
	position: relative;
}
.sprite
{
	background-repeat: no-repeat;
	background-attachment: scroll;
	background-position: center center;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='slicer/images/fighter-red-01.png', sizingMethod='scale');
	-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='slicer/images/fighter-red-01.png', sizingMethod='scale')";
	zoom:1;
}
.fighter-red-01
{
	background-image: url("slicer/images/fighter-red-01.png");
}
</style>
</head>
<body><div id='main-screen' worldunitsx='250' worldunitsy='250' worldoriginx='1850' worldoriginy='1850'><div class='world'></div></div></body>
</html>