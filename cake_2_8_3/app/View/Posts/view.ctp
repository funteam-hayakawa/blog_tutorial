
<div class="blog-masthead">
  <div class="container">
    <nav class="blog-nav">
      <?php echo $this->Html->link(
          'インデックス',
          array('controller' => 'posts', 'action' => 'index')
      ); ?>

      <?php echo $this->Html->link(
          'Add Post',
          array('controller' => 'posts', 'action' => 'add')
      ); ?>

    </nav>
  </div>
</div>

<div class="container">

    <div class="row">
        <div class="col-sm-8 blog-main">
            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo h($post['Post']['title']); ?></h2>

                <?php
                //echo "<pre>"; print_r($post); echo "</pre>";
                ?>
                <p class="blog-post-meta">Created: <?php echo $post['Post']['created']; ?></p>

                <?php foreach ($post['Image'] as $image): ?>
                  <img src=
                    <?php
                    echo '../../files/image/attachment/' . $image['dir'] . '/' . $image['attachment'];
                    ?>
                    width="256">

                    <?php
                    //echo $this->Html->link('../files/image/attachment/' . $image['dir'] . '/' . $image['attachment']);
                    ?>

                <?php endforeach; ?>



                <p><?php echo h($post['Post']['body']); ?></p>
            </div>
        </div>
    </div>
</div>
