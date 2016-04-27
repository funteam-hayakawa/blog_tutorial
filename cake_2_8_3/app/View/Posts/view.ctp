
<?php
//echo $this->Html->css('lightbox');
?>
<?php
 //echo $this->Html->script('lightbox');
 ?>
 <style type="text/css">
 <!--
   .dispn {
     display : none;
   }
   .popup-item{
      position:fixed;     /* 位置の固定 */
      top: 50%;           /* 表示位置(真ん中に表示) */
      left: 50%;          /* 表示位置(真ん中に表示) */
      margin: -25%;          /* 余白の削除 */
      padding: 0;         /* 余白の削除 */
      z-index:1001;       /* 要素のz座標 */
    }
 -->
 </style>
<script type="text/javascript">
        var img = [];
        var img_idx = {};
        var curr_idx;
        $(function(){
          var i;
          for(i = 0 ; i < $('.post_image').length ; i++){
              console.log($($('.post_image')[i]).attr('src'));
              var tmp = $($('.post_image')[i]).attr('src');
              img[i] = tmp;
              img_idx[tmp] = i;
          }
          var setimage = function(img_url){
            var htm = '';
            htm += '<img src="' + img_url + '" width="' + Math.floor(window.innerWidth/2) + 'px"/>';
            $('#popup_item').hide();
            $('#popup_image').html(htm);
            $('#popup_item').fadeIn(500);
          };

          $('.post_image').click(function(e){
             //console.log($(e.target).attr('src'));
             var img_url = $(e.target).attr('src');
             setimage(img_url);
             curr_idx = img_idx[img_url];
          });
          $('#close').click(function(){
              $('#popup_item').fadeOut();
          });
          $('#next').click(function(){
            if (curr_idx < img.length - 1){
              curr_idx++;
              var img_url = img[curr_idx];
              setimage(img_url);
            }
          });
          $('#prev').click(function(){
            if (curr_idx > 0){
              curr_idx--;
              var img_url = img[curr_idx];
              setimage(img_url);
            }
          });
        });
</script>


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
                      width="256" class="post_image">
                    <?php
                    //echo $this->Html->link('../files/image/attachment/' . $image['dir'] . '/' . $image['attachment']);
                    ?>

                <?php endforeach; ?>
                <div id='popup_item' class="popup-item dispn">
                    <div style="float:right">
                      <input type="button" value="閉じる" class="btn btn-default" id="close"><br>
                    </div>
                    <div style="clear:both"></div>
                    <div style="display: table-cell;">
                      <input type="button" value="前" class="btn btn-default" id="prev">
                    </div>
                    <div id='popup_image' style="display: table-cell;"></div>
                    <div style="display: table-cell;">
                      <input type="button" value="次" class="btn btn-default" id="next">
                    </div>
                </div>

                <p><?php echo h($post['Post']['body']); ?></p>
            </div>
        </div>
    </div>
</div>
