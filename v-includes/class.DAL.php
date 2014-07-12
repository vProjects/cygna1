<?php
	//include class library of database connecton
	include 'class.database.php';
	class ManageContent_DAL
	{
		public $link;
		
		//construct function
		function __construct()
		{
			$db_Connection = new dbConnection();
			$this->link = $db_Connection->connect();
			return $this->link;
		}
		
		
		function getValue($table_name,$value)
		{
			$query = $this->link->query("SELECT $value from $table_name");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		function getValue_descending($table_name,$value)
		{
			$query = $this->link->query("SELECT $value from $table_name ORDER BY `id` DESC");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		function getValue_descendingLimit($table_name,$value,$limit)
		{
			$query = $this->link->query("SELECT $value from $table_name ORDER BY `id` DESC LIMIT $limit");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		
		function getValue_distinct($table_name,$value)
		{
			$query = $this->link->query("SELECT DISTINCT $value from $table_name");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		function getValue_where($table_name,$value,$row_value,$value_entered)
		{
			try{
				$query = $this->link->prepare("SELECT $value from $table_name where $row_value='$value_entered'");
				$query->execute();
				$rowcount = $query->rowCount();
				if($rowcount > 0){
					$result = $query->fetchAll(PDO::FETCH_ASSOC);
					return $result;
				}
				else{
					return $rowcount;
				}
			}
			catch(Exception $e)
			{
				throw "Result Not Found";
			}
		}
		
		function getValueWhere_descending($table_name,$value,$row_value,$value_entered)
		{
			$query = $this->link->query("SELECT $value from $table_name where $row_value='$value_entered' ORDER BY `id` DESC");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		
		/*
		- method for inserting values to given table
		- Auth Dipanjan  
		*/
		function insertValue($table_name,$column_name,$column_values){
			//declaring variables for preparing the query
			$column = "";
			$value = "";
			for($i=0;$i<count($column_name);$i++)
			{
				$column = $column."`".$column_name[$i]."`, ";
				$value = $value."?,"; 
			}
			//modifying the string for column name and values
			$column = substr($column,0,-2);
			$value = substr($value,0,-1);
			$query = $this->link->prepare("INSERT INTO `$table_name`($column) VALUES ($value)");
			$query->execute($column_values);
			return $query->rowCount();
		}
		
		/*
		- function to get the values from table with multiple conditions
		- auth: Dipanjan
		*/
		function getValueMultipleCondtn($table_name,$col_value,$column_name,$column_values)
		{
			//declaring variables for preparing the query
			$column = "";
			$value = "";
			
			for($i=0;$i<count($column_name);$i++)
			{
				$column = $column." AND ".$column_name[$i]."='".$column_values[$i]."'";
				
			}
			$column = substr($column,5);
			
			$query = $this->link->prepare("SELECT ". $col_value ." from ". $table_name ." where ". $column);
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
			
		}
		
		/*
		- function to get the values from table with multiple conditions in descending order
		- auth: Dipanjan
		*/
		function getValueMultipleCondtnDesc($table_name,$col_value,$column_name,$column_values)
		{
			//declaring variables for preparing the query
			$column = "";
			$value = "";
			
			for($i=0;$i<count($column_name);$i++)
			{
				$column = $column." AND ".$column_name[$i]."='".$column_values[$i]."'";
				
			}
			$column = substr($column,5);
			
			$query = $this->link->prepare("SELECT ". $col_value ." from ". $table_name ." where ". $column ."ORDER BY `id` DESC");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
			
		}
		
		/*
		- method for updating the values using where clause with multiple conditions
		- auth: Dipanjan
		*/
		function updateValueMultipleCondition($table_name,$update_column,$update_value,$column_name,$column_values)
		{
			//declaring variables for preparing the query
			$column = "";
			$value = "";
			
			for($i=0;$i<count($column_name);$i++)
			{
				$column = $column." AND ".$column_name[$i]."='".$column_values[$i]."'";
				
			}
			$column = substr($column,5);
			
			$query = $this->link->prepare("UPDATE `$table_name` SET `$update_column`= '$update_value' WHERE ". $column);
			$query->execute();
			$count = $query->rowCount();
			return $count;
		}
		
		/*
		- method for updating the values using where clause with multiple conditions
		- auth: Dipanjan
		*/
		function updateMultipleValueOneCondition($table_name,$column_name,$column_values,$condition_column,$condition_value)
		{
			//declaring variables for preparing the query
			$column = "";
			$value = "";
			
			for($i=0;$i<count($column_name);$i++)
			{
				/*if(is_string($column_values[$i]))
				{
					$column = $column." AND `".$column_name[$i]."` = '".$column_values[$i]."'";
				}
				else
				{
					$column = $column." AND `".$column_name[$i]."` = ".$column_values[$i]."";
				}*/
				$column = $column." AND ".$column_name[$i]." = ".$column_values[$i];
			}
			$column = substr($column,5);
			$query = $this->link->prepare("UPDATE `$table_name` SET ". $column ." WHERE $condition_column = $condition_value");
			echo "UPDATE `$table_name` SET ". $column ." WHERE $condition_column = '$condition_value'";
			$query->execute();
			$count = $query->rowCount();
			echo $count;
		}
		
		/*
		- method for getting no of rows using multiple conditions
		- auth: Dipanjan
		*/
		function getRowValueMultipleCondition($table_name,$column_name,$column_values)
		{
			//declaring variables for preparing the query
			$column = "";
			$value = "";
			
			for($i=0;$i<count($column_name);$i++)
			{
				$column = $column." AND ".$column_name[$i]."='".$column_values[$i]."'";
				
			}
			$column = substr($column,5);
			
			$query = $this->link->prepare("SELECT * from ". $table_name ." where ". $column);
			$query->execute();
			$rowcount = $query->rowCount();
			return $rowcount;
			
		}
		
		//getting last value of a column
		function getLastValue($table_name,$column_name,$sorting_column){
			$query = $this->link->query("SELECT $column_name FROM $table_name ORDER BY $sorting_column DESC LIMIT 1");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		/*
		- method for updating the values using where clause
		- auth: Dipanjan
		*/
		function updateValueWhere($table_name,$update_column,$update_value,$column_name,$column_value)
		{
			$query = $this->link->prepare("UPDATE `$table_name` SET `$update_column`= '$update_value' WHERE `$column_name` = '$column_value'");
			$query->execute();
			$count = $query->rowCount();
			return $count;
		}
		
		/*
		- method for increment the value
		- auth: Dipanjan
		*/
		function increamentValue($table_name,$update_column,$no,$column_name,$column_value)
		{
			$query = $this->link->prepare("UPDATE `$table_name` SET `$update_column` = $update_column + $no WHERE `$column_name` = '$column_value'");
			$query->execute();
			$count = $query->rowCount();
			return $count;
		}
		
		/*
		- method for decreament the value
		- auth: Dipanjan
		*/
		function decreamentValue($table_name,$update_column,$no,$column_name,$column_value)
		{
			$query = $this->link->prepare("UPDATE `$table_name` SET `$update_column` = $update_column - $no WHERE `$column_name` = '$column_value'");
			$query->execute();
			$count = $query->rowCount();
			return $count;
		}
		
		/*
		- function to get the likely values of keyword with multiple condition
		- auth: Dipanjan
		*/
		/*function getValue_likely_multiple($table_name,$value,$column_name,$column_value)
		{
			//declaring variables for preparing the query
			$column = "";
			$value = "";
			
			for($i=0;$i<count($column_name);$i++)
			{
				$column = $column." OR ".$column_name[$i]." LIKE '%".$column_value[$i]."%'";
			}
			$column = substr($column,4);
			echo $column;
			
			$query = $this->link->prepare("SELECT $value from $table_name WHERE ".$column."");
			$query->execute();
			$rowcount = $query->rowCount();
			echo $rowcount;
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				//return $result;
			}
			else{
				//return $rowcount;
			}
		}*/
		
		/*
		- function to get the likely values of keyword with descending
		- auth: Dipanjan
		*/
		function getValue_likely_descendingLimit($table_name,$value,$column_name,$keyword,$limit)
		{
			$query = $this->link->prepare("SELECT $value from $table_name WHERE $column_name LIKE '%$keyword%' ORDER BY `id` DESC LIMIT $limit");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		/*
		- function to get the likely values of keyword with descending
		- auth: Dipanjan
		*/
		function getValue_likely_descending($table_name,$value,$column_name,$keyword,$limit)
		{
			$query = $this->link->prepare("SELECT $value from $table_name WHERE $column_name LIKE '%$keyword%' ORDER BY `id` DESC");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		/*
		- function to get the likely values of two condition of keyword in descending order
		- auth: Dipanjan
		*/
		function getValue_likely_descendingTwoLimit($table_name,$value,$column_name1,$keyword1,$column_name2,$keyword2,$limit)
		{
			$query = $this->link->prepare("SELECT $value from $table_name WHERE $column_name1 LIKE '%$keyword1%' AND $column_name2 LIKE '%$keyword2%' ORDER BY `id` DESC LIMIT $limit");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		/*
		- function to get the likely values of keyword
		- auth: Dipanjan
		*/
		function getValue_likelyLimit($table_name,$value,$column_name,$keyword,$limit)
		{
			
			$query = $this->link->prepare("SELECT $value from $table_name WHERE $column_name LIKE '%$keyword%' ORDER BY `id` ASC LIMIT $limit");
			
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		/*
		- function to get the likely values of keyword
		- auth: Dipanjan
		*/
		function getValue_likely($table_name,$value,$column_name,$keyword)
		{
			
			$query = $this->link->prepare("SELECT $value from $table_name WHERE $column_name LIKE '%$keyword%'");
			
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		/*
		- function to get the likely values of keyword
		- auth: Dipanjan
		*/
		function getValue_latestDate($table_name,$value,$no)
		{
			$query = $this->link->prepare("SELECT $value from $table_name ORDER BY `date` DESC LIMIT $no");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		/*
		- function to get values with or clause
		- auth: Dipanjan
		*/
		function getValueOrMultipleCondtn($table_name,$col_value,$column_name,$column_values)
		{
			//declaring variables for preparing the query
			$column = "";
			$value = "";
			
			for($i=0;$i<count($column_name);$i++)
			{
				$column = $column." OR ".$column_name[$i]."='".$column_values[$i]."'";
				
			}
			$column = substr($column,4);
			
			$query = $this->link->prepare("SELECT ". $col_value ." from ". $table_name ." where ". $column);
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		/*
		 * get values from the database
		 * sorted descending
		 * starting point and limit included
		 * Auth Singh
		 */
		function getValueWhere_sorted($table_name,$value,$row_value,$value_entered,$sort_by,$startPoint,$limit)
		{
			$query = $this->link->prepare("SELECT $value from $table_name where $row_value='$value_entered' ORDER BY `$sort_by` DESC LIMIT $startPoint,$limit");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		/*
		 *  get Value 2 where conditions
		 *  Auth Singh
		 */
		function get_msg_notification($table_name,$value,$row_value1,$value_entered1,$row_value2,$value_entered2,$row_value3,$value_entered3,$row_value4,$value_entered4)
		{
			$query = $this->link->prepare("SELECT $value from $table_name where ($row_value1='$value_entered1' OR $row_value2='$value_entered2') AND $row_value3 !='$value_entered3' AND $row_value4='$value_entered4'");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
		
		/*
		 *  get message list
		 *  Auth Singh
		 */
		function getMessageList($table_name,$value,$user_id,$sort_by,$startPoint,$limit)
		{
			$query = $this->link->prepare("SELECT $value from `$table_name` where (`con_user_id`='$user_id' OR `emp_user_id`='$user_id') ORDER BY `$sort_by` DESC LIMIT $startPoint,$limit");
			$query->execute();
			$rowcount = $query->rowCount();
			if($rowcount > 0){
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			else{
				return $rowcount;
			}
		}
	}
?>