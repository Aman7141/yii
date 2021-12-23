<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<div class="maincontent">
  <h1 class = "page-header">category <a class="btn btn-primary float-right"
    href="/yii/job/web/index.php?r=category/create">Create</a></h1>

    <?php
      $msg = yii::$app->getSession()->getFlash('msg');
      if (null != $msg): ?>
      <div class="alert alert-success">
        <?= $msg; ?>
      </div>
    <?php endif; ?>

  <ul class = "list-group">
  <?php foreach($categories as $category) :  ?>
      <li class = "list-group-item">
          <a href="/yii/job/web/index.php?r=job/index&category=<?= $category->id ?>"><?= $category->name; ?></a>
      </li>
  <?php endforeach; ?>
  </ul>

  <?= LinkPager::widget(['pagination' => $pagination]); ?>

</div>
