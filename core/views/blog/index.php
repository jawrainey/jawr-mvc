<?php foreach ($data as $result) { ?>
      <article>
        <h2><a href="<?php echo URL . 'blog/article/' . $result['uri'] . '/';?>"><?php echo $result['title'];?></a></h2>
        <time pubdate="pubdate">Published on the <?php echo date( 'dS F Y', strtotime( $result['dateCreated'] ) ); ?></time>
        <?php preg_match( "/<p>(.*)<\/p>/", $result['content'], $matches ); echo $matches[0]; ?>
        
        <p class="readmore"><a href="<?php echo URL . 'blog/article/' . $result['uri'] . "/";?>" class="readmore">Read more&hellip;</a></p>
      </article>
<?php } ?>
      <p id="forward"><a href="<?php echo URL . 'blog/archives/'?>">Older entries →</a></p>
