<?php
    class CapacidadDeReaccion{

        public $id;
        public $solicitud_id;
        public $pregunta_id;
        public $creal;
        public $cmotivacional;
        public $Table;
        public $usuario_id;

        function __construct(){
            $this->Table = "wp_tmp_cdcompetencia";
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." INNER JOIN wp_tmp_solicitud ON wp_tmp_solicitud.ID_SOLICITUD = ".$this->Table.".solicitud_id WHERE ".$this->Table.".solicitud_id = '".$this->solicitud_id."' and wp_tmp_solicitud.usuario_id = '".$this->usuario_id."' order by pregunta_id";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            $Array = array();
            $i = 0;
            while($row = mysqli_fetch_assoc($Query)){
                $Array[$i]['id'] = $row['id'];
                $Array[$i]['solicitud_id'] = $row['solicitud_id'];
                $Array[$i]['pregunta_id'] = $row['pregunta_id'];
                $Array[$i]['creal'] = $row['creal'];
                $Array[$i]['cmotivacional'] = $row['cmotivacional'];
                $i++;
            }
            return $Array;
        }
    }
?>