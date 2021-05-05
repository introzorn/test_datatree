<?php

use App\Cont\C;
use App\Cont\A;
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Pragma: no-cache'); 		
header('Last-Modified: '.gmdate("D, d M Y H:i:s \G\M\T"));
header("Content-Type: text/html;charset=utf-8");   



require_once("head.php");

?>


<!--  Основное тело -->








<div class="scroller" id="scroller">
    <div class="tree_cont">
    <?php if(A::$LOGINED){
          echo('<div parent="0" onclick="showAdd(0)" class="btn btn-outline-info" mid="0" style="width:100%; display:inline-block; margin:2px ; margin-bottom:10px; padding:5px; text-align:center">
           > Добавить корневой элемент < <span class="btn btn-outline-dark btnsel" style="padding:5px!important; display:none" onclick="doSelect(0)"> Выбрать </span>
          </div>
          ') ;

    }
    $c->DrawDataTree($c->ArrayTree);?>



    </div>


    </div>





<script>
 

</script>


<!--  Основное тело -->


<?php

require_once("footer.php");
if($_SESSION['L']!=""){echo("<script>alert('".$_SESSION['L']."');</script>"); $_SESSION['L']='';}
?>