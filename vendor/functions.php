<?php
define("MainUrl","http://localhost:8080/niceadmin/");

function baseUrl($url=null) {
return MainUrl . $url;


}

function auth($rule2 = null , $rule3= null){
    // if(!$_SESSION['auth']){
    //     header('Location: ' . baseUrl('login.php'));
    //   }
    if($_COOKIE['auth_user'] ){
      if($_SESSION['auth']['type'] == 'admin' || $_SESSION['auth']['type'] == $rule2 || $_SESSION['auth']['type'] == $rule3  ){
      

      }
      else{
        header('Location: ' . baseUrl('error403.php'));
      }

    }
    else{
      header('Location: ' . baseUrl('login.php'));

    }
}

?>