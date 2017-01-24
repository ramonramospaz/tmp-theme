<?php
    class ComportamientoOfertaDemanda{
        public $id;
        public $solicitud_id;
        public $coferta;
        public $pcoferta;
        public $pdoferta;
        public $ccoferta;
        public $cdemanda;
        public $pcdemanda;
        public $pddemanda;
        public $ccdemanda;
        public $Table;
        public $usuario_id;

        function __construct(){
            $this->Table = "wp_tmp_ofertavsdemanda";
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." INNER JOIN wp_tmp_solicitud ON wp_tmp_solicitud.ID_SOLICITUD = ".$this->Table.".solicitud_id WHERE ".$this->Table.".solicitud_id = '".$this->solicitud_id."' and wp_tmp_solicitud.usuario_id = '".$this->usuario_id."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_assoc($Query)){
                $this->id = $row['id'];
                $this->solicitud_id = $row['solicitud_id'];
                $this->coferta = $row['coferta'];
                $this->pcoferta = $row['pcoferta'];
                $this->pdoferta = $row['pdoferta'];
                $this->ccoferta = $row['ccoferta'];
                $this->cdemanda = $row['cdemanda'];
                $this->pcdemanda = $row['pcdemanda'];
                $this->pddemanda = $row['pddemanda'];
                $this->ccdemanda = $row['ccdemanda'];
            }
        }
    }
?>