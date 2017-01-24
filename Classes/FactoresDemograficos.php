<?php
    class FactoresDemograficos{

        public $id;
        public $solicitud_id;
        public $crecimiento;
        public $creafecta;
        public $creaprovecha;
        public $natalidad;
        public $natafecta;
        public $nataprovecha;
        public $migracion;
        public $migafecta;
        public $migaprovecha;
        public $preparacion;
        public $preafecta;
        public $preaprovecha;
        public $diversidad;
        public $divafecta;
        public $divaprovecha;
        public $het;
        public $hetafecta;
        public $hetaprovecha;
        public $pat;
        public $patafecta;
        public $pataprovecha;
        public $moda;
        public $modafecta;
        public $modaprovecha;
        public $Table;
        public $usuario_id;

        function __construct(){
            $this->Table = "wp_tmp_fdemograficos";
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." INNER JOIN wp_tmp_solicitud ON wp_tmp_solicitud.ID_SOLICITUD = ".$this->Table.".solicitud_id WHERE ".$this->Table.".solicitud_id = '".$this->solicitud_id."' and wp_tmp_solicitud.usuario_id = '".$this->usuario_id."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_assoc($Query)){
                $this->id = $row['id'];
                $this->solicitud_id = $row['solicitud_id'];
                $this->crecimiento = $row['crecimiento'];
                $this->creafecta = $row['creafecta'];
                $this->creaprovecha = $row['creaprovecha'];
                $this->natalidad = $row['natalidad'];
                $this->natafecta = $row['natafecta'];
                $this->nataprovecha = $row['nataprovecha'];
                $this->migracion = $row['migracion'];
                $this->migafecta = $row['migafecta'];
                $this->migaprovecha = $row['migaprovecha'];
                $this->preparacion = $row['preparacion'];
                $this->preafecta = $row['preafecta'];
                $this->preaprovecha = $row['preaprovecha'];
                $this->diversidad = $row['diversidad'];
                $this->divafecta = $row['divafecta'];
                $this->divaprovecha = $row['divaprovecha'];
                $this->het = $row['het'];
                $this->hetafecta = $row['hetafecta'];
                $this->hetaprovecha = $row['hetaprovecha'];
                $this->pat = $row['pat'];
                $this->patafecta = $row['patafecta'];
                $this->pataprovecha = $row['pataprovecha'];
                $this->moda = $row['moda'];
                $this->modafecta = $row['modafecta'];
                $this->modaprovecha = $row['modaprovecha'];
            }
        }
    }
?>