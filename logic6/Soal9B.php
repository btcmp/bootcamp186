<?php

INCLUDE '../Matrix.php';
INCLUDE '../DeretAngka.php';

class Soal9B extends Matrix{

	private $deret;

	public function __construct(){
		$this->deret = new DeretAngka();
	}
	
	public function getMaxColumn($n){
		$hasil = 0;
		$increment = 3;
		for($i = 0; $i < $n; $i++){
			$hasil = $hasil + $increment;
			//echo $hasil;
			$increment++;
		}
		return $hasil;
	}

	public function getMaxRow($n){
		$hasil = 2;
		for($i = 0; $i < $n; $i++){
			$hasil++;
		}
		return $hasil;
		
	}
	
	public function setMatrix($n){
		$this->baris = $this->getMaxRow($n);
		$this->kolom = $this->getMaxColumn($n);
		$var1 = 3;
		$var2 = $this->deret->getMaxXXX($n);//array(0, 3, 7, 12, 18);
		$var3 =$n-1; //static
		$var4 = 2;
		
		$index = 1;
		$increment = 3;
		for($bangun = 0; $bangun < $n; $bangun++){
			for($i = 0; $i < $var1; $i++){
				for($j = 0; $j < $var1; $j++){
					if($i + $j==$var4 || $j == $var4 || $i == $var4){
						$this->matrix[$i+$var3][$j+$var2[$bangun]] = ($index + $j);
					}	
				}
				
			}
			$index = $index + $increment;
			$increment = $increment + 1;
			
			$var1 = $var1 + 1;
			$var3 = $var3 - 1;
			$var4 = $var4 + 1;
		}
		
		/*
		for($i = 0; $i < 3; $i++){
			for($j = 0; $j < 3; $j++){
				$this->matrix[$i+3][$j+0] = "-";
			}
		}
		
		for($i = 0; $i < 4; $i++){
			for($j = 0; $j < 4; $j++){
				$this->matrix[$i+2][$j+3] = "@";
			}
		}
		for($i = 0; $i < 5; $i++){
			for($j = 0; $j < 5; $j++){
				$this->matrix[$i+1][$j+7] = "@";
			}
		}
		*/
	}
}

$jawab = new Soal9B();
$jawab->form1();
$jawab->setMatrix(@$_POST['input']);
$jawab->showMatrix();

