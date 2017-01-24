<?php
    class FactoresPoliticoLegales{

        public $id;
        public $solicitud_id;
        public $iap;
        public $iapafecta;
        public $iapaprovecha;
        public $ppd;
        public $ppdafecta;
        public $ppdaprovecha;
        public $idp;
        public $idpafecta;
        public $idpaprovecha;
        public $esp;
        public $espafecta;
        public $espaprovecha;
        public $con;
        public $conafecta;
        public $conaprovecha;
        public $lgl;
        public $lglafecta;
        public $lglaprovecha;
        public $lgm;
        public $lgmafecta;
        public $lgmaprovecha;
        public $Table;
        public $usuario_id;

        function __construct(){
            $this->Table = "wp_tmp_fpoliticolegales";
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." INNER JOIN wp_tmp_solicitud ON wp_tmp_solicitud.ID_SOLICITUD = ".$this->Table.".solicitud_id WHERE ".$this->Table.".solicitud_id = '".$this->solicitud_id."' and wp_tmp_solicitud.usuario_id = '".$this->usuario_id."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_assoc($Query)){
                $this->id = $row['id'];
                $this->solicitud_id = $row['solicitud_id'];
                $this->iap = $row['iap'];
                $this->iapafecta = $row['iapafecta'];
                $this->iapaprovecha = $row['iapaprovecha'];
                $this->ppd = $row['ppd'];
                $this->ppdafecta = $row['ppdafecta'];
                $this->ppdaprovecha = $row['ppdaprovecha'];
                $this->idp = $row['idp'];
                $this->idpafecta = $row['idpafecta'];
                $this->idpaprovecha = $row['idpaprovecha'];
                $this->esp = $row['esp'];
                $this->espafecta = $row['espafecta'];
                $this->espaprovecha = $row['espaprovecha'];
                $this->con = $row['con'];
                $this->conafecta = $row['conafecta'];
                $this->conaprovecha = $row['conaprovecha'];
                $this->lgl = $row['lgl'];
                $this->lglafecta = $row['lglafecta'];
                $this->lglaprovecha = $row['lglaprovecha'];
                $this->lgm = $row['lgm'];
                $this->lgmafecta = $row['lgmafecta'];
                $this->lgmaprovecha = $row['lgmaprovecha'];
            }
        }
    }
?>