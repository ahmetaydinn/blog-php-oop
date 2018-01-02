<?php

use app\components\Auth;
use app\components\commons\Helper;
use app\models\Author;

$userId = Auth::getSession('id');
$user = Author::find($userId);


?>

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./index.php">Blog</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <?php if (Auth::isLogged()) { ?>
                    <li><a href="./index.php?r=post/create">New Post</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $user->name ?> (<?= Helper::getUserIP(); ?>)<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">                 
                            <!--li class="divider"></li-->
                            <li><a href="./index.php?r=home/logout">Logout</a></li>
                        </ul>
                    </li>

                <?php } else { ?>
                    <li><a href="./index.php?r=home/login">Login</a></li>                
                <?php } ?>                
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>