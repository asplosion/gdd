<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
        <link rel="stylesheet" type="text/css" href="include/gddmain.css" />
        
        <script type="text/javascript" src="include/gddcommon.js"></script>
        
    </head>
    <body>
        <form action="load.php" method="POST" name="goahead">
        <?php
            $handle = fopen('last.dat', 'r');
            if ($handle) {
                while (($buffer = fgets($handle, 4096)) !== false) {
                    echo "<input type='hidden' name='file' value='" . $buffer . "'>";
                }
                if (!feof($handle)) {
                    echo "Error: unexpected fgets() fail\n";
                }
                fclose($handle);
            }
        ?>
        </form>
        <script type="text/javascript">
            document.goahead.submit();
        </script>
    </body>
</html>