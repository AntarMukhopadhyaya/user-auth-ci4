<?php helper(['url', 'form', 'html']) ?>

<?= $this->extend("layouts/main.layout.php") ?>

<?= $this->section("content") ?>
<div class="container">
    <?= $this->include("partials/errors.php") ?>
</div>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-heading">User Registration</h5>
        </div>
        <div class="card-body">
            <?= form_open("/user/register") ?>
            <div class="form-group">
                <?= form_label("First Name*", "first_name_label", ['class' => 'form-label']) ?>
                <?= form_input('first_name', "", ['class' => 'form-control']) ?>
            </div>
            <div class="form-group">
                <?= form_label("Last Name*", "last_name_label", ['class' => "form-label"]) ?>
                <?= form_input("last_name", "", ['class' => "form-control"]) ?>
            </div>
            <div class="form-group">
                <?= form_label("Username*", "user_name_label", ['class' => "form-label"]) ?>
                <?= form_input("user_name", "", ['class' => "form-control"]) ?>
            </div>
            <div class="form-group">
                <?= form_label("Email*", "email_label", ['class' => "form-label"]) ?>
                <?= form_input("user_email", "", ['class' => "form-control"], "email") ?>
            </div>
            <div class="form-group">
                <?= form_label("Phone Number", "phone_number", ['class' => "form-label"]) ?>
                <?= form_input("user_phone_number", "", ['class' => "form-control"]) ?>
            </div>
            <div class="form-group">
                <?= form_label("Password*", "password_label", ['class' => 'form-label']) ?>
                <?= form_password("user_password", "", ['class' => "form-control"]) ?>
            </div>
            <div class="form-group">
                <?= form_label("Confirm Password*", "password_label", ['class' => 'form-label']) ?>
                <?= form_password("user_confirm_password", "", ['class' => "form-control"]) ?>
            </div>

            <?= form_submit("form_submit", "Register Account", ['class' => 'btn btn-outline-primary my-2']) ?>
            <?= anchor(base_url() . "/user/login", "Login Account") ?>
            <?= form_close() ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>