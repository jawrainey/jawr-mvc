      <article>
        <h1><a href="<?php echo URL; ?>blog/article/<?php echo $data[0]['uri']?>/"><?php echo $data[0]['title'];?></a></h1>
        <time pubdate="pubdate">Published on the <?php echo date( 'dS F Y', strtotime( $data[0]['dateCreated'] ) ); ?></time>
        <?php echo $data[0]['content'];?>
      
      </article>
