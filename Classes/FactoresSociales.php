<?php
    class FactoresSociales{

        public $id;
        public $solicitud_id;
        public $itd;
        public $itdafecta;
        public $itdaprovecha;
        public $itp;
        public $itpafecta;
        public $itpaprovecha;
        public $vsm;
        public $vsmafecta;
        public $vsmaprovecha;
        public $cvh;
        public $cvhafecta;
        public $cvhaprovecha;
        public $isp;
        public $ispafecta;
        public $ispaprovecha;
        public $icp;
        public $icpafecta;
        public $icpaprovecha;
        public $ita;
        public $itaafecta;
        public $itaaprovecha;
        public $Table;
        public $usuario_id;

        function __construct(){
            $this->Table = "wp_tmp_fsociales";
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." INNER JOIN wp_tmp_solicitud ON wp_tmp_solicitud.ID_SOLICITUD = ".$this->Table.".solicitud_id WHERE ".$this->Table.".solicitud_id = '".$this->solicitud_id."' and wp_tmp_solicitud.usuario_id = '".$this->usuario_id."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_assoc($Query)){
                $this->id = $row['id'];
                $this->solicitud_id = $row['solicitud_id'];
                $this->itd = $row['itd'];
                $this->itdafecta = $row['itdafecta'];
                $this->itdaprovecha = $row['itdaprovecha'];
                $this->itp = $row['itp'];
                $this->itpafecta = $row['itpafecta'];
                $this->itpaprovecha = $row['itpaprovecha'];
                $this->vsm = $row['vsm'];
                $this->vsmafecta = $row['vsmafecta'];
                $this->vsmaprovecha = $row['vsmaprovecha'];
                $this->cvh = $row['cvh'];
                $this->cvhafecta = $row['cvhafecta'];
                $this->cvhaprovecha = $row['cvhaprovecha'];
                $this->isp = $row['isp'];
                $this->ispafecta = $row['ispafecta'];
                $this->ispaprovecha = $row['ispaprovecha'];
                $this->icp = $row['icp'];
                $this->icpafecta = $row['icpafecta'];
                $this->icpaprovecha = $row['icpaprovecha'];
                $this->ita = $row['ita'];
                $this->itaafecta = $row['itaafecta'];
                $this->itaaprovecha = $row['itaaprovecha'];
            }
        }
    }
?>