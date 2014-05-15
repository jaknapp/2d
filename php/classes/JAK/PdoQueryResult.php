<?php

namespace JAK;

class PdoQueryResult implements \Iterator
{
	public
		$stmt,
		$tableData,
		$currentRowData,
		$currentRowIndex,
		$fetchedAll,
		$valid
	;
		
	public function statement($stmt)
	{
		if ($this->stmt === $stmt)
		{
			return;
		}
		
		$this->tableData = array();
		$this->fetchedAll = FALSE;
		$this->stmt = $stmt;
	}
	
	public function current()
	{
		return $this->currentRowData;
	}
	
	public function key()
	{
		return $this->currentRowIndex;
	}
	
	public function next()
	{
		$this->currentRowIndex++;
		
		// The next data is already fetched
		if ($this->currentRowIndex < count($this->tableData))
		{
			$this->currentRowData = $this->tableData[$this->currentRowIndex];
			$this->valid = TRUE;
			return;
		}
		
		// The next data is not fetched and cannot be fetched
		if ($this->fetchedAll)
		{
			$this->valid = FALSE;
			return;
		}
		
		// An attempt to fetch the next data can be made
		$this->currentRowData = $this->stmt->fetchObject();
		
		// Attempt failed
		if (FALSE === $this->currentRowData)
		{
			$this->fetchedAll = TRUE;
			$this->valid = FALSE;
			return;
		}
		
		// Attempt success
		$this->tableData[] = $this->currentRowData;
		$this->valid = TRUE;
	}
	
	public function rewind()
	{
		$this->currentRowIndex = -1;
		$this->next();
	}
	
	public function valid()
	{
		return $this->valid;
	}
}