<div class="maincontent">
  <?php
  /* @var $this yii\web\View */
  ?>
  <a href="index.php?r=job/delete&id=<?= $Job->id;  ?>" class="btn btn-danger float-right">Delete Job</a>
  <a onclick="return confirm('Confirm Delete?')" href="index.php?r=job/edit&id=<?= $Job->id;  ?>" class="btn btn-warning float-right" id = "edit">Edit Job</a>
  <div class="row">
    <h2 class="page-header">
      <?= $Job->title; ?>
      <small>In <?= $Job->city;?>,<?= $Job->address; ?></small>
    </h2>

    <?php if(!empty($Job->description)): ?>
    <div class="well">
      <h4>Job Description:</h4>
      <p> <?= $Job->description; ?></p>
    </div>
  <?php endif; ?>

    <?php if (!empty($Job->create_date)):?>
      <ul class="list-group">
        <?php
          $mydate = strtotime($Job->create_date);
          $dtformat = date("F j,Y",$mydate);
        ?>
            <li class="list-group-item">
              <strong>Listing Date:</strong><?= $dtformat; ?>
            </li>

          <?php endif; ?>
          <li class="list-group-item">
              <strong>Category Name: </strong><?=$Job->category->name; ?>
          </li>

          <li class="list-group-item">
              <strong>Job Type: </strong><?= $Job->type ?>
          </li>

          <li class="list-group-item">
              <strong>Requirements: </strong><?= $Job->requirements; ?>
          </li>

          <li class="list-group-item">
              <strong>Salary Range: </strong><?= $Job->salary_range; ?>
          </li>

          <li class="list-group-item">
              <strong>Contact Email: </strong><?= $Job->contact_email; ?>
          </li>

          <li class="list-group-item">
              <strong>Contact Phone: </strong><?= $Job->contact_phone; ?>
          </li>
          <div class="card">
            <a class="btn btn-success" href="mailto: <?= $Job->contact_email; ?>">Contact Employer</a>
          </div>
      </ul>

  </div>

</div>
