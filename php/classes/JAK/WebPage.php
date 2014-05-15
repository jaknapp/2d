<?php

class WebPage
{
	public
		$doctype,
		$title,
		$head
	;
	
	public function __construct()
	{
		$this->doctype = "<!doctype html>";
		$this->title = NULL;
		$this->head = "";
	}
	
	public function getTitle()
	{
		if (NULL === $this->title)
		{
			$path = pathinfo($_SERVER['PHP_SELF']);
			$title = $path['filename'];
			$title = preg_replace("/[^a-zA-Z0-9]/", " ", $title);
			$title = preg_replace("/ +/", " ", $title);
			$title = ucwords($title);
			return $title;
		}
		
		return $this->title;
	}
	
	public function getHead()
	{
		return $this->head;
	}
	
	public function addCss($href)
	{
		$this->head .= "<link rel='stylesheet' type='text/css' href='{$src}'/>";
	}
	
	public function addScript($src)
	{
		$this->head .= "<script src='{$src}'></script>";
	}
	
	public function getHtml()
	{
		$html = $this->doctype;
		$html .= "<head>";
		$html .= "<title>" . $this->getTitle() . "</title>";
		$html .= $this->getHead();
		$html .= $this->getContent();
		return $html;
	}
}