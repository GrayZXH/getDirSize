<?php
	header('content-type:text/html;charset=utf-8');
	function getDirSize($path){
		$sum=0;
		global $sum;
		$handle=opendir($path);
		while (($item=readdir($handle))!==false) {
			if ($item!='.'&&$item!='..') {
				$filepath=$path.'/'.$item;
				if (is_file($filepath)) {
					$sum+=filesize($filepath);
				}
				if (is_dir($filepath)) {
					$func=__FUNCTION__;
					$func($filepath);
				}
			}
		}
		closedir($handle);
		return $sum;
	}
	//for example
	$path='webroot';
	$res=getDirSize($path);
	echo $res;

?>