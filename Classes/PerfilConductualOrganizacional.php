<?php
    class PerfilConductualOrganizacional{

        public $id;
        public $solicitud_id;
        public $frecuenciacompra;
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
        public $pvacag;
        public $vacindependencia;
        public $pvacin;
        public $frecuenciauso;
        public $lugar;
        public $unidad;
        public $cantidad;
        public $otraunidad;
        public $edadusuario;
        public $generousuario;
        public $rangousuario;
        public $departamentouso;
        public $edadinfluencia;
        public $generoinfluencia;
        public $rangoinfluencia;
        public $departamentoinfluencia;
        public $edadcomprador;
        public $generocomprador;
        public $rangocomprador;
        public $departamentocompra;
        public $fidelidad;
        public $Table;
        public $usuario_id;

        function __construct(){
            $this->Table = "wp_tmp_pconductualorg";
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." INNER JOIN wp_tmp_solicitud ON wp_tmp_solicitud.ID_SOLICITUD = ".$this->Table.".solicitud_id WHERE ".$this->Table.".solicitud_id = '".$this->solicitud_id."' and wp_tmp_solicitud.usuario_id = '".$this->usuario_id."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_assoc($Query)){
                $this->id = $row['id'];
                $this->solicitud_id = $row['solicitud_id'];
                $this->frecuenciacompra = $row['frecuenciacompra'];
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
                $this->pvacag = $row['pvacag'];
                $this->vacindependencia = $row['vacindependencia'];
                $this->pvacin = $row['pvacin'];
                $this->frecuenciauso = $row['frecuenciauso'];
                $this->lugar = $row['lugar'];
                $this->unidad = $row['unidad'];
                $this->cantidad = $row['cantidad'];
                $this->otraunidad = $row['otraunidad'];
                $this->edadusuario = $row['edadusuario'];
                $this->generousuario = $row['generousuario'];
                $this->rangousuario = $row['rangousuario'];
                $this->departamentouso = $row['departamentouso'];
                $this->edadinfluencia = $row['edadinfluencia'];
                $this->generoinfluencia = $row['generoinfluencia'];
                $this->rangoinfluencia = $row['rangoinfluencia'];
                $this->departamentoinfluencia = $row['departamentoinfluencia'];
                $this->edadcomprador = $row['edadcomprador'];
                $this->generocomprador = $row['generocomprador'];
                $this->rangocomprador = $row['rangocomprador'];
                $this->departamentocompra = $row['departamentocompra'];
                $this->fidelidad = $row['fidelidad'];
            }
        }
    }
?>