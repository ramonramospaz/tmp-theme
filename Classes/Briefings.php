<?php
    class Briefings{

        public $id_briefing;
        public $solicitud_id;
        public $tipou;
        public $nombre;
        public $apellido;
        public $direccion;
        public $pais;
        public $ciudad;
        public $contacto;
        public $sector;
        public $nempleados;
        public $noficinas;
        public $antiguedad;
        public $tamano;
        public $oficio;
        public $telefono;
        public $email;
        public $twitter;
        public $facebook;
        public $instagram;
        public $otrared;
        public $tipop;
        public $producto;
        public $marca;
        public $ciclo;
        public $caracteristicas;
        public $imagenes;
        public $necesidad;
        public $tconsumidor;
        public $tbase;
        public $m1;
        public $m2;
        public $m3;
        public $m4;
        public $m5;
        public $cprincipal;
        public $tcompetencia;
        public $justificacion;
        public $situacion;
        public $solucion;
        public $fecha_creacion;
        public $Table;
        public $usuario_id;

        function __construct(){
            $this->Table = "wp_tmp_briefing";
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." INNER JOIN wp_tmp_solicitud ON wp_tmp_solicitud.ID_SOLICITUD = ".$this->Table.".solicitud_id WHERE ".$this->Table.".solicitud_id = '".$this->solicitud_id."' and wp_tmp_solicitud.usuario_id = '".$this->usuario_id."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_assoc($Query)){
                $this->id_briefing = $row['id_briefing'];
                $this->solicitud_id = $row['solicitud_id'];
                $this->tipou = $row['tipou'];
                $this->nombre = $row['nombre'];
                $this->apellido = $row['apellido'];
                $this->direccion = $row['direccion'];
                $this->pais = $row['pais'];
                $this->ciudad = $row['ciudad'];
                $this->contacto = $row['contacto'];
                $this->sector = $row['sector'];
                $this->nempleados = $row['nempleados'];
                $this->noficinas = $row['noficinas'];
                $this->antiguedad = $row['antiguedad'];
                $this->tamano = $row['tamano'];
                $this->oficio = $row['oficio'];
                $this->telefono = $row['telefono'];
                $this->email = $row['email'];
                $this->twitter = $row['twitter'];
                $this->facebook = $row['facebook'];
                $this->instagram = $row['instagram'];
                $this->otrared = $row['otrared'];
                $this->tipop = $row['tipop'];
                $this->producto = $row['producto'];
                $this->marca = $row['marca'];
                $this->ciclo = $row['ciclo'];
                $this->caracteristicas = $row['caracteristicas'];
                $this->imagenes = $row['imagenes'];
                $this->necesidad = $row['necesidad'];
                $this->tconsumidor = $row['tconsumidor'];
                $this->tbase = $row['tbase'];
                $this->m1 = $row['m1'];
                $this->m2 = $row['m2'];
                $this->m3 = $row['m3'];
                $this->m4 = $row['m4'];
                $this->m5 = $row['m5'];
                $this->cprincipal = $row['cprincipal'];
                $this->tcompetencia = $row['tcompetencia'];
                $this->justificacion = $row['justificacion'];
                $this->situacion = $row['situacion'];
                $this->solucion = $row['solucion'];
                $this->fecha_creacion = $row['fecha_creacion'];
            }
        }
    }
?>