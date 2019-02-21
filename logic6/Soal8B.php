<?php

INCLUDE '../Matrix.php';
INCLUDE '../DeretAngka.php';

class Soal8B extends Matrix{

	private $deret;

	public function __construct(){
		$this->deret = new DeretAngka();
	}
	
	public function getStart($n){
		$start = 0;
		for($i = 1; $i <= $n; $i++){
			if($i % 2 == 1){
				$start++;
			}
		}
		//echo $start;
		return $start;
	}

	public function setMatrix($n){
		$this->baris = $n*$n;
		$this->kolom = $n*$n;
		$start = $this->getStart($n);
		$addBangun = 0;
		for($bangun = 0; $bangun < $n; $bangun++){
			for($i = 0; $i < $n; $i++){
				$decrease = 0;
				for($j = 0; $j < $n; $j++){
					if(
						$j + $i >= floor($n/2) //potong kiri
						&& $j - $i <= floor($n/2) //potong kanan
						&& $i - $j <= floor($n/2) //potong kiri bawah
						&& $i + $j <= ($n-1) + floor($n/2) //potong kanan bawah
						&& $j <= floor($n/2)
					){ 
						$hasil = $start - $decrease;
						$this->matrix[$i + $addBangun][$j + $addBangun] = "$hasil";
						//mirror
						$this->matrix[$i + $addBangun][$n-1-$j + $addBangun] = "$hasil";
						$decrease++;
					}
				}
			}
			$addBangun = $addBangun + $n;
			$start = $start + $this->getStart($n);
		}
		
	}
}

$jawab = new Soal8B();
$jawab->form1();
$jawab->setMatrix(@$_POST['input']);
$jawab->showMatrix();

