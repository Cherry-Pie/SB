<aside class="main-sidebar">
<?php if (Yii::$app->user->identity): ?>

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->username?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => Yii::$app->name.' menu', 'options' => ['class' => 'header']],
                    ['label' => 'Static pages', 'icon' => 'fa fa-file-text-o', 'url' => ['/pages/']],
                    ['label' => 'Site options', 'icon' => 'fa fa-wrench', 'url' => ['/options/']],
                    // banners options
                    ['label' => 'Manage banners', 'icon' => 'fa fa-pencil-square-o', 'url' => ['/banners/']],
                    ['label' => 'Manage notifications', 'icon' => 'fa fa-exclamation', 'url' => ['/notifications/']],
                    ['label' => 'Manage text', 'icon' => 'fa fa-font', 'url' => ['/text-labels/']],
                    // smae tools links
                    [
                        'label' => 'Same tools',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'fa fa-circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>
<?php else: ?>
    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Back to site', 'icon' => 'fa fa-share', 'url' => "/"],
                ]
            ]
        ) ?>
    </section>
<?php endif ?>

</aside>
