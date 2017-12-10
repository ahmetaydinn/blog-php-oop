<?php $this->render('views/layout/header', []); ?>
<?php $this->render('views/layout/menu', []); ?>

<h1> Update User </h1>

<?php $this->render('views/user/_form', ['params' => $params]); ?>


<?php $this->render('views/layout/footer', []); ?>