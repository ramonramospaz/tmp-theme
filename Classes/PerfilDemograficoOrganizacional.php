<?php
    class PerfilDemograficoOrganizacional{

        public $id;
        public $solicitud_id;
        public $sector;
        public $tamano;
        public $antiguedad;
        public $calificacion;
        public $Table;
        public $usuario_id;

        function __construct(){
            $this->Table = "wp_tmp_pdemograficoorg";
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." INNER JOIN wp_tmp_solicitud ON wp_tmp_solicitud.ID_SOLICITUD = ".$this->Table.".solicitud_id WHERE ".$this->Table.".solicitud_id = '".$this->solicitud_id."' and wp_tmp_solicitud.usuario_id = '".$this->usuario_id."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_assoc($Query)){
                $this->id = $row['id'];
                $this->solicitud_id = $row['solicitud_id'];
                $this->sector = $row['sector'];
                $this->tamano = $row['tamano'];
                $this->antiguedad = $row['antiguedad'];
                $this->calificacion = $row['calificacion'];
            }
        }
    }
?>