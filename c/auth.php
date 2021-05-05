<?php


namespace App\Cont;

use App\Models\M;

Class A{
    public static $RegError;
    public static $LogError;
    public static $LOGINED;
    public static $USER;



    public static function  Reg(){
        if(self::$LOGINED){return true;}
        $login=$_POST['login'];
        $password=$_POST['password'];
        $password2=$_POST['password2'];
        $_SESSION['aw_login']=$login;
        

        
        if($login=="" || $password=="" || $password2==""){ 
            self::$RegError='Введите все поля';
            return false;
        }
        if(preg_match("/[^A-Za-z0-9]/",$login)){ 
            self::$RegError='неверный формат логин';
            return false;
        }
        if($password!=$password2){ 
            self::$RegError='пароли не совподают';
            return false;
        }
        $m=new M();
        if($m->GetUser($login)){
            self::$RegError='такой пользователь уже существует';
            return false;
        }
        $u=$m->SetUser($login,$password);
        if($u==false){
            self::$RegError='ошибка создания пользователя';
            return false;
           
        }
        self::$USER=$u;
        self::$LOGINED=true;
        $_SESSION['login']=$login;
        $_SESSION['password']=$password;
        return true;
    }

    public static function Login(){
       
      
        $login=$_POST['login'] ?? $_SESSION['login'];
        $password=$_POST['password'] ;
        if($_POST['password']){$password=md5($password);}else{$password=$_SESSION['password'] ;}

        $_SESSION['aw_login']=$login;
        


        if($login=="" || $password=="" ){ 
            self::$LogError='Введите все поля';
            return false;
        }
        
        $m=new M();
        $user=$m->GetUser($login);
        
     
        if(!$user){
            self::$LogError='неверное имя пользователя или пароль';
            return false;
        }
        
        if($password!=$user['password']){
            self::$LogError='неверное имя пользователя или пароль';
            return false;

        }
      
        self::$USER=$user;
        self::$LOGINED=true;
        $_SESSION['login']=$login;
        $_SESSION['password']=$password;
      
        return true;

    }

    public static function Logout(){
        session_destroy();
        self::$USER="";
        self::$LOGINED=false;
    }


}

