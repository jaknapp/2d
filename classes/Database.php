<?php

class Database
{
	public
		$dsn, 
		$username, 
		$password, 
		$driver_options;
		
	public function __construct
	(
		$dsn = NULL, 
		$username = NULL, 
		$password = NULL, 
		$driver_options = NULL
	)
	{
		$this->dsn = $dsn;
		$this->username = $username;
		$this->password = $password;
		$this->driver_options = $driver_options;
		
		if ($this->dsn)
		{
			$this->connect();
		}
	}
		
	public function connect()
	{
		$this->pdo = new PDO
		(
			$this->dsn,
			$this->username,
			$this->password,
			$this->driver_options
		);
	}
   
   public function exec($sql, $params = array())
   {
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute($params);
      return $stmt;
   }
   
	public function execFetchOne($sql, $params = array())
	{
		$stmt = $this->exec($sql, $params);
		
		if (!$stmt)
		{
			return NULL;
		}
		
		return $stmt->fetchObject();
	}
}
