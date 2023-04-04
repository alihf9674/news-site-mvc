<?php

namespace Application\Controllers;

use Application\Model\User as UserModel;

class User extends Controller
{
    public function index()
    {
        $users = (new UserModel())->all();
        return $this->view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return $this->view('admin.users.create');
    }

    public function store($data)
    {
        $userModel = new UserModel();
        if (userPhoneNumberRegEx($data['user_call'])) {
            $userModel->insert('users', array_keys($data), array_values($data));
            $this->redirect('admin/user');
        }
        $this->back();
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);
        return $this->view('admin.users.edit', compact('user'));
    }

    public function update($data, $id)
    {
        $userModel = new UserModel();
        if (userPhoneNumberRegEx($data['user_call'])) {
            $userModel->update('users', $id, array_keys($data), array_values($data));
            $this->redirect('admin/user');
        }
        $this->back();
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete('users', $id);
        $this->back();
    }

    public function changePermission($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);
        if (!empty($user)) {
            if ($user['permission'] == 'admin')
                $userModel->update('users', $id, ['permission'], ['user']);
            else
                $userModel->update('users', $id, ['permission'], ['admin']);
        }
        $this->back();
    }
}