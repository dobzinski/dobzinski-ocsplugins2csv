<?php
  require_once 'conn.php';
?>
<!doctype html>
<html>
  <head>
    <meta name="author" content="Robson Dobzinski">
    <title>OCS :: Exports To CSV</title>
    <style>
      html,body {
        margin: 10px;
        font-family: Arial, Helvetica, sans-serif;
      }
      .content {
        margin-top: 50px;
        margin-bottom: 50px;
      }
      .bottom {
        border-top: 1px solid #666666;
        text-align: center;
        color: #666666;
        padding: 10px;
        }
      .title {
        border-bottom: 1px solid #961B7E;
        color: #961B7E;
        padding: 10px;
      }
      .hepta {
        color: #0040FF;
      }
      .button {
        background-color: #961B7E;
        width: 200px;
        height: 100px;
        color: #ffffff;
        border-radius: 5px 25px;
        text-align: center;
        font-size: 20px;
        margin-left: 20px;
        cursor: pointer;
      }
      .button:hover {
        background-color: #000;
      }
    </style>
  </head>
  <body>
    <h1 class="title">OCS :: Exports To CSV</h1>
    <div class="content">
      <?php
        if (isset($modules)) {
          foreach($modules as $k) {
            echo '<a href="download.php?m='. $k .'" target="_blank"><button class="button">'. $k .'</button></a>';
          }
        }
      ?>

    </div>
    <div class="bottom">Developed by Robson Dobzinki</div>
  </body>
</html>
