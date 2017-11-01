<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <label id="time" for="username"></label>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button', 'id' => "log"]) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>


    <script>
        if (<?php
            function att()
            {
                if (\Yii::$app->session->get('attempts-login') >1) {
                    Yii::$app->session->set('attempts-login', 0);
                    return 1;
                } else {
                    Yii::$app->session->set('attempts-login', Yii::$app->session->get('attempts-login', 0) + 1);
                    return 0;
                }
            }
            echo att();  ?>=== 1 )
        {
            console.log("start");
            $("#log").prop("disabled", true);
            var count = 6;
            var counter = setInterval(timer, 1000);

            function timer() {
                count = count - 1;
                if (count <= 0) {
                    clearInterval(counter);
                    $("#log").prop("disabled", false);
                    $("#time").text("");
                } else {
                    var minutes = Math.floor(count / 60);
                    var seconds = count - minutes * 60;
                    $("#time").text("Try again in " + minutes + ":" + seconds);
                }

            }
        }

    </script>
    <div class="col-lg-offset-1" style="color:#999;">
        login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
    </div>
</div>
