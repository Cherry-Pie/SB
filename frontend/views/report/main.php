<?php
use yii\helpers\Html;
use common\models\Pages;
use yii\helpers\Url;

if ($result === false) {
  if(Yii::$app->options->get(2)->value != 'error') {
    $page = Pages::findOne(Yii::$app->options->get(2)->value);
  }
  else {
    throw new \yii\web\HttpException(203, 'Non-Authoritative Information.', 203);
  }
}
?>
<div class="col-md-12 banner-section" id="alertSection"> <!-- START "please register banner" -->
  <div class="row">
    <div class="col-md-12 box">
      
    </div>
  </div>
</div> <!-- col end --> <!-- end .banner-section -->
<?php if ($result !== false): ?>
<?php if (!isset(Yii::$app->user->identity->username)): ?>
<div class="col-md-12 banner-section"> <!-- START "please register banner" -->
  <div class="row">
    <div class="col-md-12">
      <?php foreach (Yii::$app->notifications->getAll() as $notify): ?>
        <div class="alert alert-<?=$notify->type?>">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <!-- <h4>Oh snap!</h4> -->
          <?=$notify->text?>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div> <!-- col end --> <!-- end .banner-section -->
<?php endif; ?>
<div class="col-md-12 tab-section section-scroll"> <!-- START "total active backlinks" -->
  <div class="row">
    <div class="col-md-4"> <!-- START "total active backlinks" panel -->
      <div class="panel panel-success panel-minh290">
        <div class="helper-tooltip" data-toggle="tooltip" data-placement="left" title="<?=Yii::$app->t->text('tab-help',true)?>">
          <i class="ion ion-help-circled"></i>
        </div>
        <div class="panel-heading text-center">
          <h4 class="text-shadow-white">Total Active Backlinks</h4>
        </div> <!-- panel heading end -->

        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-no-border">
              <tbody>
                <tr>
                  <td>Unique Backlinks</td>
                  <td class="text-right"><span class="badge badge-primary"> <?= Html::encode($result['metrics']['unique_backlinks']['value']) ?></span></td>
                </tr>
                <tr>
                  <td>Links to Homepage</td>
                  <td class="text-right"><span class="badge badge-success"><?= Html::encode($result['metrics']['to_home_page_balcklinks']['value']) ?> (<?= Html::encode($result['metrics']['to_home_page_balcklinks']['procent']) ?>%)</span></td>
                </tr>
                <tr>
                  <td>Links to other Page</td>
                  <td class="text-right"><span class="badge"><?= Html::encode($result['metrics']['to_other_page_balcklinks']['value']) ?> (<?= Html::encode($result['metrics']['to_other_page_balcklinks']['procent']) ?>%)</span></td>
                </tr>
                <tr>
                  <td>Nofollow links</td>
                  <td class="text-right"><span class="badge badge-danger"><?= Html::encode($result['metrics']['nofollow_backlinks']['value']) ?> (<?= Html::encode($result['metrics']['nofollow_backlinks']['procent']) ?>%)</span></td>
                </tr>
                <tr>
                  <td>IMG links</td>
                  <td class="text-right"><span class="badge"><?= Html::encode($result['metrics']['image_backlinks']['value']) ?> (<?= Html::encode($result['metrics']['image_backlinks']['procent']) ?>%)</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div> <!-- panel body end -->
      </div> <!-- panel end -->
    </div> <!-- END "total active backlinks" panel -->
    <div class="data-hidden lost_and_new" style='display: none;'>
      <?php foreach ($result['stock_market_index'] as $key => $value): ?>
        <ul class="<?= Html::encode($key) ?>">

          <?php foreach ($value as $date => $count): ?>
            <li class="<?= Html::encode($key) ?>"><?php echo count($count); ?></li>
            <li class="<?= Html::encode($key) ?>_date"><?php echo date("d-m", strtotime($date)); ?></li>
          <?php endforeach ?>
        </ul>
      <?php endforeach ?>
    </div>
    <div class="col-md-8"> <!-- END "total active backlinks" graphic -->
      <div class="panel panel-default">
        <div class="helper-tooltip" data-toggle="tooltip" data-placement="left" title="<?=Yii::$app->t->text('ch1-help',true)?>">
          <i class="ion ion-help-circled"></i>
        </div>
        <div class="panel-body ovx-hidden">
          <!-- <img src="images/graphic.png" height="285px" alt=""> -->
          <canvas id="barChart01" height="240px" width="570px"></canvas>
          <div class="row">
            <div class="col-sm-12" id="lineChart01Legend">

            </div>
          </div>
        </div>
      </div>
    </div> <!-- END "total active backlinks" graphic -->
  </div>
