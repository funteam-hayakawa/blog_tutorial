

<div class="blog-masthead">
  <div class="container">
    <nav class="blog-nav">
      <?php echo $this->Html->link(
          'インデックス',
          array('controller' => 'categories', 'action' => 'index')
      ); ?>

    </nav>
  </div>
</div>
<div class="container">
    <h1><?php echo h($category['Category']['name']); ?></h1>

    <p><small>Created: <?php echo $category['Category']['created']; ?></small></p>
</div>
