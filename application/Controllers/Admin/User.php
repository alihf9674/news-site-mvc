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
        if (empty($data)) {
            flash('error', 'فیلد ها نباید خالی باشد؛ مجددا تلاش کنید.');
            $this->back();
            die;
        }
        if (!isValidInput($data, $this->formInput)) {
            flash('error', 'لطفا همه فیلد ها را به طورصحیح پر کنید.');
            $this->back();
            die;
        }
        if (!filter_var($data['user_email'], FILTER_VALIDATE_EMAIL)) {
            flash('error', 'لطفا فرمت ایمیل را به طور صحیح وارد کنید.');
            $this->back();
            die;
        }
        $safeData = validateFormData($data, $this->skipValidation);
        UserModel::insert('users', array_keys($safeData), array_values($safeData));
        $this->redirect('admin/user');
        $this->back();
    }

    public function edit($id)
    {
        $user = UserModel::find($id);
        return $this->view('admin.users.edit', compact('user'));
    }

    public function update($data, $id)
    {
        if (empty($data)) {
            flash('error', 'فیلد ها نباید خالی باشد؛ مجددا تلاش کنید.');
            $this->back();
            die;
        }
        if (!isValidInput($data, $this->formInput)) {
            flash('error', 'لطفا همه فیلد ها را به طورصحیح پر کنید.');
            $this->back();
            die;
        }
        if(!filter_var($data['user_email'], FILTER_VALIDATE_EMAIL)){
            flash('error', 'لطفا فرمت ایمیل را به طور صحیح وارد کنید.');
            $this->back();
            die;
        }
        $safeData = validateFormData($data, $this->skipValidation);
        UserModel::update('users', $id, array_keys($safeData), array_values($safeData));
        $this->redirect('admin/user');

        $this->back();
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