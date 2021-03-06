
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
   .hide {
     Visibility : hidden;
   }
   .popup-item{
      position:fixed;     /* 位置の固定 */
      top: 50%;           /* 表示位置(真ん中に表示) */
      left: 50%;          /* 表示位置(真ん中に表示) */
      margin: -25%;
      padding: 0;         /* 余白の削除 */
      z-index:1001;       /* 要素のz座標 */
    }
    .btn-left{
       position:fixed;     /* 位置の固定 */
       top: 50%;           /* 表示位置(真ん中に表示) */
       left: 50%;          /* 表示位置(真ん中に表示) */
       margin-left: -25%;
       padding: 0;         /* 余白の削除 */
       z-index:1002;       /* 要素のz座標 */
       opacity : 0.5;
     }
     .btn-right{
        position:fixed;     /* 位置の固定 */
        top: 50%;           /* 表示位置(真ん中に表示) */
        right: 50%;          /* 表示位置(真ん中に表示) */
        margin-right: -25%;
        padding: 0;         /* 余白の削除 */
        z-index:1002;       /* 要素のz座標 */
        opacity : 0.5;
      }
 -->
 </style>
<script type="text/javascript">
        var img = [];
        var img_idx = {};
        var curr_idx;
        $(function(){
          var setimage = function(img_url){
            var htm = '';
            htm += '<img src="' + img_url + '" width="' + Math.floor(window.innerWidth/2) + 'px"/>';
            $('#popup_item').hide();
            $('#popup_image').html(htm);
            $('#popup_item').fadeIn(500);
            if (curr_idx == 0){
              $('#prev').addClass('hide');
            } else {
              $('#prev').removeClass('hide');
            }
            if (curr_idx == img.length-1){
              $('#next').addClass('hide');
            } else {
              $('#next').removeClass('hide');
            }
          };

          $('.post_image').click(function(e){
             //console.log($(e.target).attr('src'));
             var i;
             var img_grp = $(e.target).attr('img_grp');
             img = [];
             img_idx = {};
             for(i = 0 ; i < $('.post_image[img_grp="' + img_grp + '"]').length ; i++){
                 //console.log($($('.post_image[img_grp="' + img_grp + '"]')[i]).attr('src'));
                 var tmp = $($('.post_image[img_grp="' + img_grp + '"]')[i]).attr('src');
                 img[i] = tmp;
                 img_idx[tmp] = i;
             }
             var img_url = $(e.target).attr('src');
             curr_idx = img_idx[img_url];
             setimage(img_url);
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
                      width="256" class="post_image" img_grp="imggrp1">
                    <?php
                    //echo $this->Html->link('../files/image/attachment/' . $image['dir'] . '/' . $image['attachment']);
                    ?>

                <?php endforeach; ?>
                <div id='popup_item' class="popup-item dispn">
                    <div style="float:right">
                      <input type="button" value="閉じる" class="btn btn-default" id="close"><br>
                    </div>
                    <div style="clear:both"></div>
                    <div class="btn-left">
                      <input type="button" value="前" class="btn btn-default" id="prev">
                    </div>
                    <div id='popup_image'></div>
                    <div class="btn-right">
                      <input type="button" value="次" class="btn btn-default" id="next">
                    </div>
                </div>

                <p><?php echo h($post['Post']['body']); ?></p>
            </div>
        </div>
    </div>
</div>
