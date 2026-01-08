<!doctype html>
<html lang="en">
  <head>
    <?php include("inc/header.php");?>
    <script>
       function onSubmit(token) {
         document.getElementById("contact_form").submit();
       }
     </script>
  </head>
  <body>
  <script>
      AOS.init();
    </script>
    <?php include("inc/nav.php");?>
    <?php include("inc/contact-cont.php");?>
    <?php include("inc/footer.php");?>
  </body>
</html>