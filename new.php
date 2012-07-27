<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
        <link rel="stylesheet" type="text/css" href="include/gddmain.css" />
        
        <script type="text/javascript" src="include/gddcommon.js"></script>

    </head>
    <body>
        <div class="title">
            <?php $file = $_POST['title']; echo $file; ?>
        </div>
        <?php       
            $handle = fopen('last.dat', 'w');
            if ($handle) {
                if (fwrite($handle, $file) === FALSE) {
                    echo "Cannot write to last.dat file";
                    exit;
                }
                fclose($handle);
            }
            
            $handle = fopen('projects.dat', 'a+');
            $newfile = $file . "\n";
            if ($handle) {
                if (fwrite($handle, $newfile) === FALSE) {
                    echo "Cannot write to projecst.dat file";
                    exit;
                }
                fclose($handle);
            }
            
            if (!copy('default.dat', 'projects/' . $file . '.xml')) {
                echo "failed to copy default.dat to " . $file . ".xml \n";
            }
        ?>   
    </body>
</html>