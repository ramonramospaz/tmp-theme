<?php
    class IdentificacionDeLaCompetencia{

        public $id;
        public $solicitud_id;
        public $cprincipal;
        public $pp;
        public $m1;
        public $pc1;
        public $m2;
        public $pc2;
        public $m3;
        public $pc3;
        public $m4;
        public $pc4;
        public $m5;
        public $pc5;
        public $pc6;
        public $Table;
        public $usuario_id;

        function __construct(){
            $this->Table = "wp_tmp_icompetencia";
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." INNER JOIN wp_tmp_solicitud ON wp_tmp_solicitud.ID_SOLICITUD = ".$this->Table.".solicitud_id WHERE ".$this->Table.".solicitud_id = '".$this->solicitud_id."' and wp_tmp_solicitud.usuario_id = '".$this->usuario_id."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_assoc($Query)){
                $this->id = $row['id'];
                $this->solicitud_id = $row['solicitud_id'];
                $this->cprincipal = $row['cprincipal'];
                $this->pp = $row['pp'];
                $this->m1 = $row['m1'];
                $this->pc1 = $row['pc1'];
                $this->m2 = $row['m2'];
                $this->pc2 = $row['pc2'];
                $this->m3 = $row['m3'];
                $this->pc3 = $row['pc3'];
                $this->m4 = $row['m4'];
                $this->pc4 = $row['pc4'];
                $this->m5 = $row['m5'];
                $this->pc5 = $row['pc5'];
                $this->pc6 = $row['pc6'];
            }
        }
    }
?>