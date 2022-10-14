<?php

namespace App\Helper;


class Template
{
    public static function showStatus($status,$id,$link){
        $class = $status == 'active' ? 'btn btn-success' : 'btn btn-default';
        $html = '<a id="status-'.$id.'" href="javascript:ajaxStatus(\''.$link.'\', '.$id.')" class="'.$class.'"><i class="fa fa-check"></i></a>';
        return $html;
    }

    public static function showSpecial($special,$id,$link){
        $class = $special == 'yes' ? 'btn btn-success' : 'btn btn-default';
        $html = '<a id="special-'.$id.'" href="javascript:ajaxSpecial(\''.$link.'\', '.$id.')" class="'.$class.'"><i class="fa fa-check"></i></a>';
        return $html;
    }
}
