<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Post</h1>
<?php
echo $this->Form->create('Post', array('type' => 'file'));
echo $this->Form->input('category', array(
    //'options' => array('admin' => 'Admin', 'author' => 'Author')
    'options' => $categories
));
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
/*
echo $this->Form->input('Image.0.attachment', array('type' => 'file', 'label' => 'Image'));
echo $this->Form->input('Image.0.model', array('type' => 'hidden', 'value' => 'Post'));
echo $this->Form->input('Image.0.name', array('type' => 'hidden', 'value' => 'PostImage'));
*/
echo $this->Form->end('Save Post');
?>
