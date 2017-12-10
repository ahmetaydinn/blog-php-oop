
<?php
$model = $params['model'];

if ($model->hasErrors()) {
    ?>
    <ul>
        <?php
        foreach ($model->getErrors() as $error) {
            ?>
            <li> <?php echo $error->message ?></li>
            <?php
        }
        ?>
    </ul>     
    <?php
}
?>

<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method='post'>
    <input type="hidden" name="user[id]" value='<?php echo $model->id ?>'> 
    <table>
        <tr>
            <th>First Name</th>
            <td>
                <input type="text" name="user[firstname]" value='<?php echo $model->firstname ?>'>
            </td>
        </tr>
        <tr>        
            <th>Last Name</th>
            <td>
                <input type="text" name="user[lastname]" value='<?php echo $model->lastname ?>'>
            </td>
        </tr>
        <tr>        
            <th></th>
            <td>
                <input type='submit' value='Salvar'> 
            </td>
        </tr>
    </table>


</form>