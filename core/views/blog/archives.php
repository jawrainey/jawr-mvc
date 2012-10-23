      <h1>Archives</h1>
<?php foreach ($data as $result) { ?>
      <article>
        <h3 class="bob"><a href="<?php echo URL . 'blog/article/' . $result['uri'] . '/';?>"><?php echo $result['title'];?></a></h3>
        <time pubdate="pubdate" class="datee"><?php echo date( 'dS F Y', strtotime( $result['dateCreated'] ) );?></time>
      </article>
<?php } ?>
