<aside class="main-sidebar">
    <section class="sidebar-light">
        <!-- Sidebar user panel -->      
        <!-- search form -->       
        <!-- /.search form -->
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Books', 'icon' => 'fa fa-book', 'url' => ['/book']],
                    ['label' => 'Book Copies', 'icon' => 'fa fa-book', 'url' => ['/book-copy']],
                    ['label' => 'Publisher', 'icon' => 'fa fa-share-alt', 'url' => ['/publisher']],
                    ['label' => 'Author', 'icon' => 'fa fa-pencil', 'url' => ['/author']],
                    ['label' => 'Members', 'icon' => 'fa fa-users', 'url' => ['/member']], 
//                    ['label' => 'Members', 'icon' => 'fa-bookmark-o', 'url' => ['/member'],'visible'=>Yii::$app->user->can('staff'),],
//                    ['label' => '', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Loan', 'icon' => 'fa fa-dot-circle-o', 'url' => ['/loan']],
                    ['label' => 'Role', 'icon' => 'fa fa-user-secret', 'url' => ['/auth-assignment'],'visible'=>Yii::$app->user->can('administrator'),],                    
//                    [
//                        'label' => 'Manage Publisher',
//                        'icon' => 'fa fa-share',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Create Publsiher', 'icon' => 'fa fa-file-code-o', 'url' => ['/publisher/create'],],
//                            ['label' => 'Update Publsiher', 'icon' => 'fa fa-dashboard', 'url' => ['/publisher/update'],],
//                            ['label' => 'Delete Publsiher', 'icon' => 'fa fa-dashboard', 'url' => ['/publisher/delete'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'fa fa-circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'fa fa-circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
//                        ],
//                        'visible'=>Yii::$app->user->can('staff'),
//                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
