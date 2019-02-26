<?php

INCLUDE '../Matrix.php';
INCLUDE '../DeretAngka.php';

class Soal1B extends Matrix{

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
		for($block = 0; $block < $n2; $block++){ //$i2
			$addBangun = 0;
			for($bangun = 0; $bangun < $n2; $bangun++){ //$j2
				for($i = 0; $i < $n; $i++){
					for($j = 0; $j < $n; $j++){
						if($i - $j >= 0){
							if($block == 0){
								$this->matrix[$i + $addBlock][$j + $addBangun] = "*";
							} else if($bangun == 0){
								$this->matrix[$i + $addBlock][$j + $addBangun] = "*";
							} else if($bangun == $block){
								$this->matrix[$i + $addBlock][$j + $addBangun] = "*";
							}
						}
					}
				}
				
				$addBangun = $addBangun + $n;
			}
			$addBlock = $addBlock + $n;
		}
		
		
	}
}

$jawab = new Soal1B();
$jawab->form2();
$jawab->setMatrix2(@$_POST['input'], @$_POST['input2']);
$jawab->showMatrix();

