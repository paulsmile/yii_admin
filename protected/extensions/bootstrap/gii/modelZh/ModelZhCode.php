<?php
Yii::import('gii.generators.model.ModelCode');
class ModelZhCode extends ModelCode
{

    /**
     *重写  $labels 生成模型时候，调用表的注释
     * @param $table
     * @return array
     */
    public function generateLabels($table)
    {
        $labels=array();
        foreach($table->columns as $column)
        {
            if ($column->comment){
                $label = $column->comment;
            }else{
                $label=ucwords(trim(strtolower(str_replace(array('-','_'),' ',preg_replace('/(?<![A-Z])[A-Z]/', ' \0', $column->name)))));
            }

            $label=preg_replace('/\s+/',' ',$label);
            if(strcasecmp(substr($label,-3),' id')===0)
                $label=substr($label,0,-3);
            if($label==='Id') $label='ID';
            $translate[] = $label;
            $label = "Yii::t('".$table->name."', '{$label}')";
            $labels[$column->name]=$label;
        }
        return $labels;
    }



}