</div> <!-- col end --> <!-- end 1st-row -->

<div class="col-md-12 section-scroll">
  <?= $conclusion ?>
</div> <!-- col end --> <!-- end 9th-row -->

<div class="col-md-12 section-scroll">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading panel-minh290">
          <div class="helper-tooltip" data-toggle="tooltip" data-placement="left" title="<?=Yii::$app->t->text('tkw-help',true)?>">
            <i class="ion ion-help-circled"></i>
          </div>
          <div class="row">
            <div class="col-md-8 b-right-thick">
              <div class="helper-tooltip tooltip-middle" data-toggle="tooltip" data-placement="left" title="<?=Yii::$app->t->text('nuah-help',true)?>">
                <i class="ion ion-help-circled"></i>
              </div>
              <h4 class="text-center text-shadow-white">Natural/Unnatural Anchors</h4>
              <div class="row">
                <div class="col-xs-5">
                  <canvas id="donutGraph03" width="250" height="250"></canvas>
                </div>
                <div style='display:none;'>
                  <div class="not_natural">
                    <?= Html::encode($result['natural_and_not_naturl_anchors']['not_natural'])  ?>
                  </div>
                  <div class="natural_count">
                    <?= Html::encode($result['natural_and_not_naturl_anchors']['natural_count'])  ?>
                  </div>
                </div>
                <div class="col-xs-7">
                  <ul class="vcenter graph-history">
                    <li>Unnatural anchors <span class="text-danger"><?= Html::encode($result['natural_and_not_naturl_anchors']['not_natural'])  ?> (<?= Html::encode($result['natural_and_not_naturl_anchors']['procent']['not_natural'])  ?>%)</span></li>
                    <li>Natural anchors <span class="text-warning"><?= Html::encode($result['natural_and_not_naturl_anchors']['natural_count'])  ?> (<?= Html::encode($result['natural_and_not_naturl_anchors']['procent']['natural'])  ?>%)</span></li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <h4 class="text-center text-shadow-white m-bot25">Top Keyword</h4>

              <div class="table-responsive">
                <table class="table table-no-border">
                  <tbody>
                  <?php foreach ($result['natural_and_not_naturl_anchors']['top_five'] as $key => $value): ?>
                    <tr>
                      <td></td>
                      <td></td>
                      <td><?= mb_strimwidth($value->anchorText, 0,45, '...'); ?></td>
                      <td><?= $value->procent; ?>% / <?= $value->refdomains; ?> links</td>
                    </tr>
                  <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="panel-footer panel-minh100">
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-xs-2 text-right">
                  <div class="stick-item stick-blue-check"></div>
                </div>
                <div class="col-xs-10">
                  <span class="text-uppercase text-bold text-primary">CONCLUSION:</span><?= Html::encode($result['natural_and_not_naturl_anchors']['findings']) ?>
                </div>
              </div>
            </div>

            <div class="col-md-6 m-top25-sm">
              <div class="row">
                <div class="col-xs-2 text-right">
                  <div class="stick-item stick-orange-lamp"></div>
                </div>
                <div class="col-xs-10">
                  <span class="text-uppercase text-bold text-warning">SOLUTION:</span> <?= Html::encode($result['natural_and_not_naturl_anchors']['solution']) ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- col end --> <!-- end 4th-row -->

<div class="col-md-12 section-scroll">
  <div class="panel panel-default">
    <div class="panel-body panel-body-primary panel-h320 text-center ovx-hidden ovy-hidden" >
      <div class="helper-tooltip" data-toggle="tooltip" data-placement="left" title="<?=Yii::$app->t->text('ch2-help',true)?>">
        <i class="ion ion-help-circled"></i>
      </div>
      <div class="panel-desc text-left"><i class="ion ion-arrow-graph-up-right"></i>Backlink History</div>
      <canvas id="lineChart01" height="240px" width="900px"></canvas>
      </div>
    </div>
  </div>
</div> <!-- col end --> <!-- end 2nd-row -->

