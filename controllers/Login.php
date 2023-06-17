<?php
    require_once "models/User.php";    
    class Login{
        public function __construct(){}
        public function main(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/company/header.view.php";
                require_once "views/company/login.view.php";
                require_once "views/company/footer.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user = new User(
                    $_POST['user'],
                    $_POST['pass']
                );
                $user = $user->login();                
                if ($user) {                    
                    header("Location:?c=Dashboard");                
                } else {
                    require_once "views/company/header.view.php";
                    require_once "views/company/login.view.php";
                    echo "El Usuario no está registrado";
                    require_once "views/company/footer.view.php";
                }                
            }
        }
    }    
?>