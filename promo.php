<?php

    session_start();
    include("config/conexion.php");
    $query_precio = mysqli_query($conexion, "SELECT meta_value FROM wp_postmeta  WHERE meta_key = 'precio' AND post_id = '". $_SESSION["tmp_id_servicio"] ."'");
        if(mysqli_num_rows($query_precio) > 0){
            $row_precio = mysqli_fetch_assoc($query_precio);
            $precio = $row_precio["meta_value"];
        }		
    //CODIGO
    $valor = $_POST["valor"];
    $query_consulta = mysqli_query($conexion, "SELECT * FROM wp_tmp_codpromo  WHERE codigo = '". $valor ."' AND status = 0");
        if(mysqli_num_rows($query_consulta) > 0){
            $row_consulta = mysqli_fetch_assoc($query_consulta);
            $descuento = $row_consulta["descuento"];
            $_SESSION['payment_promo_cod'] = $valor;
            $_SESSION['payment_promo_discount'] = $descuento;
            $_SESSION['payment_amount'] = $_SESSION['payment_precio_servicio'] - $_SESSION['payment_promo_discount'];
        } else {
            $descuento = "0";
            $_SESSION['payment_promo_cod'] = "";
            $_SESSION['payment_promo_discount'] = $descuento;
            $_SESSION['payment_amount'] = $_SESSION['payment_precio_servicio'] - $_SESSION['payment_promo_discount'];
        }
    $total = $precio - $descuento;
    $valores = array("descuento" => $descuento, "total" => $total);
    echo json_encode($valores);
		
?>