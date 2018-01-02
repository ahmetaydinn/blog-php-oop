<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method='post'>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="comment[name]" value='<?= $form->name ?>' placeholder="Name">
    </div>

    <div class="form-group">
        <label for="email">Email (optional)</label>
        <input type="text" class="form-control" id="email" name="comment[email]" value='<?= $form->email ?>' placeholder="Email">
    </div>

    <div class="form-group">
        <label for="url">Url (optional)</label>
        <input type="text" class="form-control" id="url" name="comment[url]" value='<?= $form->url ?>' placeholder="Url">
    </div>

    <div class="form-group">
        <label for="remark">Remark</label>
        <textarea class="form-control" id="remark" name="comment[remark]" placeholder="Remark" rows="5" ><?= $form->remark ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>


</form>
