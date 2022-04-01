<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use yii\bootstrap4\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<div id="app">

</div>
<div class="cheque">
    <div class="cheque__container">
        <div class="cheque__header">
            <div class="cheque__header__left">
                <div class="header__full-name">
                    Test Test
                </div>
                <div class="header__street">
                    Street main
                </div>
                <div class="header__town">
                    Your town, your province
                </div>
                <div class="header__postal-code">
                    Your town, your province
                </div>
            </div>
            <div class="cheque__header__right">
                <div class="header__id">
                    001
                </div>
                <div class="header__date">
                    <div class="date__top">
                        <span>1</span>
                        <span>1</span>
                        <span>0</span>
                        <span>3</span>
                        <span>2</span>
                        <span>0</span>
                        <span>2</span>
                        <span>2</span>
                    </div>
                    <div class="date__bottom">
                        <span>D</span>
                        <span>D</span>
                        <span>M</span>
                        <span>M</span>
                        <span>Y</span>
                        <span>Y</span>
                        <span>Y</span>
                        <span>Y</span>
                    </div>
                </div>
                <div class="header__date__description">
                    DATE
                </div>
            </div>
        </div>
        <div class="cheque__body">

        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
