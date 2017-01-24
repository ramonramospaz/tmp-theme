<?php
    class FactoresEconomicos{

        public $id;
        public $solicitud_id;
        public $inf;
        public $infafecta;
        public $infaprovecha;
        public $pib;
        public $pibafecta;
        public $pibaprovecha;
        public $eip;
        public $eipafecta;
        public $eipaprovecha;
        public $pgp;
        public $pgpafecta;
        public $pgpaprovecha;
        public $pfi;
        public $pfiafecta;
        public $pfiaprovecha;
        public $tip;
        public $tipafecta;
        public $tipaprovecha;
        public $tib;
        public $tibafecta;
        public $tibaprovecha;
        public $tcm;
        public $tcmafecta;
        public $tcmaprovecha;
        public $ceco;
        public $cecafecta;
        public $cecaprovecha;
        public $cdm;
        public $cdmafecta;
        public $cdmaprovecha;
        public $cod;
        public $codafecta;
        public $codaprovecha;
        public $dmp;
        public $dmpafecta;
        public $dmpaprovecha;
        public $adc;
        public $adcafecta;
        public $adcaprovecha;
        public $rdc;
        public $rdcafecta;
        public $rdcaprovecha;
        public $edo;
        public $edoafecta;
        public $edoaprovecha;
        public $cdo;
        public $cdoafecta;
        public $cdoaprovecha;
        public $Table;
        public $usuario_id;

        function __construct(){
            $this->Table = "wp_tmp_feconomicos";
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." INNER JOIN wp_tmp_solicitud ON wp_tmp_solicitud.ID_SOLICITUD = ".$this->Table.".solicitud_id WHERE ".$this->Table.".solicitud_id = '".$this->solicitud_id."' and wp_tmp_solicitud.usuario_id = '".$this->usuario_id."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_assoc($Query)){
                $this->id = $row['id'];
                $this->solicitud_id = $row['solicitud_id'];
                $this->inf = $row['inf'];
                $this->infafecta = $row['infafecta'];
                $this->infaprovecha = $row['infaprovecha'];
                $this->pib = $row['pib'];
                $this->pibafecta = $row['pibafecta'];
                $this->pibaprovecha = $row['pibaprovecha'];
                $this->eip = $row['eip'];
                $this->eipafecta = $row['eipafecta'];
                $this->eipaprovecha = $row['eipaprovecha'];
                $this->pgp = $row['pgp'];
                $this->pgpafecta = $row['pgpafecta'];
                $this->pgpaprovecha = $row['pgpaprovecha'];
                $this->pfi = $row['pfi'];
                $this->pfiafecta = $row['pfiafecta'];
                $this->pfiaprovecha = $row['pfiaprovecha'];
                $this->tip = $row['tip'];
                $this->tipafecta = $row['tipafecta'];
                $this->tipaprovecha = $row['tipaprovecha'];
                $this->tib = $row['tib'];
                $this->tibafecta = $row['tibafecta'];
                $this->tibaprovecha = $row['tibaprovecha'];
                $this->tcm = $row['tcm'];
                $this->tcmafecta = $row['tcmafecta'];
                $this->tcmaprovecha = $row['tcmaprovecha'];
                $this->ceco = $row['ceco'];
                $this->cecafecta = $row['cecafecta'];
                $this->cecaprovecha = $row['cecaprovecha'];
                $this->cdm = $row['cdm'];
                $this->cdmafecta = $row['cdmafecta'];
                $this->cdmaprovecha = $row['cdmaprovecha'];
                $this->cod = $row['cod'];
                $this->codafecta = $row['codafecta'];
                $this->codaprovecha = $row['codaprovecha'];
                $this->dmp = $row['dmp'];
                $this->dmpafecta = $row['dmpafecta'];
                $this->dmpaprovecha = $row['dmpaprovecha'];
                $this->adc = $row['adc'];
                $this->adcafecta = $row['adcafecta'];
                $this->adcaprovecha = $row['adcaprovecha'];
                $this->rdc = $row['rdc'];
                $this->rdcafecta = $row['rdcafecta'];
                $this->rdcaprovecha = $row['rdcaprovecha'];
                $this->edo = $row['edo'];
                $this->edoafecta = $row['edoafecta'];
                $this->edoaprovecha = $row['edoaprovecha'];
                $this->cdo = $row['cdo'];
                $this->cdoafecta = $row['cdoafecta'];
                $this->cdoaprovecha = $row['cdoaprovecha'];
            }
        }
    }
?>