<div class="col-md-12 section-scroll">
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-success">
        <div class="panel-body panel-body-success panel-minh290">
          <div class="helper-tooltip" data-toggle="tooltip" data-placement="left" title="<?=Yii::$app->t->text('talp-help',true)?>">
            <i class="ion ion-help-circled"></i>
          </div>
          <h4 class="text-center text-shadow-white">Text and links pictures</h4>
          <div class="row">
            <div class="col-xs-6">
              <canvas id="donutGraph01" width="250" height="250"></canvas>
            </div>
            <div style='display:none;'>
              <div class="Links_image">
                <?= Html::encode($result['text_and_links_pictures']['image']['procent'])  ?>
              </div>
              <div class="Text_anchors">
                <?= Html::encode($result['text_and_links_pictures']['text']['procent'])  ?>
              </div>
              <div class="Links_dofollow">
                <?= Html::encode($result['nofollow_and_dofollow_links']['dofollow']['procent'])  ?>
              </div>
              <div class="Links_nofollow">
                <?= Html::encode($result['nofollow_and_dofollow_links']['nofollow']['procent'])  ?>
              </div>
            </div>
            <div class="col-xs-6">
              <ul class="vcenter graph-history">
                <li>Links image <span class="text-primary"><?= Html::encode($result['text_and_links_pictures']['image']['val'])  ?> (<?= Html::encode($result['text_and_links_pictures']['image']['procent'])  ?>%)</span></li>
                <li>Text anchors <span class="text-success"><?= Html::encode($result['text_and_links_pictures']['text']['val'])  ?> (<?= Html::encode($result['text_and_links_pictures']['text']['procent'])  ?>%)</span></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="panel-footer panel-minh100">
          <div class="row">
            <div class="col-xs-2 text-right">
              <div class="stick-item stick-orange-check"></div>
              <div class="clearfix"></div>
            </div>
            <div class="col-xs-10">
              <span class="text-uppercase text-bold text-warning">CONCLUSION:</span>
                <?php if ($result['text_and_links_pictures']['image']['procent'] <= 8 ): ?>
                  На ваш сайт ссылается не достаточное количество ссылок картинок, ваш ссылочный профиль выглядит не естественно.
                <?php elseif ($result['text_and_links_pictures']['image']['procent'] > 8 ): ?>
                  Ссылочная масса вашего сайта содержит достаточно ссылок-картинок. Это придает ей естественный вид.
                <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body panel-body-success panel-minh290">
          <div class="helper-tooltip" data-toggle="tooltip" data-placement="left" title="<?=Yii::$app->t->text('nadl-help',true)?>">
            <i class="ion ion-help-circled"></i>
          </div>
          <h4 class="text-center text-shadow-white">Nofollow and dofollow links</h4>
          <div class="row">
            <div class="col-xs-6">
              <canvas id="donutGraph02" width="250" height="250"></canvas>
            </div>
            <div class="col-xs-6">
              <ul class="vcenter graph-history">
                <li>Links dofollow <span class="text-primary"><?= Html::encode($result['nofollow_and_dofollow_links']['dofollow']['val'])  ?> (<?= Html::encode($result['nofollow_and_dofollow_links']['dofollow']['procent'])  ?>%)</span></li>
                <li>Links nofollow <span class="text-success"><?= Html::encode($result['nofollow_and_dofollow_links']['nofollow']['val'])  ?> (<?= Html::encode($result['nofollow_and_dofollow_links']['nofollow']['procent'])  ?>%)</span></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="panel-footer panel-minh100">
          <div class="row">
            <div class="col-xs-2 text-right">
              <div class="stick-item stick-green-lamp"></div>
              <div class="clearfix"></div>
            </div>
            <div class="col-xs-10">
              <span class="text-uppercase text-bold text-success">SOLUTION:</span>
              <?php if ($result['nofollow_and_dofollow_links']['dofollow']['procent'] <= 15 ): ?>
                Необходимо увеличить количество ссылающих доменов с nofollow атрибутом.
              <?php elseif ($result['nofollow_and_dofollow_links']['dofollow']['procent'] > 15 ): ?>
                Продолжайте наращивать ноуфолов ссылки на ваш сайт, это обезопасит вас от попадание под фильтр.
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- col end --> <!-- end 3rd-row -->

