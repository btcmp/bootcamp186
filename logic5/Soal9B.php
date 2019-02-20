<?php

INCLUDE '../Matrix.php';
INCLUDE '../DeretAngka.php';

class Soal9B extends Matrix{

	private $deret;

	public function __construct(){
		$this->deret = new DeretAngka();
	}

	public function setMatrix($n){
		$this->baris = $this->deret->getLastTriAngular($n+1);
		$this->kolom = $n*2-1;
		
		//$var1 = array(1, 2, 3, 4);
		$var2 = $this->deret->getTriAngular($n);//array(0, 1, 3, 6);
		$pangkat = $this->deret->getPangkat($n);//0,1,4,9..
		echo json_encode($var2)."<br/>";
		echo json_encode($pangkat);
		echo "<p/>";
		
		$p = 1;
		$geser = $n-1;
		for($bangun = 0; $bangun < $n; $bangun++){
			for($i = 0; $i < $bangun+1; $i++){
				for($j = 0; $j < $p; $j++){
					if($i + $j >= $bangun ){
						if($j - $i <= $bangun){
							$this->matrix[$i+$var2[$bangun]][$j+$geser] = "*";
						}
					}
					
					//dibalik
					//$this->matrix[$i+$var2[$bangun]][$this->kolom - 1 - ($j+$var2[$bangun])] = "*";
				}
			}
			$p = $p + 2;
			$geser = $geser - 1;
		}
		
		
		
		
		
		/*
		for($i = 0; $i < 1; $i++){
			for($j = 0; $j < 1; $j++){
				$this->matrix[$i+0][$j+0] = "*";
			}
		}
		
		//kotak 2
		for($i = 0; $i < 2; $i++){
			for($j = 0; $j < 3; $j++){
				$this->matrix[$i+1][$j+1] = "*";
			}
		}
		
		//kotak 3
		for($i = 0; $i < 3; $i++){
			for($j = 0; $j < 5; $j++){
				$this->matrix[$i+3][$j+4] = "*";
			}
		}
		
		//kotak 4
		for($i = 0; $i < 4; $i++){
			for($j = 0; $j < 7; $j++){
				$this->matrix[$i+6][$j+9] = "*";
			}
		}
		*/
		
	}
}

$jawab = new Soal9B();
$jawab->form1();
$jawab->setMatrix(@$_POST['input']);
$jawab->showMatrix();

