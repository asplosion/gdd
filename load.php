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
            $file = $_POST['file'];
            $newfile = $file . 'xml';
            $handle = fopen($newfile, 'r');
            if ($handle) {
                while (($buffer = fgets($handle, 4096)) !== false) {
                    echo $buffer;
                }
                if (!feof($handle)) {
                    echo "Error: unexpected fgets() fail\n";
                }
                fclose($handle);
            } 
            
            $handle2 = fopen('last.dat', 'w');
            if ($handle2) {
                if (fwrite($handle2, $file) === FALSE) {
                    echo "Cannot write to last.dat file";
                    exit;
                }
                fclose($handle2);
            } 
        ?>
    </body>
</html>
