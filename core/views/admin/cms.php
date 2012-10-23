      <article>
<?php if( !empty($errors) ) { ?>
        <ul id="error">
<?php foreach( $errors as $error ) { ?>
          <li><b>ERROR: </b><?php echo $error; ?></li>
<?php } ?>
        </ul>
<?php } ?>
        <h1><a href="<?php echo URL . 'admin/in';?>"><?php echo $data['mode']?> post</a></h1>  
        <form name="george" method="post" action="<?php echo URL . 'admin/' . $data['action'] . '/' . $data['uri']?>" >
         
          <select name="tags">
            <option ><?php echo $data['tags'] ?></option>
            <option name="about" value="about">About</option>
            <option name="blog" value="blog">Blog</option>
            <option name="projects" value="projects">Projects</option>
          </select>
             
          <label for="title">Post title:</label>
          <input name="title" type="text" placeholder="Enter the title" value="<?php echo $data['title'] ?>" />
          
          <label for="content">Article content:</label>
          <textarea name="content" rows="25" placeholder="Enter the content" ><?php echo $data['content'] ?></textarea>   
          
<?php if( $data['mode'] == "Update" ) { ?>
          <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
<?php } ?>
          
          <input type="submit" name="submit" value="Publish" />    
          
        </form>
      </article>
