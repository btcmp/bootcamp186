<?php

INCLUDE '../Matrix.php';
INCLUDE '../DeretAngka.php';

class Soal1B extends Matrix{

	private $deret;

	public function __construct(){
		$this->deret = new DeretAngka();
	}

	public function setMatrix($n){
		$this->baris = ($n*2-1) + (2*$n);
		$this->kolom = ($n*2-1) + (2*$n);
		
		//atas / bawah
		for($i = 0; $i < ($n); $i++){
			for($j = 0; $j < ($n*2-1); $j++){
				//atas bawah
				if($i + $j >= $n - 1 && $j - $i <= $n - 1){
					$this->matrix[$i][$j+$n] = "*";
					//mirror
					$this->matrix[$this->baris - 1 - $i][$j+$n] = "*";
				} 
			}
		}
		
		//kanan kiri
		for($i = 0; $i < (($n*2-1)); $i++){
			for($j = 0; $j < ($n); $j++){
				if($i + $j >= $n - 1 && $i - $j <= $n-1){
					$this->matrix[$i + $n][$j] = "*";
					//mirror
					$this->matrix[$i +  + $n][$this->kolom-1-$j] = "*";
				} 
			}
		}
	}
}

$jawab = new Soal1B();
$jawab->form1();
$jawab->setMatrix(@$_POST['input']);
$jawab->showMatrix();

