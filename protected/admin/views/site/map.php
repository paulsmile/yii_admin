<?php
/* @var $topMenu 顶部菜单 */
?>
<style type="text/css">
    .J_lmenu dl{
        width:500px;
        border:1px solid #ccc;
        margin:10px;
        background:#CDE8F5;
    }

    .J_lmenu dl dd{
        display: table-cell;
        background: #fff;
        width:460px;
        vertical-align:middle;
    }
    .J_lmenu dl dt{
        display: table-cell;
        color:#666;
        vertical-align: middle;
        padding:10px 0px 10px 12px;
        font-weight: bold;
        font-size:14px;
        width:40px;
    }
    .J_lmenu dl dd span{
        display: block;
        clear:both;
        padding:2px;
    }
    .J_lmenu dl dd h3{
        color:#666;
        font-size:12px;
        font-weight: normal;
        display: table-cell;
        height:30px;
        line-height: 30px;;
        width:50px;

    }
    .J_lmenu dl dd ul{
        display: table-cell;
        vertical-align:middle;
        height:30px;
    }
    .J_lmenu dl dd ul li{
        float: left;
        padding:0 5px;
    }
    .map_menu .sub_menu a{
        color:#0364AE;
    }
</style>
<div id="J_lmenu" class="J_lmenu map_menu">
    <?php
    $menuData = array();
    foreach($topMenu as $v){
        $menuHtml = ''; //菜单
        $menuLi = $this->showMenu($v->id);
        $isMenu = stripos($menuLi,'<li')!==false; //是否有li标签
        if($isMenu){
            $menuHtml .= '<dl>';
            $menuHtml .= "<dt>{$v->name}</dt>";
            $menuHtml .= '<dd>';
            $menuHtml .= $menuLi;
            $menuHtml .= '</dd>';
            $menuHtml .= '</dl>';
        }
        echo $menuHtml;
    }
    ?>
</div>

<script type="text/javascript">
$(".map_menu span.J_switchs").remove();
</script>