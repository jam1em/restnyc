<?php
class dbCon{
	private $con;
	private $data;
	private $db;
	private $host = "localhost";
	private $servername;// = "localhost";
	private $dbname;//   	= 'martinez_restnyc';
	public function __construct( $servername, $dbname ){
		$this->servername 	= $servername;
		$this->dbname 		= $dbname; 
		$this->db = new mysqli($this->servername, $this->dbname);
		// Check connection
		 if ($this->db->connect_error) {
     		die("Connection failed: " . $conn->connect_error);
		 }else{
		 	//echo "Successfully connected";
		 }
		 return $this->db;
	}
	public function insertRecord( $sql ){
		return $this->db->query( $sql );
	}
	public function fetchRecord( $sql ){
		$r = $this->db->query( $sql );
		$n = $r->num_rows;
		$result = array();
		for( $i = 0; $i < $n; $i++){
			$row = mysqli_fetch_array($r);
			array_push( $result, $row['taskName'] );
		}
		return $result;
	}
}
?>