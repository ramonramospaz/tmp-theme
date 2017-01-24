<?php
    class PerfilDemograficoIndividual{

        public $id;
        public $solicitud_id;
        public $edad;
        public $genero;
        public $otrogenero;
        public $ecivil;
        public $otroecivil;
        public $imensual;
        public $ingreso;
        public $ginstruccion;
        public $otrogi;
        public $ocupacion;
        public $otraocupacion;
        public $cdvida;
        public $otrociclo;
        public $nfamiliar;
        public $Table;
        public $usuario_id;

        function __construct(){
            $this->Table = "wp_tmp_pdemograficoind";
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." INNER JOIN wp_tmp_solicitud ON wp_tmp_solicitud.ID_SOLICITUD = ".$this->Table.".solicitud_id WHERE ".$this->Table.".solicitud_id = '".$this->solicitud_id."' and wp_tmp_solicitud.usuario_id = '".$this->usuario_id."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_assoc($Query)){
                $this->id = $row['id'];
                $this->solicitud_id = $row['solicitud_id'];
                $this->edad = $row['edad'];
                $this->genero = $row['genero'];
                $this->otrogenero = $row['otrogenero'];
                $this->ecivil = $row['ecivil'];
                $this->otroecivil = $row['otroecivil'];
                $this->imensual = $row['imensual'];
                $this->ingreso = $row['ingreso'];
                $this->ginstruccion = $row['ginstruccion'];
                $this->otrogi = $row['otrogi'];
                $this->ocupacion = $row['ocupacion'];
                $this->otraocupacion = $row['otraocupacion'];
                $this->cdvida = $row['cdvida'];
                $this->otrociclo = $row['otrociclo'];
                $this->nfamiliar = $row['nfamiliar'];
            }
        }
    }
?>