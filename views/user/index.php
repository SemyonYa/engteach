<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php foreach ($users as $user) : ?>
        <p>
            <?= $user->login ?>
            <a href="/user/view?id=<?= $user->id ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
            <a href="/user/update?id=<?= $user->id ?>"><span class="glyphicon glyphicon-pencil"></span></a>
            <!-- <span href="/user/delete?id=<?= $user->id ?>"><span class="glyphicon glyphicon-remove"></span></a> -->
        </p>
    <?php endforeach; ?>

</div>