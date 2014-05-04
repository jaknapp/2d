<html>
<head>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="js/util.js"></script>
<script src="js/test-canvas.js"></script>
<script>
/*$(function(e)
{
	var canvas = document.getElementById('game-client');
    var img = new Image();
    var ctx = canvas.getContext("2d");
    var canvasCopy = document.createElement("canvas");
    var copyContext = canvasCopy.getContext("2d");

	var maxWidth = 64;
	var maxHeight = 64;
    
    img.onload = function()
    {
        var ratio = 1;

        if(img.width > maxWidth)
            ratio = maxWidth / img.width;
        else if(img.height > maxHeight)
            ratio = maxHeight / img.height;

        canvasCopy.width = img.width;
        canvasCopy.height = img.height;
        copyContext.drawImage(img, 0, 0);

        canvas.width = img.width * ratio;
        canvas.height = img.height * ratio;
        ctx.drawImage(canvasCopy, 0, 0, canvasCopy.width, canvasCopy.height, 0, 0, canvas.width, canvas.height);
    };

    img.src = 'tilesets/war2_trees_autotile.png';
});*/
function draw() {
	var ctx = document.getElementById('light').getContext('2d');
	var radgrad = ctx.createRadialGradient(250, 250, 0, 250, 250, 250);
	radgrad.addColorStop(0, 'rgba(255, 200, 0, 0)');
	radgrad.addColorStop(1, 'rgba(0, 0, 0, 1)');
	ctx.fillStyle = radgrad;
	// ctx.fillStyle = 'red';
	ctx.fillRect(0, 0, 500, 500);
}
</script>
</head>
<body class='map' onload='draw()' style='overflow:hidden; position:relative;'>
<canvas width='500' height='500' id='light' style='z-index:10; position:absolute; left:50%; top:50%; margin-left:-250px; margin-top:-250px;'></canvas>
<!--<canvas class='game-client' id='game-client'></canvas>-->
</body>
</html>