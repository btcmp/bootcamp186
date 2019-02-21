<?php

class DeretAngka{

	//VOID
	//RETURN
	
	//0 2 4 6 4 2 0
	public function getOddAndReverse($n){
		$result = array();
		$data = 0;
		for($i = 0; $i < $n; $i++){
			//collect to result array
			$result[$i] = $data;
			
			if($i <= ($n-1)/2-1){
				$data = $data + 2;
			} else {
				$data = $data - 2;
			}
		}
		
		return $result;
	}
	
	//single return 
	public function getTambah($n1, $n2){ //parameter
		$hasil = $n1 + $n2;
		//echo $hasil;
		return $hasil;
	}
	
	//array return / multidata
	//0,1,2,3,4,5
	public function getIncrement($n){
		$hasil = array();
		for($i = 0; $i < $n; $i++){
			$hasil[$i] = $i;
		}
		return $hasil;
	}
	
	//1,3,5..
	public function getIncrementBy2($n){
		$hasil = array();
		
		$data = 1;
		for($i = 0; $i < $n; $i++){
			$hasil[$i] = $data;
			$data = $data + 2;
		}
		return $hasil;
	}
	
	//5,3,1...
	public function getIncrementBy2Reverse($n){
		$hasil = array();
		$data = 1;
		for($i = 0; $i < $n; $i++){
			$hasil[($n-$i-1)] = $data;
			$data = $data + 2;
		}
		return $hasil;
	}
	
	//1,1,2,3,5...
	public function getFibo($n){
		$result = array();
		$result[0] = 1;
		$result[1] = 1;
		
		for($i = 2; $i < $n; $i++){
			$result[$i] = $result[$i-1] + $result[$i-2];
		}
		
		return $result;
	}
	
	public function getChars($n){
		$result = array();
		$char = "A";
		
		for($i = 0; $i < $n; $i++){
			$result[$i] = $char;
			$char++;
		}
		
		return $result;
	}
	
	//=> 0, 1,3,6,10..
	public function getLastTriAngular($n){
		$temporary = 0;
		for($i =0; $i < $n; $i++){
			$temporary = $temporary + $i;
		}
		return $temporary;
	}
	
	//array => 0, 1, 3, 6, ...
	public function getTriAngular($n){
		$hasil = array();
		$temporary = 0;
		for($i =0; $i < $n; $i++){
			$temporary = $temporary + $i;
			$hasil[$i] = $temporary;
		}
		return $hasil;
	}
	
	//0, 1, 4, 9..
	public function getPangkat($n){
		$hasil = array();
		for($i = 0; $i < $n; $i++){
			$hasil[$i] = $i*$i;
		}
		
		return $hasil;
	}
	
	//output : 3, 7, 12, 18
	public function getMaxXXX($n){
		$result = array();
		$hasil = 0;
		$increment = 3;
		for($i = 0; $i < $n; $i++){
			$result[$i] = $hasil;
			$hasil = $hasil + $increment;
			//echo $hasil;
			$increment++;
		}
		return $result;
	}
}	

/*
	increment | temporary
	0, 0
	1, 1
	2, 3
	3, 6
	
*/

//test
//$deret=new DeretAngka();
//$deret->getLastTriAngular(4+1);
//$result = $deret->getTambah(12, 13); //argument
//echo $result;
//echo json_encode($deret->getIncrement(9));
//echo "<br/>" . json_encode($deret->getIncrementBy2(9));
//echo "<br/>" . json_encode($deret->getIncrementBy2Reverse(9));
//echo "<br/>" . json_encode($deret->getFibo(9));

/*
$result1 = $deret->getIncrementBy2(9);
$result2 = $deret->getIncrementBy2Reverse(9);
echo "<br/>";
for($i = 0; $i < 9; $i++){
	echo $result2[$i] . "<br/>";
}
*/