<div class="col-md-12 section-scroll">
  <div class="panel">
    <div class="panel-body-default">
      <div class="helper-tooltip" data-toggle="tooltip" data-placement="left" title="<?=Yii::$app->t->text('mmaoc-help',true)?>">
        <i class="ion ion-help-circled"></i>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="panel">
            <div class="panel-body panel-body-primary panel-h320" style='padding-left: 0px!important;padding-right: 0px!important;'>
              <div id="world-map" class="vmaps" style="position: relative; overflow: hidden; ">
                <div id="container_map" style='height: 265px;'></div>
              </div>
            </div>
          </div>
        </div>
            <script type='text/json' class="json_map_data" style='display:none;'>
              <?php echo json_encode($result['byMapData']['map_data']); ?>
            </script>
        <div class="col-md-4">
          <div class="panel panel-no-shadow">
            <div class="panel-body-default panel-h320">
              <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Country</th>
                          <th>Domains</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($result['byMapData']['popular_countries'] as $key => $value): ?>
                        <tr>
                          <td><?= $value['code'] ?> <span><?= $value['procent'] ?>%</span></td>
                          <td><?= $value['value'] ?> domains</td>
                        </tr>
                      <?php endforeach ?>
                        <tr>
                          <td colspan="2">
                            <div class="m-top5">
                              <span class="text-danger"><?= $result['byMapData']['my_other_regions']['my_region']['value'] ?> (<?= $result['byMapData']['my_other_regions']['my_region']['procent'] ?>%)</span> ссылки с вашего региона
                            </div>
                            <div>
                              <span class="text-success"><?= $result['byMapData']['my_other_regions']['other_region']['value'] ?> (<?= $result['byMapData']['my_other_regions']['other_region']['procent'] ?>%)</span> с других регионов
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="panel panel-no-shadow">
            <div class="panel-body-default text-center panel-h160">
              <div class="helper-tooltip" data-toggle="tooltip" data-placement="left" title="<?=Yii::$app->t->text('mn-help',true)?>">
                <i class="ion ion-help-circled"></i>
              </div>
              <canvas id="barChart02" width="500" height="140"></canvas>
            </div>
          </div>
        </div>

        <div class="zones_charts_data" style='display:none;'>
        <?php foreach ($result['byMapData']['zones'] as $key => $value): ?>
          <ul>
            <li><span class='label'><?= $key ?></span><span class='value'><?= $value ?></span></li>
          </ul>
        <?php endforeach ?>

        </div>

        <div class="col-md-4">
          <div class="panel panel-no-shadow">
            <div class="panel-body-default panel-h160">
              <div class="helper-tooltip tooltip-middle" data-toggle="tooltip" data-placement="left" title="<?=Yii::$app->t->text('mnp-help',true)?>">
                <i class="ion ion-help-circled"></i>
              </div>
              <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                  <div class="table-responsive">
                    <table class="table table-no-border table-striped table-domains">
                      <tbody>

                      <?php foreach ($result['byMapData']['zones_procent'] as $key => $value): ?>
                        <tr>
                          <td><?= $key ?></td>
                          <td><?= $value ?>%</td>
                        </tr>
                      <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="panel-footer panel-minh100">
      <div class="row">
        <div class="col-md-6 b-right">
          <div class="row">
            <div class="col-xs-2 text-right">
              <div class="stick-item stick-green-check"></div>
            </div>
            <div class="col-xs-10">
              <span class="text-uppercase text-bold text-success">Вывод:</span>
              <?php
                if ($result['byMapData']['my_other_regions']['my_region']['procent'] < 55) {
                  echo "На ваш сайт ссылается не достаточное количество ссылок с вашего региона, это может повлиять на видимость сайта в вашем регионе";
                }else
                  echo "С вашего региона ссылаются достаточное количество ссылок";
               ?>
            </div>
          </div>
        </div>

        <div class="col-md-6 m-top25-sm">
          <div class="row">
            <div class="col-xs-2 text-right">
              <div class="stick-item stick-magenta-lamp"></div>
            </div>
            <div class="col-xs-10">
              <span class="text-uppercase text-bold text-magenta">Решение:</span>
               <?php
                if ($result['byMapData']['my_other_regions']['my_region']['procent'] < 55) {
                  echo "Для увеличения видимости сайта и релевантности, необходимо увеличить вхождения ссылок с вашего региона";
                }else
                  echo "В дальнейшем необходимо контролировать прирост обратных ссылок с вашего региона, это придаст значительную релевантность в глазах поисковых роботов";
               ?>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div> <!-- col end --> <!-- end 5th-row -->

