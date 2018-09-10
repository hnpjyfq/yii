<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\web\UrlManager;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php if(isset($this->blocks['style1'])):?>
		<?=$this->blocks['style1'];?>
	<?php endif;?>
</head>
<body>
<?php $this->beginBody() ?>


	<div id="placeholder"></div>
    <div class="container-fluid text-center" style="background: black;height: 100%;overflow: hidden;">
        <?=$content;?>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?=$this->blocks['script'];?>
