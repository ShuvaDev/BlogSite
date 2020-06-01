<?php
    class session
    {
        public static function init()
        {
            session_start();
        }
        public function set($key,$val)
        {
            $_SESSION[$key]=$val;
        }
        public function get($key)
        {
            if(isset($_SESSION[$key]))
            {
                return $_SESSION[$key];
            }else{
                return false;
            }
        }
        public static function checksession(){
            self::init();
            if(!(self::get("login"))=="true")
            {
                self::session_destroy();
                header("Location: login.php");
            }
        }
        public static function session_destroy()
        {
            session_destroy();
            session_unset();
            header("Location: login.php");
        }
    }

?>