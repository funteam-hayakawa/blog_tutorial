<!-- File: /app/View/Posts/add.ctp -->



<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

<div class="blog-masthead">
  <div class="container">
    <nav class="blog-nav">
      <?php echo $this->Html->link(
          'インデックス',
          array('controller' => 'posts', 'action' => 'index')
      ); ?>

    </nav>
  </div>
</div>
<div class="container">

    <h1>zip code</h1>


    <form action="#" onsubmit="return false;">
    郵便番号：<br />
    <input type="text" name="zip01" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','pref01','addr01');"><br />
    住所：<br />
    <input type="text" name="pref01" size="20"><input type="text" name="addr01" size="60">
    </form>


</div>
