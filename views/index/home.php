<?php $this->render('views/layout/header', []); ?>
<?php $this->render('views/layout/menu', []); ?>
<?php

use app\components\commons\Helper;

$posts = $params['posts'];

if (is_array($posts)) {
    foreach ($posts as $post) {
        ?>
        <table class="table table-bordered">
            <tr>
                <th colspan="2"><a href="index.php?page=post&method=detail&id=<?php echo $post->id ?>"><?php echo $post->date_insert ?> : <?php echo $post->title ?></a></th>
            </tr>
            <tr>
                <th colspan="2"><?php echo Helper::inTheEnd($post->description, '...', 1000) ?></th>
            </tr> 
            <tr>
                <th>Author:<?php echo $post->author ?></th><th>Comments: <a href="index.php?page=post&method=detail&id=<?php echo $post->id ?>"><?php echo count($post->comments) ?></a></th>          
            </tr> 
        </table> 
        <br>
        <?php
    }
}
?>

<?php $this->render('views/layout/footer', []); ?>