      <article id="login-form">
<?php if( !empty($errors) ) { ?>
        <ul id="error">
<?php foreach( $errors as $error ) { ?>
          <li><b>ERROR: </b><?php echo $error; ?></li>
<?php } ?>
        </ul>
<? } ?>
        <h1>Log in</h1>
        <form method="post" action="<?php echo URL . 'login/';?>">
          <label for="username">Username:</label>
          <input name="username" type="text" placeholder="Enter your username." value="<?php echo $data['username'];?>"/>
             
          <label for="password">Password:</label>
          <input name="password" type="password" placeholder="Enter your password" />
          
          <input type="submit" value="Log in" />
        </form>
      </article>
