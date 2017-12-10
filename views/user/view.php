<?php $this->render('views/layout/header', []); ?>
<?php $this->render('views/layout/menu', []); ?>

<?php
$user = $params['model'];
?>
<h1> View User </h1>
<div style="text-align: right">
    <a href="index.php?r=user/list">List Users</a>
    <a href="index.php?r=user/update&id=<?php echo $user->id ?>">Edit User</a>
</div>
<table>
    <tr>
        <th>id</th><td><?php echo $user->id ?></td>      
    </tr>
    <tr>
        <th>First Name</th><td><?php echo $user->firstname ?></td>
    </tr>
    <tr>        
        <th>Last Name</th><td><?php echo $user->lastname ?></td>
    </tr>
</table>

<?php $this->render('views/layout/footer', []); ?>