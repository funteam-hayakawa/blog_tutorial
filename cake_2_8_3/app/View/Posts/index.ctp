<!-- File: /app/View/Posts/index.ctp -->
<style type="text/css">
<!--
  .dispn {
    display : none;
  }
-->
</style>
<script type="text/javascript">
        $(window).on('load', function () {
            $('.selectpicker').selectpicker();
        });
        $(function(){
          $('#hide_search').click(function(){
              $('#search_div').addClass('dispn');
              $('#hide_search').addClass('dispn');
              $('#show_search').removeClass('dispn');
          });
          $('#show_search').click(function(){
              $('#search_div').removeClass('dispn');
              $('#show_search').addClass('dispn');
              $('#hide_search').removeClass('dispn');
          });
        });
</script>

<div class="blog-masthead">
  <div class="container">
    <nav class="blog-nav">
      <?php echo $this->Html->link(
          'カテゴリ別表示',
          array('controller' => 'categories', 'action' => 'index')
      ); ?>

      <?php echo $this->Html->link(
          'Add Post',
          array('controller' => 'posts', 'action' => 'add')
      ); ?>

    </nav>
  </div>
</div>
<div class="container">

    <div class="blog-header">
        <h1 class="blog-title">Blog posts</h1>
    </div>
    <input type="button" value="検索エリアを表示" class="btn btn-default dispn" id="show_search">
    <input type="button" value="検索エリアを非表示" class="btn btn-default" id="hide_search">
    <div id="search_div">
        <?php echo $this->Form->create('Post', array('url'=>'index',)); ?>
        <fieldset>
            <legend>検索</legend>


            <?php
            echo $this->Form->input('category', array(
                'options' => $categories,
                'empty'=>'未選択',
                'class' => 'selectpicker'
            ));
            echo $this->Form->input('tag', array(
                'options' => $tags,
                'multiple'=> true,
                //'empty'=>'未選択',
                'class' => 'selectpicker'
            ));
            ?>

            <?php echo $this->Form->input('title', array('
            label' => 'タイトル',
            'empty' => true,
            'class' => 'form-control'
          )); ?>
        </fieldset>
        <?php echo $this->Form->end(array('label' => '検索', 'class' => 'btn btn-default')); ?>
    </div>



    <table class="table">
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

</div>


<?php
//echo "<pre>"; print_r($posts); echo "</pre>";
?>
