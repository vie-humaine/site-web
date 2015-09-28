<?php
/**
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @since         0.10.0
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/

$cakeDescription = 'Ma vie d\'humain';
?>


<!doctype html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="fr" data-useragent="Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <meta name="description" content="Blog ma vie d'humain"/>
    <meta name="author" content="minus78"/>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('app.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <?= $this->fetch('script') ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.8.0/highlight.min.js"></script>
    <?= $this->Html->script('modernizr') ?>
    <style media="screen">
    .disqus-comment-count
    {
        color: #DE5B49;
    }
    .fa
    {
        color:inherit;
    }
    .emojione
    {
        width: 25px;
    }
    .twitter-share-button,.twitter-follow-button
    {
        vertical-align: middle;
    }
    </style>
</head>
<body>
    <nav class="top-bar" data-topbar role="navigation">
        <ul class="title-area">
            <li class="name">
                <h1><a href="#">Ma vie d'humain</a></h1>
            </li>
            <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>

        <section class="top-bar-section">
            <!-- Right Nav Section -->
            <?php
            $AuthUser = $this->request->session()->read("Auth.User.username");
            $class = "";

            if(!empty($AuthUser))
            {
                $class = "class=\"has-dropdown\"";
                $username = h($AuthUser);
            } else {
                $username = "Compte";
            }

            ?>
            <ul class="right">
                <li <?= $class ?>>
                    <?= $this->Html->link("<i class=\"fa fa-user\"></i>&nbsp;".$username,["controller" => "users","action" => "login"],['escape' => false]) ?>
                    <?php if (!empty($AuthUser)): ?>
                        <ul class="dropdown">
                            <?php if ($this->request->session()->read("Auth.User.role") == "Admin"): ?>
                                <li><?= $this->Html->link("<i class=\"fa fa-plus-square\"></i>&nbsp;Ajouter un article",["controller" => "articles",'action' => "add"],["escape" => false]); ?></li>
                            <?php endif; ?>
                            <li><?= $this->Html->link("<i class=\"fa fa-lock\"></i>&nbsp;Compte",["controller" => "users"],["escape" => false]) ?></li>
                            <li><?= $this->Html->link("<i class=\"fa fa-sign-out\"></i>&nbsp;Deconnection",["controller" => "users","action" => "logout"],["escape" => false]) ?></li>
                        </ul>
                    <?php endif; ?>
                </li>
            </ul>

            <!-- Left Nav Section -->
            <ul class="left">
                <li><?= $this->Html->link("<i class=\"fa fa-comment\"></i>&nbsp;Blog",["controller" => 'articles'],['escape' => false]); ?></li>
                <li><a href="contact.html"><i class="fa fa-envelope-o"></i>&nbsp;Contact</a></li>
            </ul>
        </section>
    </nav>
    <br>
    <?= $this->Flash->render() ?>
    <div class="row">

        <div class="large-9 columns" role="content">

            <?= $this->fetch('content') ?>

        </div>


        <aside class="large-3 show-for-large-up columns">
            <h5>Categories</h5>

            <?= $this->Cell("Category") ?>

            <div class="panel text-center">
                <?= $this->Html->image("svg/Twitter.svg",["width" => 48,"height" => 48,"url" => "https://twitter.com/minus78_"]); ?>
                &nbsp;
                <?= $this->Html->image("svg/Youtube.svg",["width" => 48,"height" => 48,"url" => "https://www.youtube.com/channel/UCmJLbilZJqmR6sDewWWeOLw"]); ?>
                &nbsp;
                <?= $this->Html->image("svg/Github.svg",["width" => 48,"height" => 48,"url" => "https://github.com/minus78"]); ?>
                &nbsp;
                <?= $this->Html->image("svg/Livecoding.svg",["width" => 48,"height" => 48,"url" => "https://www.livecoding.tv/minus78/"]); ?>
            </div>

        </aside>

    </div>

    <?= $this->Html->script("foundation.min"); ?>
    <script>
    $(document).foundation();

    var doc = document.documentElement;
    doc.setAttribute('data-useragent', navigator.userAgent);
    </script>
</body>
</html>