<div class="col-md-12 section-scroll">
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body panel-body-success panel-minh290">
          <div class="helper-tooltip" data-toggle="tooltip" data-placement="left" title="<?=Yii::$app->t->text('aurls-help',true)?>">
            <i class="ion ion-help-circled"></i>
          </div>
          <h4 class="text-center text-shadow-white">Anchor URLs</h4>
          <h5 class="text-center">Reffering Domains</h5>
          <div class="row">
            <div class="col-xs-6">
              <canvas id="donutGraph05" width="250" height="250"></canvas>
            </div>
            <div class="col-xs-6">
              <div class="graph-text">
                <!-- More than  <span class="text-danger">35% (857 links) </span>of all links refer to the homepage; 65% (1,584) of all links refer to other pages. -->
                <?= $result['referingAndTotal']['text']['reffering_domain']  ?>
              </div>
            </div>
          </div>
          <div class="row m-top15 pos-r">
            <div class="helper-tooltip tooltip-middle" data-toggle="tooltip" data-placement="left" title="<?=Yii::$app->t->text('aurlssl-help',true)?>">
              <i class="ion ion-help-circled"></i>
            </div>
            <?php $i = 0; ?>
            <?php 
              $colors = array(
                "progress-bar-primary",
                "progress-bar-warning",
                "progress-bar-success",
                "progress-bar-danger",
                "progress-bar-info",
              );
            ?>
            <?php foreach ($result['referingAndTotal']['pages']['reffering_domain'] as $key => $value): ?>
              <?php
                if($i == 5)
                  break;
                $i++;
              ?>
            <!-- START 1st linear graph -->
            <div class="col-md-12 progress-custom">
              <span class="progress-title"><?= mb_strimwidth($value[0]->anchorUrl, 0,48, '...'); ?></span>
              <div class="progress">
                <div class="progress-bar <?=$colors[$i]?>" role="progressbar" aria-valuenow="<?= $value['procent']  ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $value['procent']  ?>%">
                  <span class="sr-only"><?= $value['procent']  ?>% Complete (success)</span>
                </div>
              </div>
              <span class="progress-value"><?= $value['count']  ?> (<?= $value['procent']  ?>%)</span>
            </div>
            <!-- END 1st linear graph -->
          <?php endforeach; ?>
          </div>
        </div>
        <div class="panel-footer panel-minh100">
          <div class="row">
            <div class="col-xs-2 text-right">
              <div class="stick-item stick-magenta-check"></div>
            </div>
            <div class="col-xs-10">
              <span class="text-uppercase text-bold text-magenta">Conclusion:</span> <?= Html::encode($result['referingAndTotal']['findings']['reffering_domain'])  ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body panel-body-success panel-minh290">
          <div class="helper-tooltip" data-toggle="tooltip" data-placement="left" title="<?=Yii::$app->t->text('aurlstl-help',true)?>">
            <i class="ion ion-help-circled"></i>
          </div>
          <h4 class="text-center text-shadow-white">Anchor URLs</h4>
          <h5 class="text-center">Total Links</h5>
          <div class="row">
            <div class="col-xs-6">
              <canvas id="donutGraph06" width="250" height="250"></canvas>
            </div>
            <div class="col-xs-6">
              <div class="graph-text">
                <?= $result['referingAndTotal']['text']['total_links']  ?>
              </div>
            </div>
          </div>
          <div class="row m-top15 pos-r">
            <div class="helper-tooltip tooltip-middle" data-toggle="tooltip" data-placement="left" title="<?=Yii::$app->t->text('aurlstlsl-help',true)?>">
              <i class="ion ion-help-circled"></i>
            </div>
            <?php $i = 0; ?>
              <?php foreach ($result['referingAndTotal']['pages']['total_links'] as $key => $value): ?>
                <?php
                  if($i == 5)
                    break;
                ?>
                <!-- START 1st linear graph -->
                <div class="col-md-12 progress-custom">
                  <span class="progress-title"><?= mb_strimwidth($value[0]->anchorUrl, 0,48, '...'); ?></span>
                  <div class="progress">
                    <div class="progress-bar <?=$colors[$i]?>" role="progressbar" aria-valuenow="<?= $value['count']  ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $value['procent']  ?>%">
                      <span class="sr-only"><?= $value['procent']  ?>% Complete (success)</span>
                    </div>
                  </div>
                  <span class="progress-value"><?= $value['count']  ?> (<?= $value['procent']  ?>%)</span>
                </div>
                <!-- END 1st linear graph -->
                <?php $i++ ?>
              <?php endforeach; ?>
          </div>
        </div>
        <div class="panel-footer panel-minh100">
          <div class="row">
            <div class="col-xs-2 text-right">
              <div class="stick-item stick-green-lamp"></div>
            </div>
            <div class="col-xs-10">
              <span class="text-uppercase text-bold text-success">Solution:</span> <?= Html::encode($result['referingAndTotal']['solution']['total_links'])  ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- col end --> <!-- end 7th-row -->

