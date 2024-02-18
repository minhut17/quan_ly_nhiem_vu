<?php
namespace App\Core;

class helper
{
	public  function setMsg($text, $type)
	{
		if ($type == 'error') {
			$_SESSION['errorMsg'] = $text;
		} else {
			$_SESSION['successMsg'] = $text;
		}
	}

	public  function display()
	{
		if (isset($_SESSION['errorMsg'])) {

			echo '<div class="alert alert-danger" role="alert">
			' . $_SESSION['errorMsg'] . '
		 	 </div>';
			unset($_SESSION['errorMsg']);
		}

		if (isset($_SESSION['successMsg'])) {

			echo '<div class="alert alert-success" role="alert">
			' . $_SESSION['successMsg'] . '
		  </div>';
			unset($_SESSION['successMsg']);
		}
	}
	public function showError($conten,$type){
		$_SESSION['showError']='<div class="alert alert-'.$type.'" role="alert">
		' . $conten . '
		  </div>';
	}
	public function checkMes(){
		if(isset($_SESSION['showError'])){
			echo $_SESSION['showError'];
			unset($_SESSION['showError']);
		}
	}
}
