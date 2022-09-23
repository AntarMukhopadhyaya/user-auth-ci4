<?php helper(['form']) ?>

<?= $this->extend("layouts/main.layout.php") ?>

<?= $this->section("content") ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-heading">User Login</h5>
        </div>
        <div class="card-body">
            <div class="container">
                <?= $this->include("partials/errors.php") ?>
            </div>
            <?= form_open("/user/login") ?>
            <div class="form-group">
                <?= form_label("Username", "user_name_label", ['class' => "form-label"]) ?>
                <?= form_input("user_name", "", ["class" => 'form-control']) ?>
            </div>
            <div class="form-group">
                <?= form_label("Password", "user_password_label", ['class' => "form-label"]) ?>
                <?= form_password("user_password", "", ["class" => 'form-control']) ?>
            </div>
            <?= form_submit("form_submit", "Login Account", ['class' => "btn btn-outline-primary my-2"]) ?>
            <?= form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>