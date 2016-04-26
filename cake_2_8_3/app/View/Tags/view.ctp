
<div class="blog-masthead">
  <div class="container">
    <nav class="blog-nav">
      <?php echo $this->Html->link(
          'タグ  インデックス',
          array('controller' => 'tags', 'action' => 'index')
      ); ?>

    </nav>
  </div>
</div>

<div class="container">
    <h1><?php echo h($tag['Tag']['name']); ?></h1>

    <p><small>Created: <?php echo $tag['Tag']['created']; ?></small></p>
</div>
