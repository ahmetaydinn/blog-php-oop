<?php $this->render('views/layout/header', []); ?>
<?php $this->render('views/layout/bunner', []); ?>
<?php $this->render('views/layout/menu', []); ?>
<?php

use app\components\commons\Helper;

$post = $params['post'];
$form = $params['comment'];
?>


<h1>Detail</h1>

<?php
// Show summary errors
if ($form->hasErrors()) {
    ?>    

    <div class="alert alert-danger" role="alert">Errors were founded bellow!</div>

    <?php
}
?>
<!-- 
    TODO Change this link bellow to post submition.. [more safy]
-->
<div class="display-buttons">
    <a class="btn btn-primary" href="./index.php?r=post/update&id=<?= $post->id ?>">
        EDIT
    </a>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
        DELETE
    </button>
</div>
<table class="table table-bordered">
    <tr>
        <th colspan="2"><?= Helper::dateFormat($post->date_insert, 'd.m.Y') ?> : <?php echo $post->title ?></th>
    </tr>
    <tr>
        <td colspan="2"><?= Helper::decodeHTML($post->description); ?></td>
    </tr> 
    <tr>
        <th>Author: <?php echo $post->author ?></th><th>Comments: <?php echo count($post->comments) ?></th>          
    </tr> 
</table> 
<br>

<h2>Comments (<?= count($post->comments); ?>)</h2>

<?php
if (is_array($post->comments) && count($post->comments) > 0) {
    $counter = 1;
    foreach ($post->comments as $comment) {
        ?>

        <table class="table table-striped table-bordered">
            <tr>
                <th width="5%"><?php echo $counter ?>. </th>
                <th width="35%"><?php echo $comment->name ?></th>
                <th width="40%"><a href="<?= filter_var($comment->url, FILTER_SANITIZE_URL) ?>" target="_blank"><?php echo $comment->url ?></th>
                <th width="20%"> said: <?= Helper::dateFormat($comment->date_insert, 'd.m.Y H:s') ?></th>
            </tr>
            <tr>
                <td colspan="4" class="text-justify"><?= Helper::decodeHTML($comment->remark); ?></td>
            </tr>
        </table> 

        <?php
        $counter++;
    }
} else {
    ?>
    <div class="alert alert-info" role="alert">No comments were founded.</div>
    <?php
}
?>  

<h3>Leave a Comment</h3>

<?php
if ($form->hasErrors()) {
    ?>
    <div class="alert alert-danger" role="alert">
        <ul>
            <?php
            foreach ($form->getErrors() as $error) {
                ?>
                <li> <?php echo $error->message ?></li>
                <?php
            }
            ?>
        </ul> 
    </div>
<?php }
?>



<?php $this->render('views/post/_comments_form', $params); ?>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you realy want to delete this post?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning">Yes</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    <script>

        /*$(function () {
         
         $('#delete').on('click', function () {
         $('#myModal').modal('toggle');
         })
         
         
         
         })*/

    </script>

    <?php $this->render('views/layout/footer', []); ?>