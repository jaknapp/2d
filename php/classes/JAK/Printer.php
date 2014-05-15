<?php

namespace JAK;

class Printer
{
	public
		$indentLevel,
		$indentLiteral,
		$newline
	;
	
	public function __construct()
	{
		$this->indentLevel = 0;
		$this->indentLiteral = "\t";
		$this->newline = "\n";
	}
	
	public function printOut($text)
	{
		return $this->formatToIndentLevel($text);
	}
	
	public function increaseIndent()
	{
		$this->indentLevel++;
	}
	
	public function decreaseIndentLevel()
	{
		if (0 < $this->indentLevel)
		{
			$this->indentLevel--;
		}
	}
	
	public function formatToIndentLevel($text)
	{
		// Determine indent level of $text
		$baseIndent = substr_start_count($text, $this->indentLiteral);
		$adjustment = $this->indentLevel - $baseIndent;
		
		// Indent
		if (0 < $adjustment)
		{
			$replacement = $this->newline;
			$replacement .= str_repeat($this->indentLiteral, $adjustment);
			$text = str_replace($this->newline, $replacement, $text);
		}
		
		// Unindent
		else if (0 > $adjustment)
		{
			$indentLen = strlen($this->indentLevel);
			$maxIndentLen = $indentLen * abs($adjustment);
			$lines = explode($this->newline, $text);
			
			foreach($lines as $i => $line)
			{
				$indent_count = substr_start_count($line, $this->indentLiteral, 0, $maxIndentLen);
				$lines[$i] = substr($line, $indent_count * $indentLen);
			}
			
			$text = implode($this->newline, $lines);
		}
		
		// No change
		else
		{
		}
		
		return $text;
	}
}