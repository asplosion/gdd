<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
        <link rel="stylesheet" type="text/css" href="include/gddmain.css" />
        
        <script type="text/javascript" src="include/gddcommon.js"></script>
        
    </head>
    <body>
        <div class="title">Asplosion Media Game Design Document</div>
        <div class="info">
            <?php 
                $file = __FILE__;
                $lastmod = date("m/d/Y h:iA", filemtime($file)-10800);
                echo "v1.0: ".$lastmod;
            ?>
        </div>
        <div class="menu" onClick="showdiv('new');">Start New</div>
        <div id="new" class="submenu">
            <form action="new.php" method="POST">
                <label for="title">Title:</label>
                <input type="text" name="title" size="25" />
                <input type="submit" />
            </form>
        </div>
        <div class="menu" onClick="jump('last.php')">Continue Last</div>
        <div class="menu" onClick="showdiv('load');">Load...</div>
        <div id="load" class="submenu">
            <form action="load.php" method="POST">
                <?php 
                    $file = 'projects.dat'; 
                    $handle = fopen($file, "r");
                    if ($handle) {
                        while (($buffer = fgets($handle, 4096)) !== false) {
                            echo '<input type="radio" name="file" value="' . $buffer .'">' . $buffer . '</input><br />';
                        }
                        if (!feof($handle)) {
                            echo "Error: unexpected fgets() fail\n";
                        }
                        fclose($handle);
                    }
                ?>
                <label for="pass">Password:</label>
                <input type="password" name="pass" size="25" />
                <input type="submit" />
            </form>
        </div>
    </body>
</html>
