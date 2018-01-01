<?php $this->render('views/layout/header', []); ?>
<?php $this->render('views/layout/bunner', []); ?>
<?php $this->render('views/layout/menu', []); ?>

<h1>New Post</h1>

<?php $this->render('views/post/_form', $params); ?>

<?php $this->render('views/layout/footer', []); ?>