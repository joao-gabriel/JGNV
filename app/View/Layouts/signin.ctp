
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JGNV <?php echo $title_for_layout; ?></title>


    <?php
    echo $this->Html->meta('icon');
    echo $this->Html->css('bootstrap.min');
    echo $this->Html->css('signin');
    ?>

  </head>

  <body>

    <div class="container">

      <?php echo $content_for_layout; ?>

    </div> <!-- /container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <?php
    echo $this->Html->script('bootstrap.min');
    echo $this->fetch('script');
    ?>
    <script>
      $('.message').addClass('label label-danger center-block bottom30');
    </script>

  </body>
</html>