<div class="col-md-12 section-scroll">
  <?= $conclusion ?>
</div> <!-- col end --> <!-- end 9th-row -->

<div class="stats" hidden>
  <div class="btn btn-lg btn-primary show-ext-not" data-toggle="modal" data-target="#mod-notice-exsits"></div>
  <div class="btn btn-lg btn-primary show-send-not" data-toggle="modal" data-target="#mod-notice-send"></div>
  <div class="total_links">
    <div class="home"> <?= Html::encode($result['referingAndTotal']['stats']['total_links']['procent']['home'])  ?></div>
    <div class="other"><?= Html::encode($result['referingAndTotal']['stats']['total_links']['procent']['other'])  ?></div>
  </div>
  <div class="refering_domain">
    <div class="home"><?= Html::encode($result['referingAndTotal']['stats']['reffering_domain']['procent']['home'])  ?></div>
    <div class="other"><?= Html::encode($result['referingAndTotal']['stats']['reffering_domain']['procent']['other'])  ?></div>
  </div>
</div>
<div class="col-md-12">
  <?php if (!isset(Yii::$app->user->identity->username)): ?>
  <div class="row">
    <div class="col-md-6 col-md-offset-3 text-center">
      <div class="panel panel-transparent">
        <div class="text-danger m-bot10"><?=Yii::$app->t->text('guest-bottom-title')?></div>
        <div class="btn btn-lg btn-primary" data-toggle="modal" data-target="#mod-send-report"><?=Yii::$app->t->text('guest-bottom')?></div>
      </div>
    </div>
  </div>
  <?php elseif(Yii::$app->people->isTrial()): ?>
    <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center">
        <div class="panel panel-transparent">
          <div class="text-danger m-bot10"><?=Yii::$app->t->text('trial-bottom-title')?></div>
          <a class="btn btn-lg btn-primary" target="_blank" href="<?=Url::to('@landing/price/')?>"><?=Yii::$app->t->text('trial-bottom')?></a>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <!-- Modal -->
  <?php if (Yii::$app->banners->getAccess("notice-email-exist")): ?>
    <div class="modal fade" id="mod-notice-exsits" tabindex="-1" role="notice">
      <div class="modal-dialog" style="width: 460px;">
        <div class="modal-content" style="width: 420px;">
          <div class="modal-header modal-header-info">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><?=Yii::$app->banners->getByCode("notice-email-exist")->name?></h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">
                <?php if(Yii::$app->banners->getByCode("notice-email-exist")->subname): ?>
                  <h4><?=Yii::$app->banners->getByCode("notice-email-exist")->subname?></h4>
                <?php endif ?>
                <?php if(Yii::$app->banners->getByCode("notice-email-exist")->text): ?>
                  <?=Yii::$app->banners->getByCode("notice-email-exist")->text?>
                <?php endif ?>
                <br>
                <center>
                  <a data-dismiss="modal" aria-hidden="true" class="btn btn-primary btn_f"><?=Yii::$app->banners->getByCode("notice-email-exist")->button?></a>
                </center>
              </div>
            </div>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <?php endif; ?>
  <?php if (Yii::$app->banners->getAccess("notice-success")): ?>
    <div class="modal fade" id="mod-notice-send" tabindex="-1" role="notice">
      <div class="modal-dialog" style="width: 460px;">
        <div class="modal-content" style="width: 420px;">
          <div class="modal-header modal-header-info">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><?=Yii::$app->banners->getByCode("notice-success")->name?></h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">
                <?php if(Yii::$app->banners->getByCode("notice-success")->subname): ?>
                  <h4><?=Yii::$app->banners->getByCode("notice-success")->subname?></h4>
                <?php endif ?>
                <?php if(Yii::$app->banners->getByCode("notice-success")->text): ?>
                  <?=Yii::$app->banners->getByCode("notice-success")->text?>
                <?php endif ?>
                <br>
                <center>
                  <a data-dismiss="modal" aria-hidden="true" class="btn btn-primary btn_f"><?=Yii::$app->banners->getByCode("notice-success")->button?></a>
                </center>
              </div>
            </div>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <?php endif ?>
  <!-- Modal -->
  <?php if (Yii::$app->banners->getAccess("good-work-modal")): ?>
    <div class="modal fade" id="mod-success" tabindex="-1" role="dialog">
      <div class="modal-dialog" style="width: 460px;">
        <div class="modal-content">
          <div class="modal-body">
            <div class="text-center">
              <span class="i-circle"><i class="fa fa-check text-success"></i></span>
              <h1 class="text-success" style="display: inline-block; vertical-align: middle; margin-left: 5px;"><?=Yii::$app->banners->getByCode("good-work-modal")->name?></h1>
              <?php if (Yii::$app->banners->getByCode("good-work-modal")->subname): ?>
                <h3 style="font-weight: 100;"><?=Yii::$app->banners->getByCode("good-work-modal")->subname?></h3>
              <?php endif ?>
            </div>
          </div>
          <div class="modal-footer text-center-u">
            <?php if(Yii::$app->user->isGuest): ?>
            <form method="POST" action="/modal.html" class="row subscrible-gw">
              <div class="col-xs-10 col-xs-offset-1">
                <div class="form-group m-bot15">
                  <input class="form-control input-lg" name="Subscrible[email]" placeholder="Enter Your E-mail" type="email">
                </div>
              </div>
              <div class="col-xs-10 col-xs-offset-1">
                <?php if (Yii::$app->banners->getByCode("good-work-modal")->button): ?>
                  <button type="submit" class="btn btn-success btn-block" data-dismiss="modal"><?=Yii::$app->banners->getByCode("good-work-modal")->button?></button>
                <?php endif ?>
              </div>
            </form>
            <?php else: ?>
            <div class="row">
              <div class="col-xs-10 col-xs-offset-1">
                <?php if (Yii::$app->banners->getByCode("good-work-modal")->text): ?>
                  <?=Yii::$app->banners->getByCode("good-work-modal")->text?>
                <?php endif ?>
              </div>
              <div class="col-xs-10 col-xs-offset-1">
                <?php if (Yii::$app->banners->getByCode("good-work-modal")->button): ?>
                  <a target="_blank" href="<?=Url::to('/user/profile')?>" class="btn btn-success btn-block"><?=Yii::$app->banners->getByCode("good-work-modal")->button?></a>
                <?php endif ?>
              </div>
            </div>
            <?php endif ?>
            <?php if (Yii::$app->banners->getByCode("good-work-modal")->after_button_a): ?>
              <a href="<?=Yii::$app->banners->getByCode("good-work-modal")->after_button_href?>" class="btn btn-link btn-block" data-dismiss="modal"><?=Yii::$app->banners->getByCode("good-work-modal")->after_button_a?></a>
            <?php endif ?>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <?php endif ?>
  <?php if (Yii::$app->banners->getAccess("modal-full-report")): ?>
    <div class="modal fade" id="mod-send-report" tabindex="-1" role="dialog">
      <div class="modal-dialog" style="width: 460px;">
        <div class="modal-content" style="width: 420px;">
          <div class="modal-header modal-header-info">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><?=Yii::$app->banners->getByCode("modal-full-report")->name?></h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">
                <?php if(Yii::$app->banners->getByCode("modal-full-report")->subname): ?>
                  <h4><?=Yii::$app->banners->getByCode("modal-full-report")->subname?></h4>
                <?php endif ?>
                <?php if(Yii::$app->banners->getByCode("modal-full-report")->text): ?>
                  <?=Yii::$app->banners->getByCode("modal-full-report")->text?>
                <?php endif ?>
                <form method="POST" class="form" action="<?=Url::toRoute('/site/modal')?>" role="form">
                  <div class="input-group input-group-lg m-bot25 m-top15">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    </span>
                    <input name="Subscrible[name]" class="form-control" id="inputName" placeholder="Your Name" type="text">
                  </div>
                  <div class="input-group input-group-lg m-bot25">
                    <span class="input-group-addon">@</span>
                    <input name="Subscrible[email]" class="form-control" id="inputEmail" placeholder="E-mail" type="email">
                  </div>
                  <div class="text-center">
                    <button id="getReportModal" type="submit" class="btn btn-danger btn-lg"><?=Yii::$app->banners->getByCode("modal-full-report")->button?></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <?php endif ?>
