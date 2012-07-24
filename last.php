<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
        <link rel="stylesheet" type="text/css" href="include/gddmain.css" />
        
        <script type="text/javascript" src="include/gddcommon.js"></script>
        
    </head>
    <body>
        <?php
            $handle = fopen('last.dat', 'r');
            if ($handle) {
                while (($buffer = fgets($handle, 4096)) !== false) {
                    $loc = 'load.php?file=' . $buffer;
                    header ("Location: $loc");
                }
                if (!feof($handle)) {
                    echo "Error: unexpected fgets() fail\n";
                }
                fclose($handle);
            }
        ?>
    </body>
</html>