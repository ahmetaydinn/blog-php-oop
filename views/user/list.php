<?php $this->render('views/layout/header', []); ?>
<?php $this->render('views/layout/menu', []); ?>

<h1> List of Users </h1>
<div style="text-align: right"><a href="index.php?r=user/create">New User</a></div>
<table>
    <tr>
        <th>id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Operators</th>
    </tr>
    <?php
    $models = $params['models'];
    if (is_array($models) && count($models) > 0) {
        foreach ($models as $model) {
            ?>    

            <tr>
                <td><?php echo $model->id; ?></td>
                <td><?php echo $model->firstname; ?></td>
                <td><?php echo $model->lastname; ?></td>
                <td>
                    <a href="index.php?r=user/view&id=<?php echo $model->id ?>">View</a>
                    <a href="index.php?r=user/update&id=<?php echo $model->id ?>">Edit</a>
                    <a href="index.php?r=user/delete&id=<?php echo $model->id ?>">Delete</a>
                </td>
            </tr>


            <?php
        }
    }
    ?>
</table>

<?php $this->render('views/layout/footer', []); ?>