<?php

use app\components\commons\Helper;

$post = $params['post'];

if ($post->hasErrors()) {
    ?>
    <div class="alert alert-danger" role="alert">
        <ul>
            <?php
            foreach ($post->getErrors() as $error) {
                ?>
                <li> <?php echo $error->message ?></li>
                <?php
            }
            ?>
        </ul> 
    </div>
<?php }
?>
<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method='post'>
    <input type="hidden" name="csrf_token" value="<?php echo Security::generateCsrfToken(); ?>"/>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="post[title]" value='<?= $post->title ?>' placeholder="Title">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="post[description]" rows="5" placeholder="Description"><?= $post->description ?></textarea>
    </div>

    <div class="form-group">
        <label for="date">Publication Date</label>
        <input type="text" class="form-control" id="date" name="post[date_publication]" value='<?= $post->date_publication ?>' placeholder="dd.mm.yyyy">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>


</form>
<script>
    $(function () {
        tinymce.init({selector: 'textarea'});
    });

</script>
