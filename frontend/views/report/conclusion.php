<?php 
$col = 1;
$colmd = 4;
if(count($result['good']) == 0)
  $col++;
if(count($result['averages']) == 0)
  $col++;
if(count($result['bad']) == 0)
  $col++;
if($col == 2) {
  $colmd = 6;
}
if($col == 3) {
  $colmd = 12;
}
?>

<div class="panel panel-default">
  <div class="panel-body panel-body-primary">
    <div class="row conclusions-section">
      <?php if (count($result['good']) > 0): ?>
      <div class="col-md-<?=$colmd?>">
        <div class="row">
          <div class="col-md-12">
            <div class="panel conclusion-good">
              <div class="panel-body">
                <i class="fa fa-thumbs-o-up"></i>
                <h4 class="conclusion-header"><i class="ion ion-help-circled" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."></i> Advantages:</h4>
                <ul>
                <?php foreach ($result['good'] as $key => $value): ?>
                  <li><?= $value ?></li>
                <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endif ?>
      <?php if (count($result['averages']) > 0): ?>
      <div class="col-md-<?=$colmd?>">
        <div class="row">
          <div class="col-md-12">
            <div class="panel conclusion-medium m-top10-sm">
              <div class="panel-body">
                <i class="fa  fa-hand-paper-o"></i>
                <h4 class="conclusion-header"><i class="ion ion-help-circled" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."></i> Averages:</h4>
                <ul>
                  <?php foreach ($result['averages'] as $key => $value): ?>
                    <li><?= $value ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endif ?>
      <?php if (count($result['bad']) > 0): ?>
      <div class="col-md-<?=$colmd?>">
        <div class="row">
          <div class="col-md-12">
            <div class="panel conclusion-bad m-top10-sm">
              <div class="panel-body">
                <i class="fa fa-thumbs-o-down"></i>
                <h4 class="conclusion-header"><i class="ion ion-help-circled" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."></i> Disadvantages:</h4>
                <ul>
                <?php foreach ($result['bad'] as $key => $value): ?>
                  <li><?= $value ?></li>
                <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endif ?>
    </div>
  </div>
</div>