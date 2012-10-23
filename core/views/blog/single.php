    <article>
      <h1><?php echo $data['title'];?></h1>
      <time pubdate="pubdate">Published on the <?php echo date( 'dS F Y', strtotime( $data['dateCreated'] ) ); ?></time>
      <?php echo $data['content'];?>
      
      <a href="<?php echo URL . 'blog/'?>">&larr; Blog</a>
    </article>
