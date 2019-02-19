<?php

INCLUDE '../Matrix.php';
INCLUDE '../DeretAngka.php';

class Soal1B extends Matrix{

	private $deret;

	public function __construct(){
		$this->deret = new DeretAngka();
	}

	public function setMatrix($n){
		$this->baris = $this->deret->getLastTriAngular($n+1);
		$this->kolom = $this->deret->getLastTriAngular($n+1);
		
		//$var1 = array(1, 2, 3, 4);
		$var2 = $this->deret->getTriAngular($n);//array(0, 1, 3, 6);
		echo json_encode($var2);
		echo "<p/>";
		
		for($bangun = 0; $bangun < $n; $bangun++){
			for($i = 0; $i < $bangun+1; $i++){
				for($j = 0; $j < $bangun+1; $j++){
					$this->matrix[$i+$var2[$bangun]][$j+$var2[$bangun]] = "*";
				}
			}
		}
		
		
		/*
		for($i = 0; $i < 1; $i++){
			for($j = 0; $j < 1; $j++){
				$this->matrix[$i+0][$j+0] = "*";
			}
		}
		
		//kotak 2
		for($i = 0; $i < 2; $i++){
			for($j = 0; $j < 2; $j++){
				$this->matrix[$i+1][$j+1] = "*";
			}
		}
		
		//kotak 3
		for($i = 0; $i < 3; $i++){
			for($j = 0; $j < 3; $j++){
				$this->matrix[$i+3][$j+3] = "*";
			}
		}
		
		//kotak 4
		for($i = 0; $i < 4; $i++){
			for($j = 0; $j < 4; $j++){
				$this->matrix[$i+6][$j+6] = "*";
			}
		}
		*/
		
	}
}

$jawab = new Soal1B();
$jawab->form1();
$jawab->setMatrix(@$_POST['input']);
$jawab->showMatrix();

