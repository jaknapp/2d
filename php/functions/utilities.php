<?php

function test_failed()
{
	echo new Exception("Test failed.\n");
}

function substr_start_count($haystack, $needle, $offset = 0, $length = NULL)
{
	$count = 0;
	
	while(TRUE)
	{
		$match = starts_with($haystack, $needle, $offset);
		
		if ($match)
		{
			$count++;
			$offset++;
		}
		
		if (!$match || $count === $length)
		{
			break;
		}
	}
	
	return $count;
}

function starts_with($haystack, $needle, $offset = 0)
{
	return "" === $needle || (0 + $offset) === strpos($haystack, $needle, $offset);
}

function ends_with($haystack, $needle, $offset = 0)
{
	return "" === $needle || $needle === substr($haystack, -strlen($needle) - $offset);
}