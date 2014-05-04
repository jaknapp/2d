
function TileSet(options) {
	this.width = null;
	this.height = null;
	this.url = null;
	this.tiles = [];
	$(this).options(options);
}

TileSet.prototype.addTile = function(tile, tilename) {
	this.tiles.push(tile);
	tile.tileset = this;
	
	if (tilename) {
		this[tilename] = tile;
	}
	
	return this;
};

function Tile(options) {
	this.offset = {};
	this.offset.x = null;
	this.offset.y = null;
	this.width = null;
	this.height = null;
	this.tileset = {};
	$(this).options(options);
}

function Map(options) {
	this.client = {};
	this.client.coords = {};
	this.client.coords.x = null;
	this.client.coords.y = null;
	
	// // Pixels per unit
	// this.ppu = 64;
	this.ppu = 186;
	$(this).options(options);
}

Map.prototype.makeSprite = function(tile, coords, size) {
	var sprite = new Sprite({
		width: size.width * this.ppu,
		height: size.height * this.ppu,
		tile: tile,
		coords: coords
	});
	
	var tileset_width_factor = sprite.width / tile.width;
	var tileset_height_factor = sprite.height / tile.height;
	
	var bg_width = tile.tileset.width * tileset_width_factor;
	var bg_height = tile.tileset.height * tileset_height_factor;
	
	var sprite_offset_x = sprite.coords.x * this.ppu - sprite.width / 2;
	var sprite_offset_y = sprite.coords.y * this.ppu - sprite.height / 2;
	 
	var bg_offset_x = tile.offset.x * tileset_width_factor;
	var bg_offset_y = tile.offset.y * tileset_height_factor
	
	$('<div/>')
		.addClass(tile.attr_class)
		.css('position', 'absolute')
		.css('width', sprite.width + 'px')
		.css('height', sprite.height + 'px')
		.css('top', '50%')
		.css('left', '50%')
		.css('margin-left', sprite_offset_x + 'px')
		.css('margin-top', sprite_offset_y + 'px')
		.css('background-image', 'url("' + tile.tileset.url + '")')
		.css('background-position', -bg_offset_x + 'px ' + -bg_offset_y + 'px')
		.css('background-size', bg_width + 'px ' + bg_height + 'px')
		.css('background-repeat', 'no-repeat')
		.css('z-index', sprite.coords.z)
		.appendTo('.map')
	;
};

function Sprite(options) {
	this.width = null;
	this.height = null;
	this.tile = {};
	this.coords = {};
	this.coords.x = null;
	this.coords.y = null;
	$(this).options(options);
}

var map = new Map({client: {coords: {x: 0, y: 0}}});
var tilesets = {};

$(function(){
	tilesets.trees = new TileSet({
		url: 'tilesets/war2_trees_autotile.png',
		width: 96,
		height: 125
	});
	
	tilesets.trees.addTile(
		new Tile({offset: {x: 0, y: 0}, width: 32, height: 32}), 'tree'
	).addTile(
		new Tile({offset: {x: 0, y: 0}, width: 32, height: 32}), 'bridge'
	).addTile(
		new Tile({offset: {x: 0, y: 0}, width: 32, height: 32}), 'trees'
	).addTile(
		new Tile({offset: {x: 0, y: 32}, width: 96, height: 93}), 'tree_clump'
	);
	
	map.makeSprite(
		tilesets.trees.tree_clump, 
		{x: 0, y: 0}, 
		{width: 1, height: 1}
	);
	map.makeSprite(
		tilesets.trees.tree_clump, 
		{x: 2, y: 4}, 
		{width: 5, height: 5}
	);
});