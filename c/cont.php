<?php

namespace App\Cont;

use App\Cont\A;
use App\Models\M;

class C
{

    public $ArrayTree = [];

    public static $selfarray = [];
 

    private function GetArrayTree($array, $parent)
    {

        $out = array();
        $i = 0;
        foreach ($array as $item) {
            if ($item['parent'] == $parent) {

                $out[$i] = $item;
                if (count(array_keys(array_column($array, 'parent'), $item['id']))) {
                    $out[$i]['child'] = $this->GetArrayTree($array, $item['id']);
                }

                $i++;
            }
        }

        return $out;
    }

    public function GetTREE($arr)
    {
        $this->ArrayTree = $this->GetArrayTree($arr, 0);
        self::$selfarray = $this->ArrayTree;
        // self::$arno=$this->$this->ArrayTree;
        return $this->ArrayTree;
    }





    private function WriteInterval($lvl)
    {
        for ($i = 1; $i < $lvl; $i++) {
            $m = "⟍";
            $m = "𑁋";
            echo ('<div style="padding:0; margin-left:-5px;width:30px; display:inline-block; font-size:25pt;text-align:right;margin-top:-40px;height:36px">' . $m . '</div>');
        }
    }
    private function WriteVKLADKA($id, $name, $content, $parent, $lvl, $haschild = false)
    {

        $active = "";
        if (A::$LOGINED || $lvl < 1) {
            $active = "active";
        }

        if ($haschild) {
            $btn_btn = '<span title="показать" onclick="slide(this)" class="btnb btnb2" rel="' . $active . '">❯</span>';
        } else {
            $btn_btn = '<span title=""  class="btnnobtn" rel="' . $active . '"> </span>';
        }




        $dell = "";
        $delitel = '';
        if (A::$LOGINED) {
            $dell = '<span title="Добавить в эту ветку"  onclick="showAdd(' . $id . ')"  class="btnb">✛</span><span title="редактировать обьект"  onclick="edit(' . $id . ')"  class="btnb">🖆</span><span title="удалить эту ветку"  onclick="showDel(' . $id . ',\'' . $name . '\')" class="btnb">✘</span>';
            $delitel = ':';
        } else {
            $content = "";
        }

        $lvlcol = ['btn-dark', 'btn-primary', 'btn-secondary', 'btn-success', 'btn-danger', 'btn-warning', 'btn-info', 'btn-light', 'btn-dark', 'alert-primary', 'alert-secondary', 'alert-success', 'alert-danger', 'alert-warning', 'alert-info', 'alert-light', 'alert-dark'];
        $ci = $lvl;
        if ($ci > 16) {
            $ci = 16;
        }
        $this->WriteInterval($lvl);
        echo ('
        <div  id="vkl_' . $id . '" vkl="' . $id . '" lvl="' . $lvl . '" parent="' . $parent . '" class="alert ' . $lvlcol[$ci] . '" mid="0" style="width:max-content; display:inline-block; margin:2px; padding:5px;">
        
        <span style=" font-weight:bolder" id="vkl_name_' . $id . '">' . $name . '</span> ' . $delitel . ' <span style="font-size:small; margin-right:10px" id="vkl_cont_' . $id . '">' . $content . '</span>
        <span class="btn btn-outline-light btnsel" style="padding:5px!important; display:none" onclick="doSelect(' . $id . ')"> Выбрать </span>
        <span class="ccontrol" >
        ' . $dell . '
        ' . $btn_btn . '
        </span>

        </div><br>
        ');
    }




    public function DrawDataTree($arr, $lvl = 0, $par = 0)
    {
        $active = "none";
        if (A::$LOGINED || $par < 1) {
            $active = "block";
        }

        //if (isset($arr)){$arr=$this->ArrayTree;}
        echo ('<div id="slide_' . $par . '" style="display:' . $active . '">');
        $lvl++;
        foreach ($arr as $u => $item) {
            $haschild = false;
            if (array_key_exists('child', $item)) {
                $haschild = true;
            }
            $this->WriteVKLADKA($item['id'], $item['name'], $item['content'], $item['parent'], $lvl, $haschild);
            if (array_key_exists('child', $item)) {

                $this->DrawDataTree($item['child'], $lvl, $item['id']);
            }
        }
        echo ('</div>');
    }

    public  function addTREE($edit = false)
    {
        $parent = $_POST['parent'];

        $name = $_POST['name'];
        $content = $_POST['content'];

        if ($parent == "") {
            $parent = "0";
        }
        if ($name == "") {
            $name = "БЕЗЫМЯННЫЙ";
        }
        if ($content == "") {
            $content = "-----";
        }

        $m = new M();
        if ($edit == false) {
            $m->AddData($name, $content, $parent);
        } else {

           
            $id=$_POST['id'];
            $ch = $this->AllParent($m->GetData(), $id);
           
            if(in_array($id,$ch)){$_SESSION['L']="Ошибка: нельзя перенести родительский элемент в элемент потомка"; return;}
            
            $m->AddData2($_POST['id'], $name, $content, $parent);
        }
    }


    //удаление элементов и потомков
    public  function dellTREE()
    {
        $id = $_POST['id'];
        if ($id == "") {
            return;
        }
        $m = new M();

        $ch = $this->GetChildID($m->GetData(), $id);


        foreach ($ch as $item) {
            $m->dellData($item);
        }

        $m->dellData($id);
    }


    //получаем id дочерних элементов
    private function GetChildID($array, $parent)
    {

        $out = array();

        $i = 0;
        foreach ($array as $item) {
            if ($item['parent'] == $parent) {

                $out[$i] = $item['id'];
                if (count(array_keys(array_column($array, 'parent'), $item['id']))) {
                    $out = array_merge($out, $this->GetChildID($array, $item['id']));
                }

                $i++;
            }
        }

        return $out;
    }

    //получаем все значения parent у потомков
    private function AllParent($array, $parent)
    {

        $out = array();

        $i = 0;
        foreach ($array as $item) {
            if ($item['parent'] == $parent) {

                $out[$i] = $item['parent'];

                if (count(array_keys(array_column($array, 'parent'), $item['id']))) {
                  
                    $out = array_merge($out, $this->AllParent($array, $item['id']));
                }

                $i++;
            }
        }
        
          return $out;
    }




}
