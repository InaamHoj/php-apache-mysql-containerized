<Form action="loginverify.php" method="POST">

 <?php if(isset($_GET['error'])) { ?>
      <p> <?php echo "cannot connect"; ?> </p>
<?php } ?>

  <input type="text" name="useremail" class="inputs" placeholder="Adresse Mail" />
        <br /><br />
  <input type="text" name="userpassword" class="inputs" placeholder="Mot de passe" />
        <br /><br />
  <input class="submit" type="submit" value="Login" />
        <br><br>
        
</Form>

