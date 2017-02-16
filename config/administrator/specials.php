<?php
/**
 * Created by PhpStorm.
 * User: kiristingna
 * Date: 2016/12/13
 * Time: 23:12
 */
use App\Special;
return array(
    'title' =>  '专辑',

    'heading' =>  '动漫专辑管理',

    'single' => '动漫合辑',

    'model' => Special::class,

    'columns' => [

        'id' => [
            'title' => 'id'
        ],

        'name' => [
            'title' => '合集名称',
        ],

        'info' => [
            'title' => '子描述',
        ],

        'area' => [
            'title' => '地区',
        ],

        'description' => [
            'title' => '简介',
            'output' => function($value)
            {
                return str_limit($value, 50);
            },
        ],

        'picture_uri' => [
            'title' => '封图地址',
            'output'=> function ($value) {
                return '<img src="'.$value.'" width = 100px>';
            }
        ],

        'year' => [
            'title' => '年份',
        ],

        'month' => [
            'title' => '月份',
        ],

        'weekday' => [
            'title' => '预计跟新日期',
        ],

        'state' => [
            'title' => '状态',
        ],

        'particles' => [
            'title' => '目前分集数',
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
            'title' => '合集名称',
        ],

        'info' => [
            'title' => '子描述',
        ],

        'area' => [
            'title' => '地区',
        ],

        'description' => [
            'title' => '简介',
            'type' => 'textarea'
        ],

        'picture_uri' => [
            'title' => '图片地址',
            'type'  => 'image',// use image upload
            'location'=> public_path() . '/uploads/original/',// storage path
            'naming' => 'random', // file name
            'length' => 20,// lets you define size of file name in case random
            'display_raw_value' => true,
            'sizes' => array(
                array(90, 50,   'fit', public_path() . '/thumbs/small/' , 100),
                array(170, 100, 'crop', public_path(). '/thumbs/middle/', 100),
                array(150, 200, 'auto', public_path(). '/thumbs/large/' , 100)
            )
        ],

        'year' => [
            'title' => '年份',
        ],

        'month' => [
            'title' => '月份',
        ],

        'weekday' => [
            'title' => '预计跟新日期',
            'type' => 'enum',
            'options' => array('7','1','2','3','4','5','6'),
        ],

        'state' => [
            'title' => '状态',
        ],

        'particles' => [
            'title' => '目前分集数',
        ],

    ],

    'filters' => [
        'name' => [
            'title' => '合集名称',
        ],

        'area' => [
            'title' => '地区',
        ],

        'year' => [
            'title' => '年份',
        ],

        'month' => [
            'title' => '月份',
        ],
    ],
);
