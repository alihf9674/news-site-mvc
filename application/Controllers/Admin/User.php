<?php

namespace Application\Controllers\admin;

use Application\Model\User as UserModel;
use Application\Controllers\controller;

class User extends Controller
{
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
        if (ifUserPhoneNumberRegEx($data['user_call'])) {
            UserModel::insert('users', array_keys($data), array_values($data));
            $this->redirect('admin/user');
        }
        $this->back();
    }

    public function edit($id)
    {
        $user = UserModel::find($id);
        return $this->view('admin.users.edit', compact('user'));
    }

    public function update($data, $id)
    {
        if (ifUserPhoneNumberRegEx($data['user_call'])) {
            UserModel::update('users', $id, array_keys($data), array_values($data));
            $this->redirect('admin/user');
        }
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