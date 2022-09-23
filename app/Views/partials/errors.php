<?php if (isset($validation_errors)) : ?>
<div class="alert alert-danger">
    <?= $validation_errors ?>
</div>
<?php endif; ?>
<?php if (isset($password_error)) : ?>
<div class="alert alert-danger">
    <?= $password_error ?>
</div>
<?php endif; ?>