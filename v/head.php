<?php 
use App\Cont\A;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="v/script.js"></script>
    
    <link rel="stylesheet" href="v/style.css">
    <title>DataTree</title>
</head>
<body>
<div id="topcontainer" style="display:block">
<div class="header">
    <canvas id="animhead" sh="0" width="1198" height="100"></canvas>
    <div class="maintext">Data Tree Viewer</div>
    <div class="headbtn" >
        <?php 

    if(A::$LOGINED){
echo('
<span  class="btn btn-primary"  >'.A::$USER['user'].'</span>  <a href="?cmd=logout" class="btn btn-dark"  onclick="">выход</a> 
   

');
    }else{

    echo('
     <a  class="btn btn-dark" onclick="showLogin();" >Логин</a>  <a  class="btn btn-dark"  onclick="showReg();">регистрация</a> 
   
    ');
    }

    ?>
</div>
</div>

<div class="podlogka" id="podlogka" onclick="hideForms();"></div>
<div class="loginblock" id="loginblock">
    <div>
        <button style="float:right" class="btn btn-dark" onclick="hideForms();">⛌</button>
    </div>
    <br><br><h3>Авторизация</h3>
<form action="" method="post">
    <input type="hidden" name="cmd" value="login">
<div class="form-group">

  <input type="text"
      class="form-control form-control-sm" name="login" id="" value="<?php echo($_SESSION['aw_login']);?>" aria-describedby="helpId" placeholder="Введите логин">
  <small id="helpId" class="form-text text-muted">Ваш логин в системе</small>
</div>
<div class="form-group">
 
  <input type="password"
      class="form-control form-control-sm" name="password" id="" aria-describedby="helpId" placeholder="Введите пароль">
  <small id="helpId" class="form-text text-muted">Ваш пароль в системе</small>
</div>

<button type="submit" class="btn btn-lg btn-primary ">Войти в аккаунт</button>
</form> 
<small id="helpId" class="form-text text-muted" style="color:red!important;"><?php echo(A::$LogError);?></small>
<br>
</div>


<div class="loginblock" id="regblock">
    <div>
        <button style="float:right" class="btn btn-dark" onclick="hideForms();">⛌</button>
    </div>
    <br><br><h3>Простая регистрация</h3>
<form action="" method="post">
<input type="hidden" name="cmd" value="reg">
<div class="form-group">

  <input type="text"
      class="form-control form-control-sm" name="login" id="" aria-describedby="helpId"  value="<?php echo($_SESSION['aw_login']);?>" placeholder="Придумайте логин">
  <small id="helpId" class="form-text text-muted">Ваш логин в системе</small>
</div>
<div class="form-group">
 
  <input type="password"
      class="form-control form-control-sm" name="password" id="" aria-describedby="helpId" placeholder="Придумайте пароль">
  <small id="helpId" class="form-text text-muted">Ваш пароль в системе</small>
</div>
<div class="form-group">
 
  <input type="password"
      class="form-control form-control-sm" name="password2" id="" aria-describedby="helpId" placeholder="Повторите пароль">
  <small id="helpId" class="form-text text-muted">Еще раз</small>
</div>

<button type="submit" class="btn btn-lg btn-primary ">Зарегистрироваться</button>
</form> 
<small id="helpId" class="form-text text-muted" style="color:red!important;"><?php echo(A::$RegError);?></small>
<br>
</div>

<h3 class="ch3">ТУТ сформированно дерево вкладок</h3>

</div>





<script>


  <?php if(!A::$RegError==''){echo('showReg()');} ?>  
  <?php if(!A::$LogError==''){echo('showLogin()');} ?>  
</script>
<script src="v/animhead.js"></script>


<?php A::$RegError ?>


