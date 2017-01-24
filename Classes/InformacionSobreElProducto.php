<?php
    class InformacionSobreElProducto{

        public $id;
        public $solicitud_id;
        public $confabilidad;
        public $credibilidad;
        public $seguridad;
        public $garantias;
        public $innovacion;
        public $comodidad;
        public $vistosidad;
        public $practicidad;
        public $cortesia;
        public $empatia;
        public $excepciones;
        public $informar;
        public $respuesta;
        public $preparacion;
        public $tiempo;
        public $nombrar;
        public $funcionalidad;
        public $identificacion;
        public $soporte;
        public $cobranzas;
        public $reclamos;
        public $telemarketing;
        public $online;
        public $sugerencias;
        public $postventa;
        public $facilidades;
        public $servicio;
        public $Table;
        public $usuario_id;
        public $Cuestionario;

        function __construct(){
            if($_SESSION["tmp_t_producto"] == 1){
                $tproducto = 'bienes';
                $this->Cuestionario = "257";
            } else{
                $tproducto = 'servicios';
                $this->Cuestionario = "470";
            }
            $this->Table = "wp_tmp_iproducto".$tproducto;
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." INNER JOIN wp_tmp_solicitud ON wp_tmp_solicitud.ID_SOLICITUD = ".$this->Table.".solicitud_id WHERE ".$this->Table.".solicitud_id = '".$this->solicitud_id."' and wp_tmp_solicitud.usuario_id = '".$this->usuario_id."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_assoc($Query)){
                $this->id = $row['id'];
                $this->solicitud_id = $row['solicitud_id'];
                $this->confabilidad = $row['confabilidad'];
                $this->credibilidad = $row['credibilidad'];
                $this->seguridad = $row['seguridad'];
                $this->garantias = $row['garantias'];
                $this->innovacion = $row['innovacion'];
                $this->comodidad = $row['comodidad'];
                $this->vistosidad = $row['vistosidad'];
                $this->practicidad = $row['practicidad'];
                $this->cortesia = $row['cortesia'];
                $this->empatia = $row['empatia'];
                $this->excepciones = $row['excepciones'];
                $this->informar = $row['informar'];
                $this->respuesta = $row['respuesta'];
                $this->preparacion = $row['preparacion'];
                $this->tiempo = $row['tiempo'];
                $this->nombrar = $row['nombrar'];
                $this->funcionalidad = $row['funcionalidad'];
                $this->identificacion = $row['identificacion'];
                $this->soporte = $row['soporte'];
                $this->cobranzas = $row['cobranzas'];
                $this->reclamos = $row['reclamos'];
                $this->telemarketing = $row['telemarketing'];
                $this->online = $row['online'];
                $this->sugerencias = $row['sugerencias'];
                $this->postventa = $row['postventa'];
                $this->facilidades = $row['facilidades'];
                $this->servicio = $row['servicio'];
            }
        }
    }
?>