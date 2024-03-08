<?php

namespace Validators;
class ValidationRules
{
    public static function getRules($context): array
    {
        switch ($context) {
            case 'signup':
                return [
                    'name' => ['required', 'russian'],
                    'login' => ['required', 'unique:users,login'],
                    'password' => ['required'],
                ];
            case 'login':
                return [
                    'login' => ['required'],
                    'password' => ['required'],
                ];
            case 'add_employee':
                return [
                    'firt_name' => ['required',  'russian'],
                    'last_name' => ['required',  'russian'],
                    'patronymic' => ['required', 'russian'],
//                    'gender' => ['required'],
                    'birthday' => ['required'],
                    'address' => ['required'],
                    'img_photo' => ['required'],
                ];
            case 'add_department':
                return [
                    'name' => ['required', 'unique:departments,name', 'russian'],
                ];
            case 'add_posts':
                return [
                    'name' => ['required', 'unique:posts,name', 'russian'],
                ];
            case 'add_disciplines':
                return [
                    'name' => ['required', 'unique:disciplines,name', 'russian'],
                ];
            // Add more cases for different contexts as needed
            default:
                return [];
        }
    }

    public static function getMessages(): array
    {
        return [
            'required' => 'Поле :field пусто',
            'unique' => 'Поле :field должно быть уникально',
            'russian' => 'Поле :field должно содержать только русский алфавит',
            'number' => 'Поле :field должно содержать только цифры',
            'not_number' => 'Поле :field должно содержать только буквы',
            'fileType' => 'Поле :field должно быть в формате: png,jpeg или jpg'
        ];
    }
}