<?php
Yii::import('gii.generators.form.FormCode');
class BFormCode extends FormCode
{
    public function generateActiveRow($column)
    {
        return "\$form->textFieldRow(\$model,'{$column}',array('class'=>'span5'))";
    }
}