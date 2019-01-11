<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/11/011
 * Time: 12:30
 */
return [
    'member' => [
        'register_one' => [
            'name' => [
                'name' => '用户名',
                'rules' => 'required|min:7|max:10|unique:members',
                'message' => ['min' => '用户名最少为4位', 'max' => '用户名最多为9位', 'unique' => '该名称已存在']
            ],
            'password' => [
                'name' => '注册密码',
                'rules' => 'required|min:6|max:12|confirmed',
                'message' => ['min' => '密码最少为6位', 'max' => '密码最多为12位', 'confirmed' => '两次密码输入不一致']
            ],
            'qk_pwd' => [
                'name' => '取款密码',
                'rules' => 'required|numeric|min:6',
                'message' => []
            ],
            'check1' => [
                'name' => '条款一',
                'rules' => 'required',
                'message' => ['required' => '请同意勾选条款一']
            ],
            'check2' => [
                'name' => '条款二',
                'rules' => 'required',
                'message' => ['required' => '请同意勾选条款二']
            ],
        ],
    ],
    'api' => [
        'store' => [
            'url' =>  [
                'name' => 'url',
                'rules' => 'required',
                'message' => ['required' => 'URL 必填']
            ],
            'name' =>  [
                'name' => 'response',
                'rules' => 'required',
                'message' => ['required' => 'response 必填']
            ],
            'version' =>  [
                'name' => 'response',
                'rules' => 'required',
                'message' => ['required' => 'response 必填']
            ],
            'headers' =>  [
                'name' => 'response',
                'rules' => 'required',
                'message' => ['required' => 'response 必填']
            ],
            'request' =>  [
                'name' => 'response',
                'rules' => 'required',
                'message' => ['required' => 'response 必填']
            ],
            'response' =>  [
                'name' => 'response',
                'rules' => 'required',
                'message' => ['required' => 'response 必填']
            ],

        ]
    ]
];
