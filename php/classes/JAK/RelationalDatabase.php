<?php

namespace JAK;

class RelationalDatabase
{
	public
		$pdo;
	
	public function ExecuteInsertUpdate($tableName, $fields)
	{
		foreach($fields as $column => $value)
		{
			$columns[] = $column;
			$values[] = $value;
		}
		
		$stmt = $this->PrepareInsertUpdate($tableName, $columns);
		
		if (!$stmt)
		{
			return $stmt;
		}
		
		$success = $stmt->execute($values);
		
		if (!$success)
		{
			// TODO
		}
		
		return $stmt;
	}
	
	public function PrepareInsertUpdate($tableName, $columns)
	{
		$sql = $this->InsertUpdateSql($tableName, $columns);
		return $this->pdo->prepare($sql);
	}
	
	public function InsertUpdateSql($tableName, $columns)
	{
		$updateFields = $columns;
		
		foreach($updateFields as $i => $field)
		{
			$updateFields[$i] .= " = ?";
		}
		
		$insertColumnDelim = ",\n\t\t\t\t\t";
		$insertValueDelim = ",\n\t\t\t\t";
		$updateFieldDelim = ",\n\t\t\t\t";
		
		$insertColumns = implode($insertColumnDelim, $columns);
		$insertValues = implode($insertValueDelim, array_fill(0, count($columns), '?'));
		$updateSet = implode($updateFieldDelim, $updateFields);
		
		return "
			INSERT INTO
				{$tableName}
				(
					{$insertColumns}
				)
			VALUES
			(
				{$insertValues}
			}
			ON DUPLICATE KEY UPDATE
				{$updateSet}";
	}
}