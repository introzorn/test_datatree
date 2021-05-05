

<div class="form2" id ="msgbox" style="display:none">
    <button class="btn btn-danger btn-sm" style="float:right" onclick="hideMSGBOX()">⛌</button>
<div class="form3">

<form action="" id="addtree" method="post" style="display:none">
    <span id="addedit_text">Добавить</span> :
     <input type="hidden" id="prnt_name" name="parent" value=0>
     <input type="hidden" id="id_edit" name="id" value=0>
     <input type="hidden" name="cmd" id="addedit" value="add">
     <input type="text" class="form-control sbn-1" id="vname" name="name" placeholder="Имя вкладки" >
     <input type="text" class="form-control sbn-2" id="vcont" name="content" placeholder="Текст вкладки"  >
     <br>Родитель: <span id="view_parent" onclick="selectParent()" class="btn btn-dark sbn" title="Нажмите чтобы изменить" style="padding:5px; width:230px; overflow:hidden; margin:10px; height:36px"></span>
     <button type="submit" id="addedit_btn" class="btn btn-dark sbn">Добавить</button>
</form>

<form action="" id="delltree" method="post" style="display:none">
    Хотите удалить <span id="id_name"></span> ?<br>
    <input type="hidden" name="cmd" value="dell">
     <input type="hidden" id="id_dell" name="id" value=0>
     <button type="submit" class="btn btn-dark sbn">Удалить</button>
</form>


</div>
</div>
<div class="podlogka" id="podlogka2" onclick="hideSelect();"></div>


<div id="botcontainer">

<div class="btn btn-dark" id="footer" style="width:100%; text-align:right; " > 2021 introzorn &copy</div>
</div>


</body>
</html>