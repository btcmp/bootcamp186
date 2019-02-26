<?php

INCLUDE '../Matrix.php';
INCLUDE '../DeretAngka.php';

class Soal3B extends Matrix{

	private $deret;

	public function __construct(){
		$this->deret = new DeretAngka();
	}

	public function setMatrix($n){
		$this->baris = $n;
		$this->kolom = $n;
		
		$apk = 0;
			if($n % 2 == 0){
				$apk = 1;
			} else{
				$apk = 0;
			}
		
		for($i = 0; $i < $this->baris; $i++){
			for($j = 0; $j < $this->kolom; $j++){
			
			
				if(
					($i - $j <= 0) && ($i + $j <= $this->kolom-1 && ($i % 2 == 0))
				|| ($i - $j <= 0 && $i + $j >= $this->kolom-1 && ($j % 2 == $apk))	
				|| ($i - $j >= 0 && $i + $j >= $this->kolom-1 && ($i % 2 == $apk))
				|| ($i - $j >= 0 && $i + $j <= $this->kolom-1 && ($j % 2 == 0))
				){
					$this->matrix[$i][$j] = "*";
				}
				
				//akan mereplace if yang sebelumnya
				if($i - $j == 1 && $i <= ceil($this->baris-1)){
					if($i % 2 == 0){
						$this->matrix[$i][$j] = "*";
					} else{
						$this->matrix[$i][$j] = " ";
					}
					
				}
			}
		}
	}
}

$jawab = new Soal3B();
$jawab->form1();
$jawab->setMatrix(@$_POST['input']);
$jawab->showMatrix();

