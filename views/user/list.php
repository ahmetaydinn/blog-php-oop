<?php $this->render('views/layout/header', []); ?>
<?php $this->render('views/layout/menu', []); ?>

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
                <td></td>
            </tr>


            <?php
        }
    }
    ?>
</table>

<?php $this->render('views/layout/footer', []); ?>