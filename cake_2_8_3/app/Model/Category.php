<?php

App::uses('AppModel', 'Model');

class Category extends AppModel {
    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A name is required'
            )
        ),
    );
    public $hasMany = array(
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'category_id',
            'order' => 'Post.category_id ASC',
            //カテゴリ削除でPostも消える
            'dependent' => true
        )
    );

}
