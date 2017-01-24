<?php
    class Servicio{
        public $ID;
        public $post_author;
        public $post_date;
        public $post_date_gmt;
        public $post_content;
        public $post_title;
        public $post_excerpt;
        public $post_status;
        public $comment_status;
        public $ping_status;
        public $post_password;
        public $post_name;
        public $to_ping;
        public $pinged;
        public $post_modified;
        public $post_modified_gmt;
        public $post_content_filtered;
        public $post_parent;
        public $guid;
        public $menu_order;
        public $post_type;
        public $post_mime_type;
        public $comment_count;
        public $Table;

        function __construct(){
            $this->Table = "wp_posts";
        }
        function GetDataReport(){
            $QuerySQL = "SELECT ".$this->Table.".* FROM ".$this->Table." where ID='".$this->ID."'";
            $Query = mysqli_query($GLOBALS['conexion'], $QuerySQL) or die(mysqli_error($GLOBALS['conexion']));
            while($row = mysqli_fetch_array($Query)){
                $this->ID = $row['ID'];
                $this->post_author = $row['post_author'];
                $this->post_date = $row['post_date'];
                $this->post_date_gmt = $row['post_date_gmt'];
                $this->post_content = utf8_encode($row['post_content']);
                $this->post_title = utf8_encode($row['post_title']);
                $this->post_excerpt = $row['post_excerpt'];
                $this->post_status = $row['post_status'];
                $this->comment_status = $row['comment_status'];
                $this->ping_status = $row['ping_status'];
                $this->post_password = $row['post_password'];
                $this->post_name = $row['post_name'];
                $this->to_ping = $row['to_ping'];
                $this->pinged = $row['pinged'];
                $this->post_modified = $row['post_modified'];
                $this->post_modified_gmt = $row['post_modified_gmt'];
                $this->post_content_filtered = $row['post_content_filtered'];
                $this->post_parent = $row['post_parent'];
                $this->guid = $row['guid'];
                $this->menu_order = $row['menu_order'];
                $this->post_type = $row['post_type'];
                $this->post_mime_type = $row['post_mime_type'];
                $this->comment_count = $row['comment_count'];
            }
        }
    }
?>