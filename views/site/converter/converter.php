<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Converter';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12 text-center">
        <div class="site-login">
            <h1><?= Html::encode($this->title) ?></h1>
            <div class="converterContent">
                <?php
                $form = ActiveForm::begin([
                            'id' => 'coverter-form',
                ]);
                ?>
                <div class="from-calculatro">
                    <?= $form->field($model, 'quantity')->textInput()->label('RUB') ?>
                </div>
                <div id="result" class=" result"></div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <?= Html::submitButton('Convert', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>


            </div>
        </div>
    </div>
</div>
<?php $this->registerJs("
$(document).on('beforeSubmit', '#coverter-form', function () {
     var form = $(this);
  
     if (form.find('.has-error').length) {
          return false;
     }
     // submit form
     $('.help-block').text( 'Converting...' );
     $.ajax({
          url: form.attr('action'),
          type: 'post',
          data: form.serialize(),
          success: function (response) {
          console.log(response);
              $('.help-block').text( response );
          }
     });
     return false;
}) ")
?>
