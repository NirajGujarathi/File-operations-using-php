  <?php
   exec("notepad", $output, $return);
    echo "The command returned $return, and output:\n";
    echo "<br><pre>";
    var_dump($output);
    echo "</pre>";
    ?>