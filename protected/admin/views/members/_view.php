<div class="view well well-small">

	<b><?php echo CHtml::encode($data->getAttributeLabel('uid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->uid),array('view','id'=>$data->uid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('myid')); ?>:</b>
	<?php echo CHtml::encode($data->myid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('myidkey')); ?>:</b>
	<?php echo CHtml::encode($data->myidkey); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('regip')); ?>:</b>
	<?php echo CHtml::encode($data->regip); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('regdate')); ?>:</b>
	<?php echo CHtml::encode($data->regdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastloginip')); ?>:</b>
	<?php echo CHtml::encode($data->lastloginip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastlogintime')); ?>:</b>
	<?php echo CHtml::encode($data->lastlogintime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salt')); ?>:</b>
	<?php echo CHtml::encode($data->salt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secques')); ?>:</b>
	<?php echo CHtml::encode($data->secques); ?>
	<br />

	*/ ?>

</div>