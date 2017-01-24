<?php
    class Solicitud{
        public $id_solicitud;
        public $servicio_id;
        public $usuario_id;
        public $codprom;
        public $progreso;
        public $status;
        public $fecha_creacion;
        public $Table;

        function __construct(){
            $this->Table = "wp_tmp_solicitud";
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." where id_solicitud='".$this->id_solicitud."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_assoc($Query)){
                $this->id_solicitud = $row['id_solicitud'];
                $this->servicio_id = $row['servicio_id'];
                $this->usuario_id = $row['usuario_id'];
                $this->codprom = $row['codprom'];
                $this->progreso = $row['progreso'];
                $this->status = $row['status'];
                $this->fecha_creacion = date('d-m-Y', strtotime($row['fecha_creacion']));
            }
        }
    }
?>