<html>
<head>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="js/util.js"></script>
<!--<script src="js/test-canvas.js"></script>-->
<style>
body { margin: 0; padding: 0}
.map {
	overflow: hidden;
}
</style>
</head>
<body>
<svg 
	width="100%" 
	height="100%" 
	version="1.1"
    xmlns="http://www.w3.org/2000/svg" 
	xmlns:xlink= "http://www.w3.org/1999/xlink"  
	class='map'
	id='map'
>
	<svg width='186px' height='186px' x='50%' y='50%'>
		<image 
			xlink:href="tilesets/war2_trees_autotile.png" 
			width="192px" 
			height="250px" 
			x="0" 
			y="-64px"
			shape-rendering='crispEdges'
		/>
	</svg>
</svg>
</body>
</html>