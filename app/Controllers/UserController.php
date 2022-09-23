<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class UserController extends BaseController
{
    public function register()
    {
        //
        $data = [];
        if ($this->request->getMethod() == "post") {
            $validation = $this->validate([
                "first_name" => [
                    "label" => "First Name",
                    "rules" => "required|alpha"
                ],
                "last_name" => [
                    "label" => "Last Name",
                    "rules" => "required|alpha"
                ],
                "user_name" => [
                    "label" => "Username",
                    "rules" => "required|alpha_numeric_punct|is_unique[users.user_name]"
                ],
                "user_email" => [

                    "label" => "Email",
                    "rules" => "required|valid_email"
                ],
                "user_password" => [
                    "label" => "Password",
                    "rules" => "required|alpha_numeric_punct|min_length[8]|max_length[32]"
                ],
                "user_phone_number" => [
                    "label" => "Phone Number",
                    "rules" => "required|numeric|exact_length[10]",
                ],
                "user_confirm_password" => [
                    "label" => "Confirm Password",
                    "rules" => "required|matches[user_password]"
                ]
            ]);
            if ($validation) {
                $user_data = [
                    "first_name" => $this->request->getPost("first_name"),
                    "last_name" => $this->request->getPost("last_name"),
                    "user_name" => $this->request->getPost("user_name"),
                    "user_email" => $this->request->getPost("user_email"),
                    "user_phone_number" => $this->request->getPost("user_phone_number"),
                    "user_password" => password_hash($this->request->getPost("user_password"), PASSWORD_DEFAULT),
                ];
                $userModel = new User();
                if ($userModel->save($user_data)) {
                    session()->setFlashdata("registration_success", "Account with username" . $this->request->getPost("user_name") . " is registered succesfully");
                    return redirect()->to("/user/login");
                } else {
                }
            } else {
                $data["validation_errors"] = $this->validator->listErrors();
            }
        }
        return view("users/register", $data);
    }

    public function login()
    {
        $data = [];
        if ($this->request->getMethod() == "post") {
            $validation = $this->validate([
                "user_name" => [
                    "label" => "Username",
                    "rules" => "required|alpha_numeric_punct|is_not_unique[users.user_name]"
                ],
                "user_password" => [
                    "label" => "User Password",
                    "rules" => "required|alpha_numeric_punct"
                ]
            ]);
            if ($validation) {
                $userModel = new User();
                $user_data = $userModel->where("user_name", $this->request->getPost("user_name"))->first();
                if (password_verify($this->request->getPost("user_password"), $user_data['user_password'])) {
                    session()->set('user_id', $user_data['user_id']);
                    session()->set("user_name", $user_data['user_name']);
                    session()->set("user_logged_in", TRUE);
                    session()->setFlashdata("login_success", "User logged in succesfully");
                    return redirect()->to("/");
                } else {
                    $data['password_error'] = "Invalid password. Please try again with correct password.";
                }
            } else {
                $data['validation_errors'] = $this->validator->listErrors();
            }
        }

        return view("users/login", $data);
    }
    public function logout()
    {
        session()->set(["user_id" => "", "user_name" => "", "user_logged_in" => ""]);

        session()->destroy();
        return redirect()->to("/");
    }
    public function dashboard()
    {
        return view("users/dashboard");
    }
}