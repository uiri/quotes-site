<?php require('config.php');
if (!$_POST["quote"] || !$_POST["name"]) { 
      require('header.php');?>
        <h2><?=$submit_title?></h2>
        <br>
    <form method="post">
      <div style="float:left;padding-right:5px;"><label for="name">Name: </label><br><br>
        <label for="quote">Quote: </label></div>
      <div style="float:left">
        <input type="text" name="name"><br><br>
        <textarea name="quote"></textarea>
      </div>
      <div style="float:left;padding-left:20px;">
        <input type="submit" value="submit">
      </div>
    </form>
  </body>
</html>
<?php } else {
    $name = $_POST["name"];
    $newquote = $_POST["quote"];
    $newquote = str_replace("\\", "", $newquote);
    $newquote = preg_replace("/\n/", "<br>", $newquote);
    $newquote = preg_replace("/\r/", "", $newquote);
    if (preg_match("/^\"/", $newquote) && preg_match("/\"$/", $newquote)) {
        $newquote = substr($newquote, 1, -1);
    }
    $file = fopen("quotesfile", 'a');
    $newquote .= "\n";
    fwrite($file, $newquote);
    fclose($file);
    $namefile = fopen("submitters", 'a');
    $credit = $name . " submitted " . $newquote;
    fwrite($namefile, $credit);
    fclose($namefile);
    mail($email, $name . " submitted a quote to Shit Mr Steel Says", $name . " submitted the quote \"" . $newquote . "\"");
    header("Location: ".$url.$path);
} ?>
