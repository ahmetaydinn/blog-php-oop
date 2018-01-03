<?php $this->render('views/layout/header', []); ?>
<?php $this->render('views/layout/bunner', []); ?>
<?php $this->render('views/layout/menu', []); ?>
<?php

use app\components\commons\Helper;

$posts = $params['posts'];
?>


<h1>Home</h1>

<?php
if (is_array($posts) && count($posts) > 0) {
    foreach ($posts as $post) {
        ?>
        <table class="table table-bordered">
            <tr>
                <th colspan="2">
                    <a href="./index.php?r=post/detail&id=<?php echo $post->id ?>">
                        <?php
                        $date = Helper::dateFormat($post->date_insert, 'Y-m-d');
                        if (Helper::isToday($date)) {
                            echo 'Today';
                        } else {
                            echo Helper::dateFormat($post->date_insert, 'd.m.Y');
                        }
                        ?> : <?php echo $post->title ?>
                    </a>
                </th>
            </tr>
            <tr>
                <td colspan="2"><?= Helper::inTheEnd(Helper::decodeHTML($post->description), '...', 1000) ?> <a href="./index.php?r=post/detail&id=<?php echo $post->id ?>">Read More</a></td>
            </tr> 
            <tr>
                <th>Author: <?php echo $post->author ?></th><th>Comments: <a href="./index.php?r=post/detail&id=<?php echo $post->id ?>"><?php echo count($post->comments) ?></a></th>          
            </tr> 
        </table> 
        <br>
        <?php
    }
} else {
    ?>
    <div class="alert alert-info" role="alert">No posts were published yet.</div> 
    <?php
}
?>


<?php $this->render('views/layout/footer', []); ?>