<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <div class="row">
        <div class="span9">
            <div id="content">
                <?php echo $content; ?>
            </div><!-- content -->
        </div>
        <div class="span3">
            <div id="sidebar" class="well well-small">
                <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title'=>'操作',
                ));
                $this->widget('bootstrap.widgets.TbMenu', array(
                    'items'=>$this->menu,
                    'htmlOptions'=>array('class'=>'nav-list'),
                ));
                $this->endWidget();
                ?>
            </div><!-- sidebar -->
        </div>
    </div>
<?php $this->endContent(); ?>