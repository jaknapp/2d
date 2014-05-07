<html>
<head>
<script src="js/canvasquery.js"></script>
     <script src="js/canvasquery.framework.js"></script>
     </head>
     <body>
     </body>
     <script type='text/javascript'>
     var player = {
       x: 0,
       y: 0,
       rotation: 0,
       width: 32,
       height: 32
     };

/* create fullscreen canvas */

cq().framework({

  onresize: function(width, height) {

        /* resize canvas with window */
        this.canvas.width = width;
        this.canvas.height = height;
    },

        onmousemove: function(x, y) {

        /* save mouse x, y */
        player.x = x;
        player.y = y;
    },

        onstep: function(delta) {

        /* rotate player */
        player.rotation += 0.05;
    },

        onrender: function() {

//        this.drawSprite("http://ec2-54-186-144-107.us-west-2.compute.amazonaws.com/2d/tilesets/war2_trees_autotile.png", [0, 0, 32, 32], 0, 0, 1);

        this.drawImage("http://ec2-54-186-144-107.us-west-2.compute.amazonaws.com/2d/tilesets/war2_trees_autotile.png", 32, 32);
        /* draw player */
        this.save()
            .clear("#220033")
            .translate(player.x, player.y)
            .rotate(player.rotation)
            .fillStyle("#00ffff")
            .fillRect( -player.width / 2, -player.height / 2, player.width, player.height)
            .restore();
    }

}).appendTo("body");
</script>
     <style>
     body { margin: 0; }
</style>

</html>