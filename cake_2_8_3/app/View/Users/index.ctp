
<div class="container">
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
        'Add User',
        array('controller' => 'users', 'action' => 'add')
    ); ?>




    <table class="table">
        <tr>
            <th>Id</th>
            <th>UserName</th>
            <th>Role</th>
            <th>Action</th>
            <th>Created</th>
        </tr>

        <!-- ここから、$users配列をループして、ユーザ一覧の情報を表示 -->

        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['User']['id']; ?></td>
            <td>
                <?php echo $this->Html->link($user['User']['username'],
                    array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>
            </td>
            <td><?php echo $user['User']['role']; ?></td>
            <td>
                <?php
                    echo $this->Form->postLink(
                        'Delete',
                        array('action' => 'delete', $user['User']['id']),
                        array('confirm' => 'Are you sure?')
                    );
                ?>

                <?php
                    echo $this->Html->link(
                        'Edit',
                        array('action' => 'edit', $user['User']['id'])
                    );
                ?>
            </td>


            <td><?php echo $user['User']['created']; ?></td>
        </tr>
        <?php endforeach; ?>
        <?php unset($user); ?>
    </table>
</div>
