<?php
use yii\helpers\Html;
use frontend\models\Webmeup;
use common\models\Pages;
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
<div class="col-md-12 buttons-section">
  <div class="panel panel-default">
    <div class="panel-body">
      <button class="btn btn-success" href="/report/charts<?php if(Yii::$app->controller->url) echo '/'.Html::encode(Yii::$app->controller->url);  ?>">
        <i class="fa fa-bold"></i>Backlinks <span class="btn-counter"><?=Webmeup::countsItem(Yii::$app->controller->url,false,true)?></span>
      </button>
      <?php foreach (Yii::$app->controller->pages as $key => $value): ?>
        <a href="/report/backlinks/<?= $key ?><?php if(Yii::$app->controller->url) echo '/'.Html::encode(Yii::$app->controller->url);  ?>">
          <button class="btn-success  <?php if (Yii::$app->controller->type == $key) echo "btn-warning"; ?> btn " >
            <i class="<?= $value['ico_class'] ?>"></i> <?= $value['title']  ?> <span class="btn-counter"><?=Webmeup::countsItem(Yii::$app->controller->url, $key)?></span>
          </button>
        </a>
      <?php endforeach ?>
      <a download="<?= Yii::$app->controller->url ?>.csv" href="/report/export<?php if(Yii::$app->controller->url) echo '/'.Html::encode(Yii::$app->controller->url);  ?>">
        <button class="btn btn-primary">
          <i class="fa fa-download"></i>Export
        </button>
      </a>
    </div>
  </div>
</div>

<form id='AjaxForm'>
<input type="hidden" name='filter[type]' value='<?= $type ?>'>
<input type="hidden" name='url' value='<?= Yii::$app->controller->url ?>'>

<div class="col-md-12"> <!-- START filters section -->
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <div class="filter-wrapper">
            <div class="radio">
              <label>
                <input name="filter[nofollowDofollow]" id="optionsRadios2" value="all" type="radio" checked="">
                All
              </label>
            </div>
            <div class="radio">
              <label>
                <input name="filter[nofollowDofollow]" id="optionsRadios2" value="dofollow" type="radio">
                DoFollow
              </label>
            </div>
            <div class="radio">
              <label>
                <input name="filter[nofollowDofollow]" id="optionsRadios2" value="nofollow" type="radio">
                NoFollow
              </label>
            </div>
          </div> <!-- end .filter-wrapper -->

          <div class="filter-wrapper">
            <div class="radio">
              <label>
                <input name="filter[image]" id="optionsRadios2" value="all" type="radio" checked="">
                All
              </label>
            </div>
            <div class="radio">
              <label>
                <input name="filter[image]" id="optionsRadios2" value="image" type="radio">
                Image
              </label>
            </div>
            <div class="radio">
              <label>
                <input name="filter[image]" id="optionsRadios2" value="noImage" type="radio">
               Anchor Text
              </label>
            </div>
          </div> <!-- end .filter-wrapper -->

          <div class="filter-wrapper">
            <div class="radio padding-left-0">
              Link Age
            </div>
            <div class="form-horizontal width-160">
              <div class="form-group">
                <label class="col-xs-3 text-left control-label padding-left-0 padding-right-0">from</label>
                <div class="col-xs-9">
                  <div class="input-group date col-md-12" id="datetimepicker01">
                    <input class="form-control input-xs" value="" type="text" id="datetimepicker01Input" name='filter[dateStart]'>
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-xs-3 text-left control-label padding-left-0 padding-right-0">to</label>
                <div class="col-xs-9">
                  <div class="input-group date col-md-12" id="datetimepicker02">
                    <input class="form-control input-xs" value="" type="text" id="datetimepicker02Input" name='filter[dateLimit]'>
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- end .filter-wrapper -->

          <div class="filers-submit">
            <button class="btn btn-danger filter_submit">Apply Filter</button>
          </div> <!-- end .filers-submit -->
        </div>

        <div class="col-md-12 search-collapse"> <!-- START collapsable search section -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <span class="caret"></span>
              <h4 class="panel-title">
                <a class="text-primary btn btn-link" data-toggle="collapse" data-target="#collapseSearch_additional" data-parent="#accordion_info"><i class="fa fa-search"></i>Search by Anchor, Referring Site</a>
              </h4>
            </div>
            <div id="collapseSearch_additional" class="panel-collapse collapse">
              <div class="panel-body">
                <form action="#" class="form-horizontal">
                  <div class="form-group margin-bottom-0">
                    <div class="col-md-11">
                      <div class="input-group">
                        <input class="form-control" type="text" name="filter[text][]">
                        <div class="input-group-btn">
                          <span for="" class="select-custom select-sm">
                            <select name="filter[anchorDomain][]" id="" class="form-control">
                              <option value="anchor">By Anchor</option>
                              <option value="domain">By Domain</option>
                            </select>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-1">
                      <button class="btn btn-primary btn-block addnew">Add</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div> <!-- END collapsable search section -->
      </div>
    </div>
  </div>
</div> <!-- END filters section -->
</form>

<div class="col-md-12"> <!-- START backlink-domains section -->
  <div class="panel panel-default insider_section">

  </div>
</div>
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
                    <button onclick="location.href='https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=S74AD29NWK34L'" class="btn btn-warning">Subscribe</button>
                  </td>
                  <td>
                    <button onclick="location.href='https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZV5FTSDKV34CE'" class="btn btn-warning">Subscribe</button>
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