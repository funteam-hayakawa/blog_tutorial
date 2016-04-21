<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>



<div>
    <?php echo $this->Form->create('Post', array('url'=>'index')); ?>
    <fieldset>
        <legend>検索</legend>


        <?php
        echo $this->Form->input('category', array(
            'options' => $categories,
            'empty'=>'未選択'
        ));
        echo $this->Form->input('tag', array(
            'options' => $tags,
            'multiple'=> true,
            'empty'=>'未選択'
        ));
        ?>

        <?php echo $this->Form->input('title', array('label' => 'タイトル', 'empty' => true)); ?>
    </fieldset>
    <?php echo $this->Form->end('検索'); ?>
</div>

<?php echo $this->Html->link(
    'カテゴリ別表示',
    array('controller' => 'categories', 'action' => 'index')
); ?>

<br>

<?php echo $this->Html->link(
    'Add Post',
    array('controller' => 'posts', 'action' => 'add')
); ?>

<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Category</th>
        <th>Tag</thj>
        <th>Action</th>
        <th>Created</th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],
		          array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link($post['Category']['name'],
		          array('controller' => 'categories', 'action' => 'view', $post['Category']['id'])); ?>
        </td>
        <td>
          <?php foreach ($post['Tag'] as $tag): ?>
            <?php echo $this->Html->link($tag['name'],
              array('controller' => 'tags', 'action' => 'view', $tag['id'])); ?>
          <?php endforeach; ?>
        </td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>

            <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $post['Post']['id'])
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Add Image',
                    array('action' => 'add_image', $post['Post']['id'])
                );
            ?>
        </td>


        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>

<?php
//echo "<pre>"; print_r($posts); echo "</pre>";
?>
