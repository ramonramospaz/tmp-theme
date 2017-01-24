<?php
    class PerfilPsicologicoOrganizacional{

        public $id;
        public $solicitud_id;
        public $necesidad;
        public $motivacion;
        public $actitud;
        public $otranecesidad;
        public $otramotivacion;
        public $otraactitud;
        public $acompetitiva;
        public $rasgo1;
        public $rasgo2;
        public $rasgo3;
        public $rasgo4;
        public $rasgo5;
        public $rasgo6;
        public $otrosrasgos;
        public $Table;
        public $usuario_id;

        function __construct(){
            $this->Table = "wp_tmp_ppsicologicoorg";
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." INNER JOIN wp_tmp_solicitud ON wp_tmp_solicitud.ID_SOLICITUD = ".$this->Table.".solicitud_id WHERE ".$this->Table.".solicitud_id = '".$this->solicitud_id."' and wp_tmp_solicitud.usuario_id = '".$this->usuario_id."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_assoc($Query)){
                $this->id = $row['id'];
                $this->solicitud_id = $row['solicitud_id'];
                $this->necesidad = $row['necesidad'];
                $this->motivacion = $row['motivacion'];
                $this->actitud = $row['actitud'];
                $this->otranecesidad = $row['otranecesidad'];
                $this->otramotivacion = $row['otramotivacion'];
                $this->otraactitud = $row['otraactitud'];
                $this->acompetitiva = $row['acompetitiva'];
                $this->rasgo1 = $row['rasgo1'];
                $this->rasgo2 = $row['rasgo2'];
                $this->rasgo3 = $row['rasgo3'];
                $this->rasgo4 = $row['rasgo4'];
                $this->rasgo5 = $row['rasgo5'];
                $this->rasgo6 = $row['rasgo6'];
                $this->otrosrasgos = $row['otrosrasgos'];
            }
        }
    }
?>