  <section class="footer">
    <footer>
      <p><span class="bold">Developed by: </span>Wavamuno Brandon Elijah</p>
      <p><span class="bold">Contact: </span>+256 753659098, brandonelijah099@gmail.com</p>
      <p><span class="bold">Copyright 2019.</span> All rights reserved.</p>
    </footer>
  </section>

  <?php if($type == 'error-page') { ?>
    <script type="text/javascript" src="../js/functions.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <script type="text/javascript" src="../js/form.js"></script>

  <?php }
      else {
        if($title == 'Job Postr Homepage') {?>
        <script type="text/javascript" src="js/functions.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

  <?php } else {?>
      <script type="text/javascript" src="js/functions.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
      <script type="text/javascript" src="js/form.js"></script>
  <?php }
    }
  ?>
</body>
</html>
