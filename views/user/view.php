<?php $this->render('views/layout/header', []); ?>
<?php $this->render('views/layout/menu', []); ?>

<?php self::debug($params, false) ?>


<?php 

$user = $params['model'];
self::debug($user->firstname, false) 
        
?>


<?php $this->render('views/layout/footer', []); ?>