<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$js = <<<JS
  $("document").ready(function() {
     $("#news-update-create").on("pjax:end", function() {
            $.pjax.reload({container:"#notes"});  //Reload GridView 
     });
     
     $(".modal-wrapper").click(function(e) {
       if (e.target.classList.contains("modal-wrapper")) {
         $(this).removeClass("modal_show");
       }
     })
  });
JS;
$this->registerJs($js);
?>

<div class="news-form modal-wrapper modal_show">

    <div class="modal">
        <?php yii\widgets\Pjax::begin(['id' => 'news-update-create']) ?>
        <?php $form = ActiveForm::begin(); ?>

      <div class="row justify-content-sm-center">
        <div class="col-sm-10"><?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?></div>

        <div class="col-sm-10"><?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?></div>

        <div class="col-sm-10"><?= $form->field($model, 'url')->textarea(['rows' => 6]) ?></div>

        <div class="col-sm-10"><?= $form->field($model, 'urlToImage')->textarea(['rows' => 6]) ?></div>

        <div class="col-sm-10"><?= $form->field($model, 'publishedAt')->textInput() ?></div>

        <div class="col-sm-10"><?= $form->field($model, 'content')->textarea(['rows' => 6]) ?></div>

        <div class="form-group col-sm-10">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
      </div>


        <?php ActiveForm::end(); ?>
        <?php \yii\widgets\Pjax::end() ?>
    </div>
</div>
