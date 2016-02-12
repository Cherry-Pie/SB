<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?php $t = 0; ?>
<?php foreach ($result as $key => $value): ?>
  <?php if ($value): ?>
    <?php $t++; ?>
  <?php endif ?>
<?php endforeach ?>
<div class="panel-body">
  <div class="table-responsive custom-table--section">
    <div class="dataTables_wrapper form-inline" id="DataTables_Table_0_wrapper">
      <div class="row">
        <div class="col-sm-12">
          <div class="pull-left">
            <div class="dataTables_info font-roboto-condensed text-primary" id="DataTables_Table_0_info">
              Backlink Domains <span class="current-items_count">1-10</span> из <?= $t; ?>
            </div>
          </div>
          <div class="pull-right margin-right-15">
            <div class="dataTables_info">
              
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <table border="0" cellpadding="0" cellspacing="0" class="datatable table table-striped table-bordered table-custom dataTable" id="DataTables_TableMain"> <!-- START Main Table -->
        <thead>
          <tr>
            <th class="sorting_desc text-primary" colspan="1" rowspan="1" tabindex="0">
              #
            </th>
            <th class="sorting text-primary" colspan="1" rowspan="1" tabindex="0">
              Domains
            </th>
            <th class="sorting text-primary narrow-cell" colspan="1" rowspan="1" tabindex="0">
              Referring Pages
            </th>
            <th colspan="1" rowspan="1" tabindex="0">
              <a download="<?= $filter['url'] ?>-<?= $key ?>.csv" href="report/exporturls?url=<?= $filter['url'] ?>&type=all">
                <span class="glyphicon glyphicon-download-alt text-warning"></span>
              </a>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i = 1;
            $pagination = 1;
            $pagination_index = 1;
            if (Yii::$app->people->isTrial()) {
              $breackpoint = 2000;
            }
            else {
              $breackpoint = 5;
            }
            if(Yii::$app->people->mbPay() == "BASIC") {
              $max = 2000;
              $breackpoint = 2000;
            }
            elseif(Yii::$app->people->mbPay() == "FULL") {
              $max = 5000;
              $breackpoint = 5000;
            }
            else {
              $max = 10;
            }
           ?>
          <?php foreach ($result as $key => $value): ?>
            <?php if (($i-1) > ($max-1)) break; $exept = ($i-1) < $breackpoint; ?>
            <?php if ($value): ?>
              <tr style='<?php if ($pagination > 1): ?>display: none; <?php endif; ?>' class="pag_page" page="<?=$pagination?>">
                <td class="sorting_1">
                  <?=$i?>
                </td>
                <td class="content-cell">
                  <?php if($exept): ?>
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-target="#collapseTableForRow0<?= $i ?>">Domains <i class="fa fa-caret-down"></i></button>
                    <?= $key ?>
                  <?php else: ?>
                    Data only available for subscribed users. <a target="_blank" href="<?=Url::to('@landing/price/')?>">Subscribe now!</a>
                  <?php endif ?>
                </td>
                <td class="">
                <?php if ($exept): ?>
                  <?= count($value) ?>
                <?php endif ?>
                </td>
                <td class="center">
                <?php if ($exept): ?>
                  <a download="<?= $filter['url'] ?>-<?= $key ?>.csv" href="report/exporturls?search=<?= $key ?>&url=<?= $filter['url'] ?>&type=backlinksdomain">
                    <span class="glyphicon glyphicon-download-alt text-warning"></span>
                  </a>
                <?php endif ?>
                </td>
                <?php if ($exept): ?>
                <td hidden>
                  <table>
                    <tr id="collapseTableForRow0<?= $i ?>" class="collapse odd sub-collapse-item">
                      <td></td>
                      <td colspan="3">
                        <table border="0" cellpadding="0" cellspacing="0" class="table table-no-border sub-table" id="Row0<?= $i ?>CollapseSubtable">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Country</th>
                              <th>Backlink Page</th>
                              <th>URL Links</th>
                              <th>Anchor Text</th>
                              <th>Anchor Type</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $p = 1; ?>
                            <?php foreach ($value as $key_v => $value_v): ?>
                                <tr>
                                  <td><?= $p ?></td>
                                  <td><?= $value_v->country ?></td>
                                  <td><a href="<?= $value_v->url  ?>"><?= $value_v->url  ?></a></td>
                                  <td><a href="<?= $value_v->anchorUrl  ?>"><?= $value_v->anchorUrl  ?></a></td>
                                  <td><?= $value_v->anchorText  ?></td>
                                  <td class="anchor-type">
                                    <?=Yii::$app->webmeup->getAnchorType($value_v)?>
                                  </td>
                                </tr>
                                <?php $p++; ?>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                        <div class="col-sm-12 padding-right-0">
                          <div class="pull-right">
                            <div>
                              <ul class="pager pager-only-text m-top0 m-bot0">
                                <?php if(count($value) > 10): ?><li><a href="#">Следущие 10 <i class="fa fa-angle-double-down"></i></a></li><?php endif; ?>
                                <?php if(count($value) > 100): ?><li><a href="#">Следущие 100 <i class="fa fa-angle-double-down"></i></a></li><?php endif; ?>
                              </ul>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </td>
                    </tr>
                  </table>
                </td>
                <?php endif ?>
              </tr>
              <?php $i++; if ( $pagination_index == 10) { $pagination_index = 1; $pagination++; } else { $pagination_index++ ;} ?>
            <?php endif ?>

          <?php endforeach ?>


          <!-- END Main Table Row 01 Collapse Sub-->



        </tbody>
      </table> <!-- END Main Table -->

      <div class="row">
        <div class="col-sm-12">
          <div class="pull-right">
            <div>
            <?php if ($pagination > 1 && ($i-1) > 10): ?>
              <ul class="pagination pagination-sm m-top0 m-bot5">
                <!-- <li class="disabled"><a href="#">«</a></li> -->
                <?php for($i = 1; $i < $pagination+1 ; $i++ ): ?>
                  <li class=" <?php if ($i == 1) echo "active"; ?> pag_li"><a href="#" class='pag_index'><?= $i ?></a></li>
                <?php endfor; ?>
              </ul>
            <?php endif ?>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php if(!Yii::$app->user->isGuest && Yii::$app->people->isTrial()): ?>
  <script>
    $(document).ready(function() { 
      $("#DataTables_TableMain").tablesorter({sortList: [[2,1]]});
    }); 
  </script>
<?php endif ?>