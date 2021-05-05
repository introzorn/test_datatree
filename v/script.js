function showLogin(){
    document.getElementById("podlogka").style.display='block';
    document.getElementById("loginblock").style.display='block';
}
function showReg(){
    document.getElementById("podlogka").style.display='block';
    document.getElementById("regblock").style.display='block';
}
function hideForms(){
    document.getElementById("podlogka").style.display='none';
    document.getElementById("loginblock").style.display='none';
    document.getElementById("regblock").style.display='none';
}






function slide(btn){
    id=btn.parentNode.parentNode.getAttribute('vkl');
    if(btn.getAttribute('rel')!='active'){
        btn.setAttribute('rel','active');
        document.getElementById('slide_'+id).style.display="block";
    }else{
        btn.setAttribute('rel','');
        document.getElementById('slide_'+id).style.display="none";
    }
    


}







function hideMSGBOX(){
    document.getElementById("msgbox").style.display='none';

}
function showAdd(id){
    
    if(document.getElementById("podlogka2").style.getPropertyValue("display")=='block'){return;}
    document.getElementById("delltree").style.display='none';
     document.getElementById("addtree").style.display='block';
     document.getElementById("msgbox").style.display='block';
    document.getElementById("prnt_name").setAttribute('value',id);
    document.getElementById("addedit").setAttribute('value','add');
    document.getElementById("vname").setAttribute('value','');
    document.getElementById("vcont").setAttribute('value','');
    document.getElementById("addedit_text").innerHTML="Добавить";
    document.getElementById("addedit_btn").innerHTML="Добавить";
    document.getElementById("id_edit").setAttribute('value','');

    drawParent(id);
}


 function showDel(id, name){
    document.getElementById("delltree").style.display='block';
     document.getElementById("addtree").style.display='none';
     document.getElementById("msgbox").style.display='block';
      document.getElementById("id_name").innerHTML=name;
    document.getElementById("id_dell").setAttribute('value',id);

}  

function edit(id){

    document.getElementById("delltree").style.display='none';
     document.getElementById("addtree").style.display='block';
     document.getElementById("msgbox").style.display='block';
     p=document.getElementById("vkl_"+id).getAttribute('parent');
 
    document.getElementById("prnt_name").setAttribute('value',p);
    document.getElementById("addedit").setAttribute('value','edit');
    n=document.getElementById("vkl_name_"+id).innerHTML;
    c=document.getElementById("vkl_cont_"+id).innerHTML;
    document.getElementById("vname").setAttribute('value',n);
    document.getElementById("vcont").setAttribute('value',c);
    document.getElementById("id_edit").setAttribute('value',id);
    document.getElementById("addedit_text").innerHTML="Изменить";
    document.getElementById("addedit_btn").innerHTML="Изменить";
    drawParent(p);
}

function drawParent(parent){
    if(parent!=0){
    cls=document.getElementById("vkl_"+parent).className;
    n=document.getElementById("vkl_name_"+parent).innerHTML;
    }else{
    cls="btn-outline-info";
    n="Корневой эелемент"
    }
    document.getElementById("view_parent").innerHTML=parent+' -> '+n;
    document.getElementById("view_parent").className=cls+' btn sbnp'
}

function selectParent(){
    document.getElementById("podlogka2").style.setProperty("display","block")
    document.getElementById("scroller").style.setProperty("z-index","999999")
    el=document.querySelectorAll( ".ccontrol" );
    for (element of el) {
        element.style.setProperty("display","none");
     }
     btn=document.querySelectorAll( ".btnsel" );
    for (element of btn) {
        element.style.setProperty("display","inline-block");
     }



 }    
 
 function doSelect(id){
    document.getElementById("podlogka2").style.setProperty("display","none")
    document.getElementById("scroller").style.setProperty("z-index","auto")
    el=document.querySelectorAll( ".ccontrol" );
    for (element of el) {
        element.style.setProperty("display","inline");
     }
     btn=document.querySelectorAll( ".btnsel" );
    for (element of btn) {
        element.style.setProperty("display","none");
     }
     document.getElementById("prnt_name").setAttribute('value',id);
     drawParent(id);
 }

 function hideSelect(){
    document.getElementById("podlogka2").style.setProperty("display","none")
    document.getElementById("scroller").style.setProperty("z-index","auto")
    el=document.querySelectorAll( ".ccontrol" );
    for (element of el) {
        element.style.setProperty("display","inline");
     }
     btn=document.querySelectorAll( ".btnsel" );
    for (element of btn) {
        element.style.setProperty("display","none");
     }

 }

 window.onresize = function() {
    h1=document.getElementById("topcontainer").clientHeight;
    h2=document.getElementById("footer").clientHeight;

    document.getElementById("scroller").style.setProperty("height",'calc (100vh-'+(h2+h1)+"px)")
};

document.addEventListener("DOMContentLoaded", function(event){
window.addEventListener('resize',function() {
    scrollersize(); 
});
scrollersize();
});

function scrollersize(){

        h1=document.getElementById("topcontainer").offsetHeight;
         h2=document.getElementById("botcontainer").offsetHeight;
            h=window.innerHeight-h1-h2-20;
           
         document.getElementById("scroller").style.height=h+'px';

}

