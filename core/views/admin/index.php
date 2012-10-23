      <h1>Admin area</h1>
      <article>
        <h3 class="title"><a href="<?php echo URL . 'admin/create/';?>">Write an article</a></h3>
        <ul class="crud">
          <li><a href="<?php echo URL . 'admin/create/';?>"><i class="icon-pencil"></i></a></li>
        </ul>
      </article>
<?php foreach ($data as $result) { ?>
      <article>
        <h3 class="title"><a href="<?php echo URL . 'blog/article/' . $result['uri'] . '/';?>"><?php echo $result['title'];?></a></h3>
        <ul class="crud">
          <li><a href="<?php echo URL . 'admin/update/' . $result['uri'] . '/';?>"><i class="icon-pencil"></i></a></li>
          <li><a href="<?php echo URL . 'admin/delete/' . $result['uri'] . '/';?>"><i class="icon-trash"></i></a></li>
        </ul>
      </article>
<?php } ?>
      <p><a href="<?php echo URL . 'admin/logout'?>"><i class="icon-signout"></i></a></p>
