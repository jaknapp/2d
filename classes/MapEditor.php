<?php

class MapEditor {
	public function __construct($db) {
		$this->db = $db;
	}
	public function addTileset($tileset) {
		return $this->db->insert('tilesets', $tileset);
	}
	public function addTile($tile) {
		return $this->db->insert('tiles', $tile);
	}
	public function addMap($map) {
		return $this->db->insert('maps', $map);
	}
}