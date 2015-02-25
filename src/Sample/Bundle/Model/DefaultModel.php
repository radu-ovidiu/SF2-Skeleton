<?php
// Symfony2 Module / Model :: Sample
// author: radu-ovidiu
// 2015-02-25

namespace Sample\Bundle\Model;

class DefaultModel {

	protected $connection;


	//=====


	public function __construct(\Symfony\Bundle\FrameworkBundle\Controller\Controller $controller) {
		//--
		$this->connection = $controller->getDoctrine()->getManager()->getConnection();
		//--
		if((strtolower($controller->getConfigurationParameter('database_driver')) == 'pdo_sqlite') AND (!is_file($controller->getConfigurationParameter('database_path')))) {
			//--
			$this->writeQuery('BEGIN');
			$this->writeQuery(
				'CREATE TABLE "table_main_sample" ("id" character varying(10) NOT NULL, "name" character varying(100) NOT NULL, "description" text NOT NULL, "dtime" text NOT NULL )',
				array()
			);
			for($i=0; $i<9; $i++) {
				$test = $this->writeQuery(
					' INSERT INTO "table_main_sample" ("id","name","description","dtime") VALUES (?,?,?,?)',
					array(($i+1), 'Name "'.($i+1).'"', "Description '".($i+1)."'", date('Y-m-d H:i:s O'))
				);
				if($test != 1) {
					print_r($test);
					break;
				} //end if
			} //end for
			//--
			$this->writeQuery('COMMIT');
			//--
		} //end if
		//--
	} //END FUNCTION


	//=====


	public function readQuery($query, $values='') {
		//--
		if(!is_array($values)) {
			$values = array();
		} //end if
		//--
		$query = $this->connection->executeQuery($query, $values);
		//--
		return (array) $query->fetchAll();
		//--
	} //END FUNCTION


	public function countQuery($query, $values='') {
		//--
		if(!is_array($values)) {
			$values = array();
		} //end if
		//--
		$query = $this->connection->executeQuery($query, $values);
		$arr = (array) $query->fetchAll();
		//--
		$count = 0;
		//--
		if(is_array($arr[0])) {
			foreach($arr[0] as $key => $val) {
				$count = (int) $val; // find first row and first column value
				break;
			} //end if
		} //end if
		//--
		return (int) $count;
		//--
	} //END FUNCTION


	public function writeQuery($query, $values='') {
		//--
		if(!is_array($values)) {
			$values = array();
		} //end if
		//--
		$query = $this->connection->executeQuery($query, $values);
		//--
		return (int) $query->rowCount();
		//--
	} //END FUNCTION


	//=====


	public function getMicroTime() {
		//--
		list($usec, $sec) = @explode(' ', microtime());
		//--
		return ((float)$usec + (float)$sec);
		//--
	} //END FUNCTION


} //END CLASS

//end php code
?>