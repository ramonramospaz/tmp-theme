<?php
    class PerfilGeografico{

        public $id;
        public $solicitud_id;  
        public $zona;  
        public $clima; 
        public $temp1; 
        public $temp2; 
        public $temp3; 
        public $temp4; 
        public $Table;
        public $usuario_id;

        function __construct(){
            $this->Table = "wp_tmp_pgeografico";
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." INNER JOIN wp_tmp_solicitud ON wp_tmp_solicitud.ID_SOLICITUD = ".$this->Table.".solicitud_id WHERE ".$this->Table.".solicitud_id = '".$this->solicitud_id."' and wp_tmp_solicitud.usuario_id = '".$this->usuario_id."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_assoc($Query)){
                $this->id = $row['id'];
                $this->solicitud_id = $row['solicitud_id'];
                $this->zona = $row['zona'];
                $this->clima = $row['clima'];
                $this->temp1 = $row['temp1'];
                $this->temp2 = $row['temp2'];
                $this->temp3 = $row['temp3'];
                $this->temp4 = $row['temp4'];
            }
        }
    }
?>