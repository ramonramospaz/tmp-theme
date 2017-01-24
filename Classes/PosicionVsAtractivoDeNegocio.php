<?php
    class PosicionVsAtractivoDeNegocio{
        public $id;
        public $solicitud_id;
        public $panegocio;
        public $atrmercado;
        public $Table;
        public $usuario_id;

        function __construct(){
            $this->Table = "wp_tmp_propositoobjetivo";
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." INNER JOIN wp_tmp_solicitud ON wp_tmp_solicitud.ID_SOLICITUD = ".$this->Table.".solicitud_id WHERE ".$this->Table.".solicitud_id = '".$this->solicitud_id."' and wp_tmp_solicitud.usuario_id = '".$this->usuario_id."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_assoc($Query)){
                $this->id = $row['id'];
                $this->solicitud_id = $row['solicitud_id'];
                $this->panegocio = $row['panegocio'];
                $this->atrmercado = $row['atrmercado'];
            }
        }
    }
?>