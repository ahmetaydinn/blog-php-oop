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
    $users = $params['users'];
    if (is_array($users) && count($users) > 0) {
        foreach ($users as $user) {
            ?>    

            <tr>
                <td><?php echo $user->id; ?></td>
                <td><?php echo $user->firstname; ?></td>
                <td><?php echo $user->lastname; ?></td>
                <td>
                    <a href="index.php?r=user/view&id=<?php echo $user->id ?>">View</a>
                    <a href="index.php?r=user/update&id=<?php echo $user->id ?>">Edit</a>
                    <a href="index.php?r=user/delete&id=<?php echo $user->id ?>">Delete</a>
                </td>
            </tr>


            <?php
        }
    }
    ?>
</table>

<?php $this->render('views/layout/footer', []); ?>