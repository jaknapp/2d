<?php

// Mark each entry as stale.
// Add and update entries in the table.
// Remove any entries that are not fresh in the table.

class SyncTable
{
	public function Sync($entries)
	{
		$this->MarkEntriesStale();
		
		while(1)
		{
			$entry = $entries->Next();
			$entry['Fresh'] = 1;
			$this->rdb->ExecuteInsertUpdate($this->TableName, $entry);
		}
		
		$this->RemoveStaleEntries();
	}
	
	public function MarkEntriesStale()
	{
		$this->rdb->Execute
		("
			UPDATE
				{$this->TableName}
			SET
				Fresh = 0"
		);
	}
	
	public function RemoveStaleEntries()
	{
		$this->rdb->Execute
		("
			DELETE
				*
			FROM
				{$this->TableName}
			WHERE
				Fresh = 0"
		);
	}
}