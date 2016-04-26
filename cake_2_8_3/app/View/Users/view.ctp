<div class="blog-masthead">
  <div class="container">
    <nav class="blog-nav">
      <?php echo $this->Html->link(
          'ユーザインデックス',
          array('controller' => 'users', 'action' => 'index')
      ); ?>

    </nav>
  </div>
</div>
<div class="container">


    <h1><?php echo h($user['User']['username']); ?></h1>

    <p><small>Created: <?php echo $user['User']['created']; ?></small></p>

    <p><small>PasswdHash: <?php echo $user['User']['password']; ?></small></p>
</div>
