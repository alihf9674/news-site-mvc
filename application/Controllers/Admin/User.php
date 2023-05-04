<?php

namespace Application\Controllers\admin;

use Application\Model\User as UserModel;
use Application\Controllers\controller;

class User extends Controller
{
    private array $formInput = ['username', 'user_email', 'password', 'permission'];
    private array $skipValidation = ['user_email'];

    public function index()
    {
        $users = UserModel::all();
        return $this->view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return $this->view('admin.users.create');
    }

    public function store($data)
    {
        if (empty($data))
            $this->setWarningFlashMessage('فیلد ها نباید خالی باشد؛ مجددا تلاش کنید.');
        if (!isValidInput($data, $this->formInput))
            $this->setWarningFlashMessage('لطفا همه فیلد ها را به طورصحیح پر کنید.');
        if (!filter_var($data['user_email'], FILTER_VALIDATE_EMAIL))
            $this->setWarningFlashMessage('لطفا فرمت ایمیل را به طور صحیح وارد کنید.');
        $safeData = validateFormData($data, $this->skipValidation);
        UserModel::insert('users', array_keys($safeData), array_values($safeData));
        $this->redirect('admin/user');
    }

    public function edit($id)
    {
        $user = UserModel::find($id);
        return $this->view('admin.users.edit', compact('user'));
    }

    public function update($data, $id)
    {
        if (empty($data))
            $this->setWarningFlashMessage('فیلد ها نباید خالی باشد؛ مجددا تلاش کنید.');
        if (!isValidInput($data, $this->formInput))
            $this->setWarningFlashMessage('لطفا همه فیلد ها را به طورصحیح پر کنید.');
        if (!filter_var($data['user_email'], FILTER_VALIDATE_EMAIL))
            $this->setWarningFlashMessage('لطفا فرمت ایمیل را به طور صحیح وارد کنید.');
        $safeData = validateFormData($data, $this->skipValidation);
        UserModel::update('users', $id, array_keys($safeData), array_values($safeData));
        $this->redirect('admin/user');
    }

    public function delete($id)
    {
        UserModel::delete('users', $id);
        $this->back();
    }

    public function changePermission($id)
    {
        $user = UserModel::find($id);
        if (!empty($user)) {
            if ($user['permission'] == 'admin')
                UserModel::update('users', $id, ['permission'], ['user']);
            else
                UserModel::update('users', $id, ['permission'], ['admin']);
        }
        $this->back();
    }
}