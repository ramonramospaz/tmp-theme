<?php
    class InformacionSobreLaPromocion{

        public $id;
        public $solicitud_id;
        public $inversion;
        public $efectividad;
        public $target;
        public $gimpacto;
        public $seleccion;
        public $cantidad;
        public $cobertura;
        public $periodico;
        public $impresos;
        public $radio;
        public $tv;
        public $tvcable;
        public $internet;
        public $redes;
        public $pubext;
        public $mediosdirectos;
        public $mktdirecto;
        public $matemp;
        public $promoventas;
        public $rpublicas;
        public $ventadirecta;
        public $fvinternas;
        public $nvinternos;
        public $fventas;
        public $franvenden;
        public $nvexternos;
        public $pcobranzas;
        public $cinternos;
        public $ncinternos;
        public $outsorcing;
        public $francobran;
        public $cexternos;
        public $Table;
        public $usuario_id;

        function __construct(){
            $this->Table = "wp_tmp_ipromocion";
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." INNER JOIN wp_tmp_solicitud ON wp_tmp_solicitud.ID_SOLICITUD = ".$this->Table.".solicitud_id WHERE ".$this->Table.".solicitud_id = '".$this->solicitud_id."' and wp_tmp_solicitud.usuario_id = '".$this->usuario_id."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_assoc($Query)){
                $this->id = $row['id'];
                $this->solicitud_id = $row['solicitud_id'];
                $this->inversion = $row['inversion'];
                $this->efectividad = $row['efectividad'];
                $this->target = $row['target'];
                $this->gimpacto = $row['gimpacto'];
                $this->seleccion = $row['seleccion'];
                $this->cantidad = $row['cantidad'];
                $this->cobertura = $row['cobertura'];
                $this->periodico = $row['periodico'];
                $this->impresos = $row['impresos'];
                $this->radio = $row['radio'];
                $this->tv = $row['tv'];
                $this->tvcable = $row['tvcable'];
                $this->internet = $row['internet'];
                $this->redes = $row['redes'];
                $this->pubext = $row['pubext'];
                $this->mediosdirectos = $row['mediosdirectos'];
                $this->mktdirecto = $row['mktdirecto'];
                $this->matemp = $row['matemp'];
                $this->promoventas = $row['promoventas'];
                $this->rpublicas = $row['rpublicas'];
                $this->ventadirecta = $row['ventadirecta'];
                $this->fvinternas = $row['fvinternas'];
                $this->nvinternos = $row['nvinternos'];
                $this->fventas = $row['fventas'];
                $this->franvenden = $row['franvenden'];
                $this->nvexternos = $row['nvexternos'];
                $this->pcobranzas = $row['pcobranzas'];
                $this->cinternos = $row['cinternos'];
                $this->ncinternos = $row['ncinternos'];
                $this->outsorcing = $row['outsorcing'];
                $this->francobran = $row['francobran'];
                $this->cexternos = $row['cexternos'];
            }
        }
    }
?>