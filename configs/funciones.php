<?php

include "config.php";

	$con=mysqli_connect($host_mysql,$user_mysql, $pass_mysql,$db_mysql) or die ("Error al conectar al servidor");
	//mysqli_select_db($db_mysql)  or die("Error conectando a la base de datos");

	function clear($var){
		htmlspecialchars($var);

		return $var;
	}

	function check_admin(){
		if(!isset($_SESSION['id'])){
			redir("./");
		}
	}

	function redir($var){
		?>
		<script>
			window.location="<?=$var?>";
		</script>
		<?php
		die();
	}

	function alert($var){
		?>
		<script type="text/javascript">
			alert("<?=$var?>")
		</script>
		<?php
	}
function check_user($url){

	if (!isset($_SESSION['id_cliente'])) {
		redir("?p=login&return=$url");
	}else{

	}

}
