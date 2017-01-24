<?php
    class AccionesDeLaCompetencia{

        public $id;
        public $solicitud_id;
        public $nmat;
        public $nmatafecta;
        public $nmataprovecha;
        public $npro;
        public $nproafecta;
        public $nproaprovecha;
        public $nmed;
        public $nmedafecta;
        public $nmedaprovecha;
        public $ntec;
        public $ntecafecta;
        public $ntecaprovecha;
        public $ainf;
        public $ainfafecta;
        public $ainfaprovecha;
        public $ecie;
        public $ecieafecta;
        public $ecieaprovecha;
        public $Table;
        public $usuario_id;

        function __construct(){
            $this->Table = "wp_tmp_ftecnologicos";
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." INNER JOIN wp_tmp_solicitud ON wp_tmp_solicitud.ID_SOLICITUD = ".$this->Table.".solicitud_id WHERE ".$this->Table.".solicitud_id = '".$this->solicitud_id."' and wp_tmp_solicitud.usuario_id = '".$this->usuario_id."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_assoc($Query)){
                $this->id = $row['id'];
                $this->solicitud_id = $row['solicitud_id'];
                $this->nmat = $row['nmat'];
                $this->nmatafecta = $row['nmatafecta'];
                $this->nmataprovecha = $row['nmataprovecha'];
                $this->npro = $row['npro'];
                $this->nproafecta = $row['nproafecta'];
                $this->nproaprovecha = $row['nproaprovecha'];
                $this->nmed = $row['nmed'];
                $this->nmedafecta = $row['nmedafecta'];
                $this->nmedaprovecha = $row['nmedaprovecha'];
                $this->ntec = $row['ntec'];
                $this->ntecafecta = $row['ntecafecta'];
                $this->ntecaprovecha = $row['ntecaprovecha'];
                $this->ainf = $row['ainf'];
                $this->ainfafecta = $row['ainfafecta'];
                $this->ainfaprovecha = $row['ainfaprovecha'];
                $this->ecie = $row['ecie'];
                $this->ecieafecta = $row['ecieafecta'];
                $this->ecieaprovecha = $row['ecieaprovecha'];
            }
        }
    }
?>