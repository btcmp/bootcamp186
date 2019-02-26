<?php

INCLUDE '../Matrix.php';
INCLUDE '../DeretAngka.php';

class Soal2B extends Matrix{

	private $deret;

	public function __construct(){
		$this->deret = new DeretAngka();
	}

	public function setMatrix($n){
		
	}
	
	public function setMatrix2($n, $n2){
		$this->baris = $n*$n2;
		$this->kolom = $n*$n2;
		
		$addBlock = 0;
		for($block = 0; $block < $n; $block++){ //$i2
			$addBangun = 0;
			for($bangun = 0; $bangun < $n; $bangun++){ //$j2
				for($i = 0; $i < $n2; $i++){
					for($j = 0; $j < $n2; $j++){
						if($i == 0 || $j == 0 || $j == $n2 - 1 || $i == $n2 - 1){
							if($block == $bangun || $bangun + $block == $n - 1){
								$this->matrix[$i + $addBlock][$j + $addBangun] = "*";
							}
						}
					}
				}
				
				$addBangun = $addBangun + $n2;
			}
			$addBlock = $addBlock + $n2;
		}
	}
}

$jawab = new Soal2B();
$jawab->form2();
$jawab->setMatrix2(@$_POST['input'] + 1, @$_POST['input2']);
$jawab->showMatrix();

