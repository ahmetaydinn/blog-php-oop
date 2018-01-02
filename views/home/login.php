<?php $this->render('views/layout/header', []); ?>
<?php $this->render('views/layout/bunner', []); ?>
<?php $this->render('views/layout/menu', []); ?>
<?php
$login = $params['login'];

if ($login->hasErrors()) {
    ?>
    <div class="alert alert-danger" role="alert">
        <ul>
            <?php
            foreach ($login->getErrors() as $error) {
                ?>
                <li> <?php echo $error->message ?></li>
                <?php
            }
            ?>
        </ul>
    </div>
    <?php
}
?>
<div class="row">
    <div class="col-md-3">
        <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method='post'>

            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control" id="login" name="login[login]" value='<?= $login->login ?>' placeholder="Login">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="login[password]" value='<?= $login->password ?>' placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-md-9">
        <blockquote>

            <b> Credentials </b> <br>

            Login: victor <br>
            Password: 1234

        </blockquote>
    </div>
</div>


<?php $this->render('views/layout/footer', []); ?>