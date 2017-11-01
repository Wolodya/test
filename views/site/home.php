<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Добрый день, <?=Yii::$app->user->identity->username?></h1>

        <p class="lead"> <?=\yii\helpers\Html::a("Выйти",['site/logout'],['data'=>['method'=>'post']])?></p>


    </div>

    <div class="body-content">


    </div>
</div>
