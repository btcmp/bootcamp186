<?php

INCLUDE '../Matrix.php';
INCLUDE '../DeretAngka.php';

class Soal2B extends Matrix{

	private $deret;

	public function __construct(){
		$this->deret = new DeretAngka();
	}

	public function setMatrix($n){
		$this->baris = ($n*2-1) + (2*$n);
		$this->kolom = ($n*2-1) + (2*$n);
		$ganjil = $this->deret->getIncrementBy2($n*$n*2);
		$fibo = $this->deret->getFibo($n*$n);
		$fibo3 = $this->deret->get3Fibo($n*$n);
		//atas / bawah
		/*
			3 => 3
			4 => 5
			5 => 7
			
		*/
		$index = 0;
		$index2 = ($n*$n)*2-1;
		$index3 = 0;
		$geser = (-$n);
		for($i = 0; $i < $this->baris; $i++){
			for($j = 0; $j < $this->kolom; $j++){
				//atas 
				if($i + $j >= ($n*2-1) && $j - $i <= ($n*2-1) && $i <= $n - 1){
					$this->matrix[$i][$j] = $ganjil["$index"];
					//mirror
					//$this->matrix[$this->baris-1 - $i][$this->kolom-1-$j] = "$index2";
					$index++;
					$index2--;
				}
				//kiri
				else if($i + $j >= ($n*2-1) && $i - $j <= ($n*2-1) && $j <= $n-1){
					$this->matrix[$i][$j] = $fibo["$index3"];
					//mirror
					$this->matrix[$i][($this->kolom - 1) + $j - ($n*2-2) + $geser] = $fibo3["$index3"];
					$index3++;
					
				} 
				//bawah
				else if(
					$i - $j <= ($n*2-1) 
					&& $i >= ($this->baris - 1) - ($n-1) 
					&& $i + $j <= ($this->baris - 1)+ floor($this->baris/2)
				){
					$this->matrix[$i][$j] = $ganjil["$index"];
					$index++;
				}
				
			}
			
			if($i <= floor($this->baris/2)-1){
				$geser++;	
			} else{
				$geser--;
			}
		}
	}
}

$jawab = new Soal2B();
$jawab->form1();
$jawab->setMatrix(@$_POST['input']);
$jawab->showMatrix();

