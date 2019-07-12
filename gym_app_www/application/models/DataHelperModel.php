<?php
/*
Author: Mark Lester O. Dampios
File: /application/models/DataHelperModel.php
Description: This is Data Helper Model
*/
class DataHelperModel extends CI_Model {

	function json_encode_object($data=null, array $array_columns){
		for($j = 0; $j < count($array_columns); $j++){
			$columnName = $array_columns[$j];
			if(isset($data->{$columnName})){
            	$data->{$columnName} = json_encode($data->{$columnName});
        	}
        }
		return $data;
	}

	function json_decode_array($data=null, array $array_columns){
		for($i = 0; $i < count($data); $i++){
			for($j = 0; $j < count($array_columns); $j++){
				$columnName = $array_columns[$j];
				if($data[$i][$columnName]){
            		$data[$i][$columnName] = json_decode($data[$i][$columnName]);
            	}
            }
        }
		return $data;
	}

	function json_decode_object($data=null, array $array_columns){
		for($j = 0; $j < count($array_columns); $j++){
			$columnName = $array_columns[$j];
			if($data[$columnName]){
            	$data[$columnName] = json_decode($data[$columnName]);
            }
        }
		return $data;
	}
}