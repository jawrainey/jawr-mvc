<?php foreach ($data as $result) { ?>
      <article>
        <h2><?php echo $result['title']?></h2>
        <?php echo $result['content']?>
      </article>
      <hr>
<?php } ?>
