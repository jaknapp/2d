<?php

class GameMap {
	public static $db;
	public static create($props) {
		return $this->db->insert('maps', $props);
	}
	public function __construct($id) {
		$this->id = $id;
	}
}