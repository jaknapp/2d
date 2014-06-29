<html>
<head>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script>
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

function Screen(id, origin, zoom, objects)
{
	this.m_id = id;
	this.m_origin = origin;
	this.m_zoom = zoom;
	this.m_objects = objects;
}

Screen.prototype.id = function()
{
	return this.m_id;
};

Screen.prototype.wu = function()
{
	return this.m_wu;
};

Screen.prototype.px = function()
{
	return this.m_px;
};

Screen.prototype.refresh = function()
{
	// Screen dimensions and position in World Units
	var wu = {
		w: this.zoom.w(),
		h: this.zoom.h(),
		x: this.m_origin.x(),
		y: this.m_origin.y()
	};
	
	// Screen dimensions and position in pixels
	var px = {
		w: parseFloat($(this.id).css("width")),
		h: parseFloat($(this.id).css("height"))
	};
	
	px.perWu = px.w / wu.w;
	px.x = px.perWu * wu.x;
	px.y = px.perWu * wu.y;
	
	wu.perPx = wu.w / px.w;

	this.m_wu = wu;
	this.m_px = px;
	
	// Refresh screen position
	this.m_world = $(id)children(".world").first();
	this.m_world.css("left", (-px.x) + "px");
	this.m_world.css("top", (-px.y) + "px");
	
	// Refresh each world object
	for(var i in this.m_objects)
	{
		var wo = this.m_objects[i];
		
		var leftPx = wo.x() * px.perWu.w + "px";
		var topPx  = wo.y() * px.perWu.h + "px";
		var widthPx = wo.w() * px.perWu.w + "px";
		var heightPx = wo.h() * px.perWu.h + "px";

		this.m_element.css("position", "absolute");
		this.m_element.css("left", leftPx);
		this.m_element.css("top", topPx);
		this.m_element.css("width", widthPx);
		this.m_element.css("height", heightPx);
	}
};

Screen.prototype.add = function(wo)
{
	this.m_objects.push(
	this.m_element = $("<div/>");
	this.m_element.addClass("sprite");
	this.m_element.addClass(this.spriteClass);
	this.m_element.appendTo(this.m_world.element);


World.prototype.add = function(wo)
{
	this.m_element = $("<div/>");
	
	var leftPx = wo.pos.x * xPxPerWu + "px";
	var topPx  = wo.pos.y * yPxPerWu + "px";
	var widthPx = wo.dim.w * xPxPerWu + "px";
	var heightPx = wo.dim.h * yPxPerWu + "px";

	this.m_element.css("position", "absolute");
	this.m_element.css("left", leftPx);
	this.m_element.css("top", topPx);
	this.m_element.css("width", widthPx);
	this.m_element.css("height", heightPx);
	this.m_element.addClass("sprite");
	this.m_element.addClass(this.spriteClass);
	this.m_element.appendTo(this.m_world.element);
};

function Client()
{
	this.m_screen = new Screen("#main-screen");
	this.m_world = new World(
}

$(new Client());
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
<body><div id='main-screen' worldunitsw='250' worldunitsh='250'><div class='world'></div></div></body>
</html>