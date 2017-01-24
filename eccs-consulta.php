<?php

	session_start();
	include("config/conexion.php");
	$tabla = $_POST["tabla"];
    //$Query = "SELECT eccs, ieccs FROM wp_tmp_". $tabla ." WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' order by row";
    $Query = "SELECT * from wp_tmp_preguntasusuarios WHERE solicitud_id = '".$_SESSION["tmp_id_solicitud"]."' AND usuario_id='".$_SESSION["tmp_id_user"]."' order by id";
    $query_consulta = mysqli_query($conexion, $Query);
    if(mysqli_num_rows($query_consulta) > 0){
        $array = array();
        $i = 0;
        while($row_consulta = mysqli_fetch_assoc($query_consulta)){
            $Array_Tmp = array();
            $Array_Tmp["Pregunta"] = $row_consulta["pregunta"];
            $Array_Tmp["PreguntaID"] = $row_consulta["id"];
            $Query = "SELECT respuesta FROM wp_tmp_". $tabla ." WHERE pregunta_id = '".$row_consulta["id"]."'";
            $query_respuesta = mysqli_query($conexion, $Query);
            if(mysqli_num_rows($query_respuesta) > 0){
                while($row_respuesta = mysqli_fetch_assoc($query_respuesta)){
                    $Array_Tmp["Respuesta"] = $row_respuesta["respuesta"];
                }
            }else{
                $Array_Tmp["Respuesta"] = "0";
            }
            
            $array[$i] = $Array_Tmp;
            $i++;
        }
        echo json_encode($array);
	} else {
			echo "1";

	}

?>