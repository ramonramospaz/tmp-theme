<?php
    class DinamicaDelMercado{
        public $id;
        public $solicitud_id;
        public $cmercado;
        public $pcindustria;
        public $pdindustria;
        public $rcrecimiento;
        public $otrasrcrecimiento;
        public $rcontraccion;
        public $otrasrcontraccion;
        public $rmantenimiento;
        public $otrasrmantenimiento;
        public $Table;
        public $usuario_id;

        function __construct(){
            $this->Table = "wp_tmp_dinamicamercado";
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." INNER JOIN wp_tmp_solicitud ON wp_tmp_solicitud.ID_SOLICITUD = ".$this->Table.".solicitud_id WHERE ".$this->Table.".solicitud_id = '".$this->solicitud_id."' and wp_tmp_solicitud.usuario_id = '".$this->usuario_id."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_assoc($Query)){
                $this->id = $row['id'];
                $this->solicitud_id = $row['solicitud_id'];
                $this->cmercado = $row['cmercado'];
                $this->pcindustria = $row['pcindustria'];
                $this->pdindustria = $row['pdindustria'];
                $this->rcrecimiento = $row['rcrecimiento'];
                $this->otrasrcrecimiento = $row['otrasrcrecimiento'];
                $this->rcontraccion = $row['rcontraccion'];
                $this->otrasrcontraccion = $row['otrasrcontraccion'];
                $this->rmantenimiento = $row['rmantenimiento'];
                $this->otrasrmantenimiento = $row['otrasrmantenimiento'];
            }
        }
    }
?>