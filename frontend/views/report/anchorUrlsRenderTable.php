<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php $t = 0; ?>
<?php foreach ($result as $key => $value): ?>
  <?php $t++; ?>
<?php endforeach ?>
<div class="panel-body">
  <div class="table-responsive custom-table--section">
    <div class="dataTables_wrapper form-inline" id="DataTables_Table_0_wrapper">
      <div class="row">
        <div class="col-sm-12">
          <div class="pull-left">
            <div class="dataTables_info font-roboto-condensed text-primary" id="DataTables_Table_0_info">
              Anchor URL <span class="current-items_count">1-10</span> из <?= $t; ?>
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
              Top Pages
            </th>
            <th class="sorting text-primary narrow-cell" colspan="1" rowspan="1" tabindex="0">
              Referring Domains
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
            $che = 0;
            $iterator = 1;
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
            <?php if (($i-1) > ($max-1)) break; $exept = ($iterator-1) < $breackpoint;?>
            <?php if (isset($value)): ?>
              <tr style='<?php if ($pagination > 1): ?>display: none; <?php endif; ?>' class="pag_page" page="<?=$pagination?>">
                <td class="sorting_1">
                  <?=$iterator++?>
                </td>
                <td class="content-cell">
                <?php if($exept): ?>
                  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-target="#collapseTableForRow0<?= $i ?>">Domains <i class="fa fa-caret-down"></i></button>
                  <?php if (mb_strlen($key, "UTF-8") > 52): ?>
                    <span title="<?=$key?>"><?=mb_substr($key, 0, 52, "UTF-8")."..."?>
                  <?php else: ?>
                    <span title="<?=$key?>"><?=$key?>
                  <?php endif ?>
                <?php else: ?>
                  Data only available for subscribed users. <a target="_blank" href="<?=Url::to('@landing/price/')?>">Subscribe now!</a>
                <?php endif ?>
                </td>
                <td class="">
                  <?php if($exept): ?>
                    <?= count($value) ?> 
                  <?php endif ?>
                </td>
                <td class="center">
                  <?php if($exept): ?>
                    <?php $f = 0; ?>
                    <?php foreach ($value as $key_pk => $value_pk): ?>
                      <?php foreach ($value_pk as  $fd): ?>
                        <?php $f = $f + count($fd); ?>
                      <?php endforeach ?>
                    <?php endforeach ?>
                    <?= $f ?>
                  <?php endif ?>
                </td>
                <td class="center">
                  <?php if($exept): ?>
                  <a download="<?= $filter['url'] ?>-<?= $key ?>.csv" href="report/exporturls?search=<?= $key ?>&url=<?= $filter['url'] ?>&type=anchorurls">
                    <span class="glyphicon glyphicon-download-alt text-warning"></span>
                  </a>
                  <?php endif ?>
                </td>
                <td hidden>
                  <table>
                    <tr id="collapseTableForRow0<?= $i ?>" class="collapse odd sub-collapse-item">
                      <td></td>
                      <td colspan="4">
                        <table border="0" cellpadding="0" cellspacing="0" class="table table-no-border sub-table" id="Row0<?= $i ?>CollapseSubtable">
                          <thead>
                            <tr>
                              <th class="narrow-cell">Referring Pages</th>
                              <th>Domain</th>
                            </tr>
                          </thead>
                          <?php $e = 0; ?>
                          <?php foreach ($value as $key_pk => $value_pk): ?>
                            <tbody>
                              <!-- row 01 -->
                              <tr>
                                <td class="narrow-cell"><?= count($value_pk) ?></td>
                                <td>
                                  <button class="text-primary btn btn-sm btn-link btn-plus-sign btn-plus-sign show-more-info" data-target=".collapseSubTableForRow0<?= $i  ?>Subrow0<?= $e ?>"><?= $key_pk ?></button>
                                </td>
                              </tr>
                              <tr class="collapse collapseSubTableForRow0<?= $i ?>Subrow0<?= $e ?>">
                                <td></td>
                                <td class="subsub-content">
                                  <table border="0" cellpadding="0" cellspacing="0" class="table table-no-border subsub-table" id="Row0<?= $i ?>CollapseSubtable">
                                    <thead>
                                      <tr>
                                        <th>Backlink Page</th>
                                        <th>URL Links</th>
                                        <th>Anchor Text</th>
                                        <th>Anchor Type</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $p = 1; ?>
                                      <?php foreach ($value_pk as $key_vs => $value_cs): ?>
                                          <tr>
                                            <td><a href="<?= $value_cs->url  ?>" target='_blank'><?= $value_cs->url  ?></a></td>
                                            <td><a href="<?= $value_cs->anchorUrl  ?>" target='_blank'><?= $value_cs->anchorUrl  ?></a></td>
                                            <td><?= $value_cs->anchorText  ?></td>
                                            <td class="anchor-type">
                                              <?=Yii::$app->webmeup->getAnchorType($value_cs)?>
                                            </td>
                                          </tr>
                                          <?php $p++; ?>
                                      <?php endforeach ?>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                              <!-- END row 01 -->

                            </tbody>
                          <?php $e++; ?>
                          <?php endforeach ?>
                        </table>
                        <div class="col-sm-12 padding-right-0">
                          <div class="pull-right">
                            <div>
                              <ul class="pager pager-only-text m-top0 m-bot0">
                                <?php if(count($value) > 10): ?><li><a href="#">Next 10 <i class="fa fa-angle-double-down"></i></a></li><?php endif; ?>
                                <?php if(count($value) > 100): ?><li><a href="#">Next 100 <i class="fa fa-angle-double-down"></i></a></li><?php endif; ?>
                              </ul>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <?php $i++; if ( $pagination_index == 10) { $pagination_index = 1; $pagination++; } else { $pagination_index++ ;} ?>
            <?php endif; ?>
          <?php endforeach ?>



        </tbody>
      </table> <!-- END Main Table -->

      <div class="row">
        <div class="col-sm-12">
          <div class="pull-right">
            <div>
              <?php if ($pagination > 1 && ($iterator-1) > 10): ?>
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
    $("#DataTables_TableMain").tablesorter({sortList: [[2,1], [3,1]]});
  }); 
</script>
<?php endif ?>