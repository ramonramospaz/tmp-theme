<?php
    class PerfilConductualIndividual{

        public $id;
        public $solicitud_id;
        public $frecuenciacompra;
        public $otrafcompra;
        public $vacescolares;
        public $pvaces;
        public $vacverano;
        public $pvacve;
        public $vacinvierno;
        public $pvacna;
        public $vachalloween;
        public $pvacha;
        public $vacfinano;
        public $pvacfa;
        public $vaccarnaval;
        public $pvacca;
        public $vacacciongracias;
        public $tdeportiva;
        public $ptdep;
        public $pvacag;
        public $vacindependencia;
        public $pvacin;
        public $frecuenciauso;
        public $otrafuso;
        public $lugar;
        public $unidades;
        public $otrasunidades;
        public $influye;
        public $otroinfluye;
        public $compra;
        public $otrocompra;
        public $usa;
        public $otrausa;
        public $fidelidad;
        public $Table;
        public $usuario_id;

        function __construct(){
            $this->Table = "wp_tmp_pconductualind";
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." INNER JOIN wp_tmp_solicitud ON wp_tmp_solicitud.ID_SOLICITUD = ".$this->Table.".solicitud_id WHERE ".$this->Table.".solicitud_id = '".$this->solicitud_id."' and wp_tmp_solicitud.usuario_id = '".$this->usuario_id."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_assoc($Query)){
                $this->id = $row['id'];
                $this->solicitud_id = $row['solicitud_id'];
                $this->frecuenciacompra = $row['frecuenciacompra'];
                $this->otrafcompra = $row['otrafcompra'];
                $this->vacescolares = $row['vacescolares'];
                $this->pvaces = $row['pvaces'];
                $this->vacverano = $row['vacverano'];
                $this->pvacve = $row['pvacve'];
                $this->vacinvierno = $row['vacinvierno'];
                $this->pvacna = $row['pvacna'];
                $this->vachalloween = $row['vachalloween'];
                $this->pvacha = $row['pvacha'];
                $this->vacfinano = $row['vacfinano'];
                $this->pvacfa = $row['pvacfa'];
                $this->vaccarnaval = $row['vaccarnaval'];
                $this->pvacca = $row['pvacca'];
                $this->vacacciongracias = $row['vacacciongracias'];
                $this->tdeportiva = $row['tdeportiva'];
                $this->ptdep = $row['ptdep'];
                $this->pvacag = $row['pvacag'];
                $this->vacindependencia = $row['vacindependencia'];
                $this->pvacin = $row['pvacin'];
                $this->frecuenciauso = $row['frecuenciauso'];
                $this->otrafuso = $row['otrafuso'];
                $this->lugar = $row['lugar'];
                $this->unidades = $row['unidades'];
                $this->otrasunidades = $row['otrasunidades'];
                $this->influye = $row['influye'];
                $this->otroinfluye = $row['otroinfluye'];
                $this->compra = $row['compra'];
                $this->otrocompra = $row['otrocompra'];
                $this->usa = $row['usa'];
                $this->otrausa = $row['otrausa'];
                $this->fidelidad = $row['fidelidad'];
            }
        }
    }
?>