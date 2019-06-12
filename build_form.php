<?php

if(isset($_POST['filters']) and $filters = json_decode($_POST['filters'])){
	print("<pre>".print_r(array_filter($filters),true)."</pre>");
}else{
	echo "failed";
}

?>