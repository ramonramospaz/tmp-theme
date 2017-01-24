<?php
    class InformacionSobreLaDistribucion{
        public $id;
        public $solicitud_id;
        public $dispersidad;
        public $concentracion;
        public $omnipresente;
        public $mixta;
        public $centricidad;
        public $cantidad;
        public $horarios;
        public $tespera;
        public $aespera;
        public $proximidad;
        public $online;
        public $damigable;
        public $ddirecta;
        public $dintermediarios;
        public $dfranquicia;
        public $agentes;
        public $scredito;
        public $rmotivacion;
        public $stands;
        public $mpop;
        public $Table;
        public $usuario_id;

        function __construct(){
            if($_SESSION["tmp_t_producto"] == 1){
                $tproducto = 'bienes';
            } else{
                $tproducto = 'servicios';
            }
            $this->Table = "wp_tmp_idistribucion".$tproducto;
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." INNER JOIN wp_tmp_solicitud ON wp_tmp_solicitud.ID_SOLICITUD = ".$this->Table.".solicitud_id WHERE ".$this->Table.".solicitud_id = '".$this->solicitud_id."' and wp_tmp_solicitud.usuario_id = '".$this->usuario_id."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_assoc($Query)){
                $this->id = $row['id'];
                $this->solicitud_id = $row['solicitud_id'];
                $this->dispersidad = $row['dispersidad'];
                $this->concentracion = $row['concentracion'];
                $this->omnipresente = $row['omnipresente'];
                $this->mixta = $row['mixta'];
                $this->centricidad = $row['centricidad'];
                $this->cantidad = $row['cantidad'];
                $this->horarios = $row['horarios'];
                $this->tespera = $row['tespera'];
                $this->aespera = $row['aespera'];
                $this->proximidad = $row['proximidad'];
                $this->online = $row['online'];
                $this->damigable = $row['damigable'];
                $this->ddirecta = $row['ddirecta'];
                $this->dintermediarios = $row['dintermediarios'];
                $this->dfranquicia = $row['dfranquicia'];
                $this->agentes = $row['agentes'];
                $this->scredito = $row['scredito'];
                $this->rmotivacion = $row['rmotivacion'];
                $this->stands = $row['stands'];
                $this->mpop = $row['mpop'];
            }
        }
    }
?>