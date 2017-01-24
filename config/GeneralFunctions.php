<?php
    function include_all_php($folder){
        foreach ((array)glob("{$folder}/*.php") as $filename)
        {
            if($filename != ""){
                include $filename;   
            }
        }
    }
    function GetQuestionAnswers($Cuestionario){
        $ToReturn = array();
        
        //Busqueda de Preguntas
        $QuerySQL = "SELECT wp_tmp_preguntas.id AS PREGUNTA, wp_tmp_preguntas.name AS NAME, wp_tmp_preguntas.pregunta AS TEXTO  FROM wp_tmp_preguntas WHERE wp_tmp_preguntas.cuestionario = '".$Cuestionario."'";
        $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
        if(mysqli_num_rows($Query) > 0){
            while($row = mysqli_fetch_assoc($Query)){
                $ToReturn[$row['PREGUNTA']] = utf8_encode($row['TEXTO']);
                $ToReturn[$row['NAME']] = utf8_encode($row['TEXTO']);
            }
        }

        //Busqueda de Opciones de Preguntas
        $QuerySQL = "SELECT wp_tmp_preguntas.id AS PREGUNTA, wp_tmp_preguntas.cuestionario AS CUESTIONARIO,wp_tmp_opcionespreguntas.valor AS VALOR, wp_tmp_opcionespreguntas.es_texto AS TEXTO  FROM wp_tmp_opcionespreguntas INNER JOIN wp_tmp_preguntas ON wp_tmp_preguntas.ID = wp_tmp_opcionespreguntas.id_pregunta WHERE wp_tmp_preguntas.cuestionario = '".$Cuestionario."'";
        $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
        if(mysqli_num_rows($Query) > 0){
            while($row = mysqli_fetch_assoc($Query)){
                $ToReturn[$row['PREGUNTA']."_".$row['VALOR']] = utf8_encode($row['TEXTO']);
            }
        }
        return $ToReturn;
    }
    function GetUsersQuestionAnswers($IDSolicitud){
        $ToReturn = array();
        
        //Busqueda de Preguntas
        $QuerySQL = "SELECT wp_tmp_preguntasusuarios.id AS PREGUNTA, wp_tmp_preguntasusuarios.pregunta AS TEXTO  FROM wp_tmp_preguntasusuarios WHERE wp_tmp_preguntasusuarios.solicitud_id = '".$IDSolicitud."'";
        $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
        if(mysqli_num_rows($Query) > 0){
            while($row = mysqli_fetch_assoc($Query)){
                $ToReturn[$row['PREGUNTA']] = utf8_encode($row['TEXTO']);
                $ToReturn[$row['NAME']] = utf8_encode($row['TEXTO']);
            }
        }
        return $ToReturn;
    }
    function GetVCCDQuestion($IDSolicitud){
        $ToReturn = array();
        //Busqueda de Preguntas
        $QuerySQL = "SELECT wp_tmp_preguntas.id AS PREGUNTA, wp_tmp_preguntas.pregunta AS TEXTO, wp_tmp_preguntas.rel as RELACION, wp_tmp_preguntas.name as NAME FROM wp_tmp_preguntas INNER JOIN wp_tmp_vcproducto ON wp_tmp_vcproducto.pregunta_id = wp_tmp_preguntas.ID WHERE wp_tmp_vcproducto.solicitud_id='".$IDSolicitud."' order by wp_tmp_preguntas.ID";
        $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
        if(mysqli_num_rows($Query) > 0){
            while($row = mysqli_fetch_assoc($Query)){
                $ToReturn[$row['PREGUNTA']] = utf8_encode($row['TEXTO']);
                $ToReturn['Rel_'.$row['PREGUNTA']] = $row['RELACION'];
                $ToReturn['Name_'.$row['PREGUNTA']] = $row['NAME'];
            }
        }
        return $ToReturn;
    }
    function GetEstrategias(){
        $ToReturn = array();
        //Busqueda de Preguntas
        $QuerySQL = "SELECT wp_tmp_preguntas.id AS PREGUNTA, wp_tmp_preguntas.pregunta AS TEXTO, wp_tmp_preguntas.rel as RELACION, wp_tmp_preguntas.name as NAME FROM wp_tmp_preguntas where name like 'EST_%' order by wp_tmp_preguntas.ID";
        $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
        if(mysqli_num_rows($Query) > 0){
            while($row = mysqli_fetch_assoc($Query)){
                $ToReturn[$row['NAME']] = utf8_encode($row['TEXTO']);
            }
        }
        return $ToReturn;
    }
    function GetVCCDEccsQuestion($IDSolicitud){
        $ToReturn = array();
        //Busqueda de Preguntas
        $QuerySQL = "SELECT wp_tmp_preguntasusuarios.id AS PREGUNTA, wp_tmp_preguntasusuarios.pregunta AS TEXTO FROM wp_tmp_preguntasusuarios INNER JOIN wp_tmp_vcproductoeccs ON wp_tmp_vcproductoeccs.pregunta_id = wp_tmp_preguntasusuarios.ID WHERE wp_tmp_vcproductoeccs.solicitud_id='".$IDSolicitud."' group by wp_tmp_preguntasusuarios.id, wp_tmp_preguntasusuarios.pregunta order by wp_tmp_preguntasusuarios.ID";
        $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
        if(mysqli_num_rows($Query) > 0){
            while($row = mysqli_fetch_assoc($Query)){
                $ToReturn[$row['PREGUNTA']] = utf8_encode($row['TEXTO']);
            }
        }
        return $ToReturn;
    }
    function GetTableFields($Table){
        $ToReturn = array();
        //Busqueda de Preguntas
        $QuerySQL = "describe ".$Table;
        $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
        if(mysqli_num_rows($Query) > 0){
            while($row = mysqli_fetch_assoc($Query)){
                $ToReturn[$row['Field']] = $row['Field'];
            }
        }
        return $ToReturn;
    }
    function array_sort($array, $on, $order=SORT_ASC){
        $new_array = array();
        $sortable_array = array();

        if (count($array) > 0) {
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    foreach ($v as $k2 => $v2) {
                        if ($k2 == $on) {
                            $sortable_array[$k] = $v2;
                        }
                    }
                } else {
                    $sortable_array[$k] = $v;
                }
            }

            switch ($order) {
                case SORT_ASC:
                    asort($sortable_array);
                break;
                case SORT_DESC:
                    arsort($sortable_array);
                break;
            }

            foreach ($sortable_array as $k => $v) {
                $new_array[$k] = $array[$k];
            }
        }

        return $new_array;
    }

?>