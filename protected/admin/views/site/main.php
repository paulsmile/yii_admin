<?php
/* @var $this SiteController */
?>
<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/css/admin/style.css"/>
<div class="pad_10">
    <div class="clearfix">
        <div class="col-2">
            <h6>欢迎使用Yii-admin</h6>
            <div class="content">
                本程序基于Yii 1.1.13 开发。
                具备基本的后台功能：菜单系统、权限系统(rbac)。集成 uc_client，
            </div>
        </div>

        <div class="col-2 mt10">
            <h6>系统信息</h6>
            <div class="content">
                <table class="table_panel lh26" style="width: 100%;">
                    <tr>
                        <td>服务器操作系统：</td>
                        <td><?php echo php_uname() ?></td>
                        <td>Web 服务器：</td>
                        <td><?php echo $_SERVER['SERVER_SOFTWARE'] ?></td>
                    </tr>
                    <tr>
                        <td>PHP 版本：</td>
                        <td><?php echo PHP_VERSION ?></td>
                        <td>MySQL 版本：</td>
                        <td><?php echo mysql_get_server_info() ?></td>
                    </tr>
                    <tr>
                        <td>文件上传限制：</td>
                        <td><?PHP echo get_cfg_var("upload_max_filesize")?get_cfg_var("upload_max_filesize"):"不允许上传附件"; ?></td>
                        <td>执行时间限制：</td>
                        <td><?PHP echo get_cfg_var("max_execution_time")."秒 "; ?></td>
                    </tr>
                    <tr>
                        <td>安全模式：</td>
                        <td><?php echo ini_get('safe_mode') ? '是':'否' ?></td>
                        <td>Zlib 支持：<?php echo function_exists('gzclose') ? '是':'否' ?></td>
                        <td>是</td>
                    </tr>
                    <tr>
                        <td>CURL 支持：</td>
                        <td><?php echo function_exists("curl_getinfo") ? '是' : '否' ?></td>
                        <td>时区设置：</td>
                        <td><?php echo function_exists("date_default_timezone_get") ? date_default_timezone_get() : '否' ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="col-2 mt10">
            <h6>开发者</h6>
            <div class="content">
                <table class="table_panel lh26" style="width: 100%;">
                    <tr>
                        <td width="10%">版权所有：</td>
                        <td>123oop.com</td>
                    </tr>
                    <tr>
                        <td>开发：</td>
                        <td>sherman</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>