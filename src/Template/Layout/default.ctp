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
<!--[if IE 9]><html class="lt-ie10" lang="fr" > <![endif]-->
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
    <?= $this->fetch('meta') ?>
    <?= $this->Html->css('app.css') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>
<body>
    <!-- nav bar -->
    <nav>
        <ul>
            <li><?= $this->Html->image("svg/human.svg") ?>&nbsp; Ma vie d'humain</li>
            <li><?= $this->Html->link("<i class=\"fa fa-comment\"></i>&nbsp;Blog",["controller" => 'articles'],['escape' => false]); ?></li>
            <li><a href="#"><i class="fa fa-envelope"></i>&nbsp;Contact</a></li>
        </ul>
    </nav>
    <!-- /navbar -->
    <br>
    <!-- Content -->
    <div class="content">

        <article>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </article>

        <!-- aside -->
        <aside>
            <h5>Categories</h5>
                <?= $this->Cell("Category") ?>
        </aside>
        <!-- /aside -->
    </div>
    <!-- /content -->
    <!-- footer -->
    <footer>
        <?= $this->Html->image("svg/Twitter.svg",["width" => 48,"height" => 48,"url" => "https://twitter.com/minus78_"]); ?>
        &nbsp;
        <?= $this->Html->image("svg/Youtube.svg",["width" => 48,"height" => 48,"url" => "https://www.youtube.com/channel/UCmJLbilZJqmR6sDewWWeOLw"]); ?>
        &nbsp;
        <?= $this->Html->image("svg/Github.svg",["width" => 48,"height" => 48,"url" => "https://github.com/minus78"]); ?>
        &nbsp;
        <?= $this->Html->image("svg/Livecoding.svg",["width" => 48,"height" => 48,"url" => "https://www.livecoding.tv/minus78/"]); ?>
    </footer>
    <!-- /footer -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.8.0/highlight.min.js"></script>
    <?= $this->Html->script('app'); ?>
</body>
</html>