</div>
  <?php if(Yii::$app->user->isGuest): ?>
    <section class="sticky--banner text-center subscrible-sticky" >
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <form method="POST" action="<?=Url::toRoute('/site/modal')?>" class='send_report_to_email modal_form form-inline'>
              <div class="form-group">
                <!-- <label class="sr-only" for="exampleInputEmail2">Email address</label> -->
                <input name="Subscrible[name]" class="form-control inp" id="inputName" placeholder="Your Name" type="text">
              </div>
              <div class="form-group">
                <!-- <label class="sr-only" for="exampleInputPassword2">Password</label> -->
                <input name="Subscrible[email]" class="form-control" id="inputEmail" placeholder="E-mail" type="text">
              </div>
              <button type="submit" class="btn btn-danger btn_f"><?=Yii::$app->t->text('stcbtn')?></button>
            </form>
          </div>
        </div>
      </div>
    </section>
  <?php endif ?>
  <?php if(Yii::$app->user->isGuest): ?>
    <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Buy Your Package for ScanBacklinks backlink tool</h3>
          </div>
          <div class="panel-body">
              <!-- <p class="panel-desc">Buy Your Package for ScanBacklinks backlink tool</p> -->
              <table class="table table-striped table-no-border table--packages">
                <thead>
                  <tr>
                    <th width="40%"></th>
                    <th>
                      <span class="package--name">Free</span>
                      <span class="package--price">
                        <strong>$0</strong> / month
                      </span>
                    </th>
                    <th>
                      <span class="package--name">Standart</span>
                      <span class="package--price">
                        <strong>$59</strong> / month
                      </span>
                    </th>
                    <th>
                      <span class="package--name">Expert</span>
                      <span class="package--price">
                        <strong>$149</strong> / month
                      </span>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Reports</strong> per month</td>
                    <td>3</td>
                    <td>100</td>
                    <td>250</td>
                  </tr>
                  <tr>
                    <td><strong>Rows</strong> per report</td>
                    <td>20</td>
                    <td>50 000</td>
                    <td>100 000</td>
                  </tr>
                  <tr>
                    <td><strong>Export rows</strong> per month</td>
                    <td>10 000</td>
                    <td>30 000 000</td>
                    <td>70 000 000</td>
                  </tr>
                  <tr>
                    <td>Compare <strong>profiles</strong></td>
                    <td>2</td>
                    <td>5</td>
                    <td>5</td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td></td>
                    <td>
                      <button onclick="window.location.href='/login.html#signup'" class="btn btn-success">Registered Now</button>
                    </td>
                    <td>
                      <?php if(Yii::$app->user->isGuest): ?>
                        <button onclick="window.location.href='/login.html#signup'" class="btn btn-warning">Subscribe</button>
                      <?php else: ?>
                        <button onclick="location.href='https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=S74AD29NWK34L&custom_field=3245;standart'" class="btn btn-warning">Subscribe</button>
                      <?php endif ?>
                    </td>
                    <td>
                      <?php if(Yii::$app->user->isGuest): ?>
                        <button onclick="window.location.href='/login.html#signup'" class="btn btn-warning">Subscribe</button>
                      <?php else: ?>
                        <button onclick="location.href='https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZV5FTSDKV34CE'" class="btn btn-warning">Subscribe</button>
                      <?php endif ?>
                    </td>
                  </tr>
                </tfoot>
              </table>
          </div> <!-- panel body end -->
      </div> <!-- panel end -->
    </div> <!-- col end -->
  <?php endif ?>
<?php else: ?>
<div class="col-md-12">
  <h1 align="center">
    <?=$page->title?>
  </h1>
  <hr>
  <div class="textBody">
    <?=$page->text?>
  </div>
</div>
<?php endif ?>
