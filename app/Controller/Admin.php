<?php

namespace Controller;


use Model\Role;
use Src\Request;
use Src\View;
use Model\User;



class Admin
{
    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new \Src\Validator\Validator($request->all(), [
                'name' => ['required'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if($validator->fails()){
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/login');
            }
        }

        $roles = Role::all();
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/hello');
        }
        return new View('site.signup', ['roles' => $roles]);
    }
}