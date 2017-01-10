<?php
use App\Post;

return array(

    'title' => '文章',

    'heading' => '文章管理',

    'single' => '文章',

    'model' => Post::class,

    'columns' => [

        'id' => [
            'title' => 'ID'
        ],

        'title' => [
            'title' => '标题',
        ],

        'topic' => [
            'title' => '内容',
            'sortable' => false,
            'output' => function($value)
            {
                return str_limit($value);
            },
        ],

        'user_id' => [
            'title' => "作者ID名称",
            'relationship' => 'user', //this is the name of the Eloquent relationship method!
            'select' => "(:table).name",
        ],

        'created_at'=>[
            'title'=>'创建日期',
        ],

        'updated_at'=>[
            'title'=>'更新日期',
        ],

//        'operation' => [
//            'title'  => '管理',
//            'output' => function ($value, $model) {
//                return $value;
//            },
//            'sortable' => false,
//        ],
    ],

    'edit_fields' => [

        'title' => [
            'title' => '标题',
            'type' => 'text'
        ],

        'topic' => [
            'title' => '内容',
            'type' => 'textarea'
        ],
        
        'user' => array(
            'type' => 'relationship',
            'title' => '作者',
            'name_field' => 'name',// type 为 relationship 会根据 name_field 自动生成可选择的内容
        )
    ],
    // 过滤, 搜索
    'filters' => [
        'title' => [
            'title' => '标题',
        ]
    ],

);