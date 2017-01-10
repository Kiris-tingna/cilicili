<?php
/**
 * Created by PhpStorm.
 * User: kiristingna
 * Date: 2017/1/6
 * Time: 18:37
 */
use App\Category;

return array(

    'title' => '栏目',

    'heading' => '栏目管理',

    'single' => '栏目',

    'model' => Category::class,

    'columns' => [

        'id' => [
            'title' => 'ID'
        ],

        'band' => [
            'title' => '主标题',
        ],

        'slug' => [
            'title' => '副标题',
        ],

    ],

    'edit_fields' => [

        'band' => [
            'title' => '主标题',
            'type' => 'text'
        ],

        'slug' => [
            'title' => '副标题',
            'type' => 'text'
        ],

    ],
    // 过滤, 搜索
    'filters' => [
        'band' => [
            'title' => '主标题',
        ]
    ],

);