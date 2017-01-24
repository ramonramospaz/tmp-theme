<?php
    class PerfilSocioCulturalIndividual{

        public $id;
        public $solicitud_id;
        public $fculturales;
        public $oeculturales;
        public $fsubculturales;
        public $greferencia;
        public $gpertenencia;
        public $ogpertenencia;
        public $csocial;
        public $Table;
        public $usuario_id;

        function __construct(){
            $this->Table = "wp_tmp_psocioculturalind";
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." INNER JOIN wp_tmp_solicitud ON wp_tmp_solicitud.ID_SOLICITUD = ".$this->Table.".solicitud_id WHERE ".$this->Table.".solicitud_id = '".$this->solicitud_id."' and wp_tmp_solicitud.usuario_id = '".$this->usuario_id."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_assoc($Query)){
                $this->id = $row['id'];
                $this->solicitud_id = $row['solicitud_id'];
                $this->fculturales = $row['fculturales'];
                $this->oeculturales = $row['oeculturales'];
                $this->fsubculturales = $row['fsubculturales'];
                $this->greferencia = $row['greferencia'];
                $this->gpertenencia = $row['gpertenencia'];
                $this->ogpertenencia = $row['ogpertenencia'];
                $this->csocial = $row['csocial'];
            }
        }
    }
?>