<?php

namespace Controller;


use Model\Role;
use Src\Request;
use Src\View;
use Model\User;
use Validator\Validator;
use Validators\ValidationRules;



class Admin
{
    public function signup(Request $request): string
    {
        $roles = Role::all();

        if ($request->method === 'POST') {
        $validator = new Validator($request->all(), ValidationRules::getRules('signup'), ValidationRules::getMessages());


        if ($validator->fails()) {
            return new View('admin.signup',
                ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
        }

        if (User::create($request->all())) {
            app()->route->redirect('/hello');
        }
    }
        return new View('site.signup', ['roles' => $roles]);
    }
}