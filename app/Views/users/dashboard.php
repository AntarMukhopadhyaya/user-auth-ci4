<?php helper(['form', "url"]) ?>

<?= $this->extend("layouts/main.layout.php") ?>
<?= $this->section("content") ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>User Dashboard</h5>
        </div>
        <div class="card-body">
            <?= form_open("/user/dashboard") ?>
            <div class="row">
                <div class="col">
                    <?= form_label("First Name", "first_name_label", ["class" => "form-label"]) ?>
                    <?= form_input("first_name", "", ['class' => 'form-control']) ?>
                </div>
                <div class="col">
                    <?= form_label("Last Name", "first_name_label", ["class" => "form-label"]) ?>
                    <?= form_input("last_name", "", ['class' => 'form-control']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?= form_label("Username", "user_name_label", ["class" => "form-label"]) ?>
                    <?= form_input("user_name", "", ['class' => 'form-control']) ?>
                </div>
                <div class="col">
                    <?= form_label("Email", "first_name_label", ["class" => "form-label"]) ?>
                    <?= form_input("user_email", "", ['class' => 'form-control'], "email") ?>
                </div>
            </div>
            <div class="form-group">
                <?= form_label("Phone Number", "phone_number_label", ['class' => "form-label"]) ?>
                <?= form_input("user_phone_number", "", ["class" => "form-control"]) ?>
            </div>
            <?= form_submit("form_update", "Update Details", ['class' => "btn btn-outline-primary my-2"]) ?>
            <?= form_close() ?>
            <hr>
            <?= form_open("/user/change-password") ?>
            <div class="form-group">
                <?= form_label("New Password", "new_password_label", ["class" => "form-label"]) ?>
                <?= form_input("user_password", "", ["class" => "form-control"])  ?>

            </div>
            <div class="form-group">
                <?= form_label("Confirm New Password", "confirm_password_label", ["class" => "form-label"]) ?>
                <?= form_input("user_confirm_password", "", ["class" => "form-control"])  ?>

            </div>
            <?= form_submit("change_password", "Change Password", ['class' => "btn btn-outline-primary my-2"]) ?>
            <?= form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>