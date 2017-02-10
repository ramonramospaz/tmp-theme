<?php



if($_SESSION["tmp_id_servicio"] == 25){



	if($_SESSION["tmp_t_producto"] == 1){



		header("Location: ../informacion-producto-bienes");



	}else{



		header("Location: ../informacion-producto-servicios");		



	}



} else if($_SESSION["tmp_id_servicio"] == 33){



	header("Location: ../perfil-geografico");



} else if($_SESSION["tmp_id_servicio"] == 37){



	header("Location: ../perfil-geografico");



}else if($_SESSION["tmp_id_servicio"] == 906){



	header("Location: ../perfil-geografico");



} else if($_SESSION["tmp_id_servicio"] == 40){

	header("Location: ../identificacion-competencia");


} else if($_SESSION["tmp_id_servicio"] == 1048){
	
	header("Location: ../identificacion-competencia");
	
}else if($_SESSION["tmp_id_servicio"] == 46){

	header("Location: ../identificacion-competencia");

} else if($_SESSION["tmp_id_servicio"] == 49){

	header("Location: ../identificacion-competencia");

} else if($_SESSION["tmp_id_servicio"] == 52){

	header("Location: ../identificacion-competencia");


} else if($_SESSION["tmp_id_servicio"] == 138){



		header("Location: ../componentes-mision-corporativa");



} else if($_SESSION["tmp_id_servicio"] == 141){

	header("Location: ../identificacion-competencia");

} else if($_SESSION["tmp_id_servicio"] == 144){



	if($_SESSION["tmp_t_consumidor"] == 1){



		header("Location: ../datos-consumidor-individual");



	}elseif($_SESSION["tmp_t_consumidor"] == 2){



		header("Location: ../datos-consumidor-organizacional");	



	}else{



		header("Location: ../datos-consumidor-individual");



	}



} else if($_SESSION["tmp_id_servicio"] == 147){



		header("Location: ../identificacion-de-objetivos");



} else if($_SESSION["tmp_id_servicio"] == 149){



		header("Location: ../identificacion-objetivos-estrategias");



} else if($_SESSION["tmp_id_servicio"] == 152){


		header("Location: ../dinamica-del-mercado");

}else if($_SESSION["tmp_id_servicio"] == 1056){


		header("Location: ../identificacion-competencia");

}else if($_SESSION["tmp_id_servicio"] == 1085){


		header("Location: ../identificacion-competencia");

}else if($_SESSION["tmp_id_servicio"] == 1104){


		header("Location: ../identificacion-competencia");

}



?>