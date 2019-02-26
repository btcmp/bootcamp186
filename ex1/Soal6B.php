<?php

INCLUDE '../Matrix.php';
INCLUDE '../DeretAngka.php';

class Soal6B extends Matrix{

	private $deret;

	public function __construct(){
		$this->deret = new DeretAngka();
	}

	public function setMatrix($n){
		$this->baris = $n;
		$this->kolom = $n;
		
		for($i = 0; $i < $this->baris; $i++){
			for($j = 0; $j < $this->kolom; $j++){
				$this->matrix[$i][$j] = "-";
			}
		}
	}
	
	public function setMatrix2($n, $n2){
		$this->kolom = $n;
		$this->baris = $n2;
		
		$index = 1;
		for($i = 0; $i < $this->baris; $i++){
			for($j = 0; $j < $this->kolom; $j++){
				if($i % 4 == 0){
					$this->matrix[$i][$j] = "$index";
					$index++;
				} else if($i % 4 == 2){ //kenapa dipisah karena harus di balik % 2
					$this->matrix[$i][$this->kolom-1-$j] = "$index";
					$index++;
				} else if($i % 4 == 1 && $j == $this->kolom -1 ){ //kanan
					$this->matrix[$i][$j] = "$index";
					$index++;
				} else if($i % 4 == 3 && $j == 0){ //kiri
					$this->matrix[$i][$j] = "$index";
					$index++;
				}
			}
		}
	}
}

$jawab = new Soal6B();
$jawab->form2();
$jawab->setMatrix2(@$_POST['input'], @$_POST['input2']);
$jawab->showMatrix();

