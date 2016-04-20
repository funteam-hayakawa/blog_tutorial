<h1>User lists</h1>



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
    'Add Category',
    array('controller' => 'categories', 'action' => 'add')
); ?>




<table>
    <tr>
        <th>Category Id</th>
        <th>CategoryName</th>
        <th>Blog title</th>
        <th>Action</th>
        <th>Created</th>
    </tr>

    <!-- ここから、$配列をループして、一覧の情報を表示 -->

    <?php foreach ($categories as $category): ?>
    <tr>
        <td><?php echo $category['Category']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($category['Category']['name'],
                array('controller' => 'categories', 'action' => 'view', $category['Category']['id'])); ?>
        </td>
        <td></td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $category['Category']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>

            <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $category['Category']['id'])
                );
            ?>
        </td>
        <td><?php echo $category['Category']['created']; ?></td>
    </tr>
    <?php foreach ($category['Post'] as $post): ?>
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
