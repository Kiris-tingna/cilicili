<?php
use App\User;

return array(
    'title' =>  '用户',

    'heading' =>  '用户管理',

    'single' => '用户',

    'model' => User::class,

    'columns' => [

        'id' => [
            'title' => 'ID'
        ],

        'name' => [
            'title' => '用户名',
        ],

        'email' => [
            'title' => '电子邮件',
        ],

        'created_at'=>[
            'title'=>'创建日期'
        ],

        'updated_at'=>[
            'title'=>'更新日期'
        ],
    ],
    'edit_fields' => [

        'name' => [
            'title' => '用户名',
            'type' => 'text'
        ],

        'email' => [
            'title' => '电子邮件',
        ],

    ],
    'filters' => [

        'id' => [
            'title' => 'ID',
        ],

        'name' => [
            'title' => '用户名',
        ],
        
        'email' => [
            'title' => '电子邮件',
        ],
    ],
);