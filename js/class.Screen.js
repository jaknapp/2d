/*//////////////////////////////////////////////////////////////////////////////
// Screen
//    Represents the client view port. Responsible for drawing objects relative 
// to the screens focal point.
//
// Methods
//    draw - Draw an object relative to the focal point.

To follow a character:
   Set the focus point to the character. Screen will set itself to 
   Character.focalPoint() and update as the character moves.

To follow a scene:
   Set the focus to the scene. Set the scene auto zoom if desired.
   
Set focus to a character to have the screen follow that character around.

domElement - the place on the page to draw the element.


//////////////////////////////////////////////////////////////////////////////*/

function Screen()
{
}

Screen.prototype.domElement = null;
Screen.prototype.focus = null;
Screen.prototype.tracking = null;
Screen.prototype.autozoom = false;
Screen.prototype.worldSizeWidth =

Screen.prototype.setWuWidth = function(wuWidth)
{
   this.wuWidth = wuWidth;
   this.xPxPerWu = this.getPxWidth() / wuWidth;
};

Screen.prototype.setWuWidth = function(wuWidth)
{
   this.wuWidth = wuWidth;
   this.xPxPerWu = this.getPxWidth() / wuWidth;
};

Screen.prototype.draw = function(wo)
{
   var point = focus.focalPoint();
   var scaling = 
   
   var leftPx = wo.pos.x * this.xPxPerWu + "px";
   var topPx  = wo.pos.y * this.yPxPerWu + "px";
   var widthPx = wo.dim.w * this.xPxPerWu + "px";
   var heightPx = wo.dim.h * this.yPxPerWu + "px";
   
   se.css("left", leftPx);
   se.css("top", topPx);
   se.css("width", widthPx);
   se.css("height", heightPx);
};