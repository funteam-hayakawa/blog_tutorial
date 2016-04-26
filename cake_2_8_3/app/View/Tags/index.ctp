

<div class="container">
<h1>Tag lists</h1>
<?php echo $this->Html->link(
    'Blog Index',
    array('controller' => 'posts', 'action' => 'index')
); ?>

<br>



<?php echo $this->Html->link(
    'Login',
    array('controller' => 'users', 'action' => 'login')
); ?>

<br>



<?php echo $this->Html->link(
    'Logout',
    array('controller' => 'users', 'action' => 'logout')
); ?>

<br>

<?php echo $this->Html->link(
    'Add Tag',
    array('controller' => 'tags', 'action' => 'add')
); ?>




<table class="table">
    <tr>
        <th>Tag Id</th>
        <th>TagName</th>
        <th>Blog title</th>
        <th>Action</th>
        <th>Created</th>
    </tr>

    <!-- ここから、$配列をループして、一覧の情報を表示 -->

    <?php foreach ($tags as $tag): ?>
    <tr>
        <td><?php echo $tag['Tag']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($tag['Tag']['name'],
                array('controller' => 'tags', 'action' => 'view', $tag['Tag']['id'])); ?>
        </td>
        <td></td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $tag['Tag']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>

            <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $tag['Tag']['id'])
                );
            ?>
        </td>
        <td><?php echo $tag['Tag']['created']; ?></td>
    </tr>

    <?php foreach ($tag['Post'] as $post): ?>
    <tr>
      <td></td>
      <td></td>
      <td>
          <?php echo $this->Html->link($post['title'],
          array('controller' => 'posts', 'action' => 'view', $post['id'])); ?>
      </td>
      <td>
          <?php
              echo $this->Form->postLink(
                  'Delete',
                  array('controller' => 'posts', 'action' => 'delete', $post['id']),
                  array('confirm' => 'Are you sure?')
              );
          ?>

          <?php
              echo $this->Html->link(
                  'Edit',
                  array('controller' => 'posts', 'action' => 'edit', $post['id'])
              );
          ?>
      </td>
      <td><?php echo $post['created']; ?></td>
    </tr>
    <?php endforeach; ?>

    <?php endforeach; ?>
    <?php unset($user); ?>
</table>

</div>
