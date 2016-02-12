<?php
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = "User profile";
?>
<!-- Section start -->
<section>
    <!-- title container start -->
    <div class="container-fluid container-padded">
        <div class="row">
                <div class="col-md-12 page-title">
                <h2>User profile</h2>
                <hr>
            </div> <!-- col end -->
        </div> <!-- row end -->
    </div>
    <!-- title container end -->

    <!-- section container start -->
    <div class="container-fluid container-padded">
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="list-group no-top-border">
                                <a href="#" class="list-group-item">
                                        <p class="stat-title">Name</p>
                                        <h3 class="profile-data"><?=Yii::$app->user->identity->username?></h3>
                                </a>
                                <a href="#" class="list-group-item">
                                        <p class="stat-title">Email address</p>
                                        <h3 class="profile-data"><?=Yii::$app->user->identity->email?></h3>
                                </a>
                            </div>
                            <div class="panel-footer btn-arrange">
                                <a href="#" class="btn btn-sm btn-default">Change password</a>
                                <a href="#" class="btn btn-sm btn-default">Change Email</a>
                            </div>
                        </div> <!-- panel end -->
                    </div> <!-- col end -->


                </div> <!-- row end -->
            </div> <!-- col end -->

            <div class="col-sm-8 col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Backlink Tool</h3>
                            </div>
                            <div class="panel-body">
                                <!-- <p class="panel-desc">Backlink Tool</p> -->
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio eaque dicta, voluptate quam nesciunt rem asperiores, vitae ad atque nisi nihil quos sed? Blanditiis tempora ut distinctio minus, ea delectus?</p>
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                            </div> <!-- panel body end -->
                        </div> <!-- panel end -->
                    </div> <!-- col end -->

                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Payments history</h3>
                              <ul class="panel-tools pull-right">
                                <li>
                                  <!-- <div class="btn-group">
                                    <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action &nbsp;<span class="caret"></span>
                                    </button>
                                  </div> -->
                                  <!-- <a href="#">Contact Us</a> -->
                                  <button class="btn btn-link">Contact Us</button>
                                </li>
                              </ul>
                            </div>
                            <div class="panel-body">
                                <!-- <p class="panel-desc">Payments history</p> -->
                                <table class="table table-striped table-no-border table--payments">
                                  <thead>
                                    <tr>
                                      <th>Date</th>
                                      <th>Amount paid</th>
                                      <th>Product</th>
                                      <th>Details (Invoice #)</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>2015.07.15 20:15</td>
                                      <td>$250</td>
                                      <td>Lorem ipsum dolor sit amet</td>
                                      <td>#5842268</td>
                                    </tr>
                                    <tr>
                                      <td colspan="4"><i>No payments have been made so far.</i></td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div> <!-- panel body end -->
                        </div> <!-- panel end -->
                    </div> <!-- col end -->


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
                                          <strong>$49</strong> / month
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
                                      <td></td>
                                      <td>
                                        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                                          <input name="cmd" type="hidden" value="_xclick" />
                                          <input name="business" type="hidden" value="andreys-facilitator@evne.com.ua" />
                                          <input name="item_name" type="hidden" value="Standart" />
                                          <input name="item_number" type="hidden" value="5" />
                                          <input name="amount" type="hidden" value="49" />
                                          <input name="no_shipping" type="hidden" value="1" />
                                          <input name="rm" type="hidden" value="2" />
                                          <input name="return" type="hidden" value="http://cp.scanbacklinks.com/user/success/" />
                                          <input name="cancel_return" type="hidden" value="http://cp.scanbacklinks.com/user/fail/" />
                                          <input name="currency_code" type="hidden" value="USD" />
                                          <input name="notify_url" type="hidden" value="http://cp.scanbacklinks.com/user/paypallistener/" />
                                          
                                          <input name="custom" type="hidden" value="<?= Yii::$app->user->id ?>_1" />
                                          <button class="btn btn-warning" type="submit">Subscribe</button>
                                        </form>
                                      </td>
                                      <td>
                                        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                                          <input name="cmd" type="hidden" value="_xclick" />
                                          <input name="business" type="hidden" value="andreys-facilitator@evne.com.ua" />
                                          <input name="item_name" type="hidden" value="Expert" />
                                          <input name="item_number" type="hidden" value="5" />
                                          <input name="amount" type="hidden" value="149" />
                                          <input name="no_shipping" type="hidden" value="1" />
                                          <input name="rm" type="hidden" value="2" />
                                          <input name="return" type="hidden" value="http://cp.scanbacklinks.com/user/success/" />
                                          <input name="cancel_return" type="hidden" value="http://cp.scanbacklinks.com/user/fail/" />
                                          <input name="currency_code" type="hidden" value="USD" />
                                          <input name="notify_url" type="hidden" value="http://cp.scanbacklinks.com/user/paypallistener/" />
                                          
                                          <input name="custom" type="hidden" value="<?= Yii::$app->user->id ?>_2" />
                                          <button class="btn btn-warning" type="submit">Subscribe</button>
                                        </form>
                                      </td>
                                    </tr>
                                  </tfoot>
                                </table>
                            </div> <!-- panel body end -->
                        </div> <!-- panel end -->
                    </div> <!-- col end -->

                </div> <!-- row end -->
            </div> <!-- col end -->
        </div> <!-- row end -->
    </div>
    <!-- section container end -->
</section>
<!-- Section end -->