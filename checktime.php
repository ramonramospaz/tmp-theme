<?php
    session_start();
    if(isset($_SESSION["BusyTime"])){
        $now_dt = new DateTime(date("h:i:s"));
        $expire_dt = new DateTime($_SESSION['BusyTime']);
        //echo $now_dt->format('h:i:s') ."\n". $expire_dt->format('h:i:s');
        if(isset($_SESSION["tmp_id_user"])){
            if ($now_dt > $expire_dt) {
                echo "Destroyed";
                unset($_SESSION["BusyTime"]);
            }
        }
    }
?>