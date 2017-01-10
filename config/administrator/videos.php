<?php
/**
 * Created by PhpStorm.
 * User: kiristingna
 * Date: 2016/12/11
 * Time: 19:02
 */
use App\Video;
return array(
    'title' =>  '分集',

    'heading' =>  '分集管理',

    'single' => '分集',

    'model' => Video::class,

    'columns' => [

        'id' => [
            'title' => 'id'
        ],

        'av' => [
            'title' => '视频唯一标识',
        ],

        'name' => [
            'title' => '分集名称',
        ],

        'description' => [
            'title' => '分集剧情',
        ],

        'episode' => [
            'title' => '分集数',
        ],

        'special_id' => [
            'title' => '专辑id',
        ],

        'source_uri' => [
            'title' => '资源地址',
        ],

        'picture_uri' => [
            'title' => '图片地址',
            'output'=> function ($value) {
                return '<img src="'.$value.'" width = 100px>';
            }
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
            'title' => '分集名称',
            'type'  => 'text'
        ],

        'description' => [
            'title' => '分集剧情',
            'type'  => 'text'
        ],

        'episode' => [
            'title' => '分集数',
        ],

        'special' => [
            'title' => '所属的动漫专辑',
            'type'  => 'relationship',
            'name_field' => 'name'
        ],

        'source_uri' => [
            'title' => '资源地址',
            'type'  => 'text'
        ],

        'picture_uri' => [
            'title' => '图片地址',
            'type'  => 'image',// use image upload
            'location'=> public_path() . '/uploads/original/',// storage path
            'naming' => 'random', // file name
            'length' => 20,// lets you define size of file name in case random
            'display_raw_value' => true,
            'sizes' => array(
                array(90, 50,   'fit', public_path() . '/thumbs/small/', 100),
                array(170, 100, 'crop', public_path() . '/thumbs/middle/', 100),
                array(150, 200, 'auto', public_path() . '/thumbs/large/', 100)
            )
        ],

    ],

    'filters' => [
        'name' => [
            'title' => '分集名称',
        ],
        'special_id' => [
            'title' => '专辑id',
        ],
    ],
);