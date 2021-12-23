<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<h1>Jobs <a class="btn btn-primary float-right" href="/yii/job/web/index.php?r=job/create">Create</a></h1>

<?php if(!empty($jobs)): ?>
<div class="row">
  <?php foreach ($jobs as $job): ?>
    <div class="col-sm-6 col-md-3 myjob">
      <h3><?= $job-> title; ?></h3>
      <?php
        $description = strip_tags($job->description);
        // echo $description;
        if (strlen($description)>100) {
          $formatted_desc = substr($description,0,100);
          // $description = substr($formatted_desc,0,strpos($formatted_desc,' '));
          $description = $formatted_desc.'...';
          // echo $description;
        }
       ?>
      <p> <strong> Description: </strong> <?= $description; ?>  </p>
          <p> <strong>City: </strong><?= $job-> city; ?></p>
          <p> <strong>Address: </strong><?= $job-> address; ?></p>
      <?php
        $mydate = strtotime($job->create_date);
        $dtformat = date("F j,Y",$mydate);
       ?>
          <p> <strong>Listed On: </strong><?= $dtformat; ?></p>
          <a class="btn btn-default float-right" href="/yii/job/web/index.php?r=job/details&id=<?= $job->id ?>">Read More...</a>
  </div>
<?php endforeach; ?>
</div>
<?php else: ?>
<p> No Job to list in this category yet.</p>
<?php endif;  ?>

<?= LinkPager::widget(['pagination' => $pagination]); ?>
