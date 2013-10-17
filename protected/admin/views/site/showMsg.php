<?php
/**
 * @var $code 错误代码404，或者标题提示
 * @var $url  跳转到指定的连接
 * @var $message 具体的错误信息
 */
$prePage = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : Yii::app()->baseUrl;
$backUrl = isset($url) && !empty($url) ? $url : $prePage;
$code    = isset($code) && !empty($code) ? $code : '操作成功';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <style type="text/css">
        <!--
        *{ padding:0; margin:0; font-size:12px}
        a:link,a:visited{text-decoration:none;color:#0068a6}
        a:hover,a:active{color:#ff6600;text-decoration: underline}
        .showMsg{border: 1px solid #1e64c8; zoom:1; width:450px; height:172px;position:absolute;top:44%;left:50%;margin:-87px 0 0 -225px}
        .showMsg h5{background-image: url(images/admin/msg.png);background-repeat: no-repeat; color:#fff; padding-left:35px; height:25px; line-height:26px;*line-height:28px; overflow:hidden; font-size:14px; text-align:left}
        .showMsg .content{ padding:46px 12px 10px 45px; font-size:14px; height:64px; text-align:left}
        .showMsg .bottom{ background:#e4ecf7; margin: 0 1px 1px 1px;line-height:26px; *line-height:30px; height:26px; text-align:center}
        .showMsg .ok,.showMsg .guery{background: url(images/admin/msg_bg.png) no-repeat 0px -560px;}
        .showMsg .guery{background-position: left -460px;}
        -->
    </style>
    <title>提示信息</title>
</head>

<body>

<div class="showMsg" style="text-align:center">
    <h5>
        <?php
            echo $code;
            $color = $code=='操作成功' ? 'ok' : 'guery';
        ?>
    </h5>
    <div class="content <?php echo $color ?>" style="display:inline-block;display:-moz-inline-stack;zoom:1;*display:inline;max-width:330px;">
        <?php echo CHtml::encode($message); ?>
    </div>
    <div class="bottom">
        系统将在<span style="color:blue;font-weight:bold">3</span>
        秒后自动跳转，如果不想等待，直接点击<a href="<?php echo $backUrl ?>">这里</a>
        <script language="javascript">
            setTimeout("location.href='<?php echo $backUrl ?>';",30*1000);
        </script>    </div>
</div>
</body>
</html>