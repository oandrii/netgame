<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Input';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'link')->textInput(['placeholder' => 'start with https:// or http://']) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>