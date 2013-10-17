<?php
/*@var $topMenu 顶部菜单*/
?>
<!doctype html>
<html class="off">
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/admin/style.css"/>
    <title>管理中心</title>
</head>
<body scroll="no">
<div id="header">
    <div class="logo"><a href="admin.php" title="管理中心"></a></div>
    <div class="fr">
        <div class="cut_line admin_info tr">
            <a href="<?php echo Yii::app()->baseUrl ?>/index.php" target="_blank">网站首页</a>
            <span class="cut">|</span><span class="mr10"><?php echo Yii::app()->user->name ?></span>
            <a href="<?php echo Yii::app()->createUrl('backendUser/updateSelfPwd') ?>"
               id="changePwd">修改个人资料</a>
            <a href="<?php echo Yii::app()->createUrl('site/logout') ?>">[注销]</a>
        </div>
    </div>
    <?php

    //顶部菜单
    $menuData = array();
    foreach($topMenu as $v){
        $childHtml = ''; //左侧子菜单
        $menuLi = $this->showMenu($v->id);
        $isMenu = stripos($menuLi,'<li')!==false; //是否有li标签
        if($isMenu){
            $childHtml .= "<span id='menu_{$v->id}'style='display:none' >";
            $childHtml .= $menuLi;
            $childHtml .= '</span>';
            $menuData[] = array(
                'label'=>$v->name,
                'url'=>'javascript:;',
                'itemOptions'=>array('class'=>'top_menu','data-id'=>$v->id),
                'activeCssClass'=>'on',
            );
        }
        echo $childHtml;
    }

    $this->widget('zii.widgets.CMenu',array(
        'items'=>$menuData,
        'htmlOptions'=>array('class'=>'nav white J_tmenu'),
    ));

    ?>
</div>
<div id="content">
    <!--左侧菜单-->
    <div class="left_menu fl">
        <div id="J_lmenu" class="J_lmenu" >
        </div>
        <a href="javascript:;" id="J_lmoc"
           style="outline-style: none; outline-color: invert; outline-width: medium;"
           hidefocus="true" class="open" title="展开或关闭"></a>
    </div>
    <div class="right_main">
        <div class="crumbs">
            <div class="options">
                <a href="javascript:;" title="刷新页面" id="J_refresh" class="refresh" hidefocus="true">刷新页面</a>
                <a href="javascript:;" title="全屏" id="J_full_screen" class="admin_full" hidefocus="true">全屏</a>
                <a href="javascript:;" title="更新缓存" id="J_flush_cache"
                   class="flush_cache" data-uri="" hidefocus="true">更新缓存</a>
                <a href="javascript:;" title="后台地图" id="J_admin_map"
                   class="admin_map" data-uri="<?php echo Yii::app()->createUrl('site/map')?>" hidefocus="true">后台地图</a>
            </div>
            <div id="J_mtab" class="mtab"><a href="javascript:;" id="J_prev" class="mtab_pre fl" title="上一页">上一页</a><a
                    href="javascript:;" id="J_next" class="mtab_next fr" title="下一页">下一页</a>

                <div class="mtab_p">
                    <div class="mtab_b">
                        <ul id="J_mtab_h" class="mtab_h">
                            <li class="current" data-id="0"><span><a>后台首页</a></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="J_rframe" class="rframe_b">
            <iframe id="rframe_0" name="rframe_0" src="<?php echo Yii::app()->createUrl('site/main') ?>" frameborder="0"
                    scrolling="auto" style="height:100%;width:100%;"></iframe>
        </div>
    </div>
</div>
<script type="text/javascript">
    //语言项目
    var lang = new Object();
    lang.connecting_please_wait = "请稍后...";
    lang.confirm_title = "提示消息";
    lang.move = "移动";
    lang.dialog_title = "消息";
    lang.dialog_ok = "确定";
    lang.dialog_cancel = "取消";
    lang.please_input = "请输入";
    lang.please_select = "请选择";
    lang.not_select = "不选择";
    lang.all = "所有";
</script>

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/js/artDialog-5.0.3/jquery.artDialog.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/js/admin/admin.js"></script>

</body>
</html>