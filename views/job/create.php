<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\Job;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Job */
/* @var $form ActiveForm */
?>
<div class="job-create">
  <h2 class="page-header">Add New Job</h2>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($job, 'category_id')->dropDownList(
                                            Category::find()
                                            ->select(['name','id'])
                                            ->indexBy('id')
                                            ->column(),['prompt' => 'select Category']
                                            ); ?>
        <?= $form->field($job, 'title') ?>
        <?= $form->field($job, 'description')->textArea(['rows'=>'5']) ?>
        <?= $form->field($job, 'type')->dropDownList([
                                      'full_time'=>'Full Time',
                                      'part_time'=>'Part Time',
                                      'as-needed'=>'As Needed']
                                      ,['prompt'=>'Select Job Type']
                                    ); ?>
        <?= $form->field($job, 'requirements') ?>
        <?= $form->field($job, 'salary_range')->dropDownList([
                                      'under $1000'=>'Under $1000',
                                      '$1000-$2000'=>'$1000-$2000',
                                      'Above $2000'=>'Above $2000']
                                      ,['prompt'=>'Select Salary Range']
                                    ); ?>
        <?= $form->field($job, 'city') ?>
        <?= $form->field($job, 'address') ?>
        <?= $form->field($job, 'contact_email') ?>
        <?= $form->field($job, 'contact_phone') ?>
        <?= $form->field($job, 'is_published')->radioList(['1'=>'yes','0'=>'No']) ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- job-create -->
