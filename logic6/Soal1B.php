<?php

INCLUDE '../Matrix.php';
INCLUDE '../DeretAngka.php';

class Soal1B extends Matrix{

	private $deret;

	public function __construct(){
		$this->deret = new DeretAngka();
	}

	public function setMatrix($n){
		$this->baris = $n*$n;
		$this->kolom = ($n*2-1)*2;
		
		$addBangun = 0;
		for($bangun = 0; $bangun < $n; $bangun++){
			for($i = 0; $i < $n; $i++){
				for($j = 0; $j < ($n*2-1); $j++){
					if($i+$j >= ($n - 1) && $j - $i <= ($n-1)){
						if($bangun %2 == 0){
							$this->matrix[$i+$addBangun][$j] = "*";
						} else{
							$this->matrix[$i+$addBangun][$j+floor($this->kolom/2)] = "$";
						}
					}
				}
			}
			$addBangun = $addBangun + $n;
		}
		
	}
}

$jawab = new Soal1B();
$jawab->form1();
$jawab->setMatrix(@$_POST['input']);
$jawab->showMatrix();

