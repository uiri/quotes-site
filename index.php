<?php
   require('config.php');
   $quotes = file("quotesfile");
   if (is_numeric($_GET['quote']) && 0 < $_GET['quote'] && $_GET['quote'] - 1 < count($quotes))
      $i = $_GET['quote'] - 1;
   else if ($_GET['quote'] != '')
      header('Location: /'.$path,TRUE,302);
   else
      $i = array_rand($quotes);
   require('header.php');
?>
        <h2><?=$title?></h2>
        <br>
        <h1 id="quote"><?php if (!(strpos($quotes[$i], ":"))) { ?>"<?php } ?><?php echo substr($quotes[$i], 0, -1);?><?php if (!(strpos($quotes[$i], ":"))) { ?>"<?php } ?></h1>
        <div class="links">
             <?php if ($i > 1) { ?><a href="/<?=$path?>1">First</a> <?php } else { echo "First "; } if ($i != 0) { ?><a href="/<?=$path . $i ?>">Prev</a><?php } else { echo "Prev "; } ?> <a href="<?=$path?><?=$i + 1 ?>">Link</a> <a href="/<?=$path?>">Random</a> <?php if ($i + 1 < count($quotes)) { ?><a href="/<?=$path?><?=$i + 2 ?>">Next</a><?php } else { echo "Next"; } if ($i + 2 < count($quotes)) {?> <a href="/<?=$path?><?=count($quotes)?>">Last</a><?php } else { echo " Last"; } ?>
	     <br>
	     <a href="/<?=$path?>submit"><?=$submit_title?></a>
        </div>
</body>
</html>