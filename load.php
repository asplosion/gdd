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
            <?php $file = $_POST['file']; echo $file; ?>
        </div>
        <?php
            $newfile = 'projects/' . $file . '.xml';
            
            $handle2 = fopen('last.dat', 'w');
            if ($handle2) {
                if (fwrite($handle2, $file) === FALSE) {
                    echo "Cannot write to last.dat file";
                    exit;
                }
                fclose($handle2);
            }
            
            $file = $newfile;
            $depth = array();

            function startElement($parser, $name, $attrs) 
            {
                global $depth;
                for ($i = 0; $i < $depth[$parser]; $i++) {
                    echo "  ";
                }
                echo "$name\n";
                $depth[$parser]++;
            }

            function endElement($parser, $name) 
            {
                global $depth;
                $depth[$parser]--;
            }

            $xml_parser = xml_parser_create();
            xml_set_element_handler($xml_parser, "startElement", "endElement");
            if (!($fp = fopen($file, "r"))) {
                die("could not open XML input");
            }

            while ($data = fread($fp, 4096)) {
                if (!xml_parse($xml_parser, $data, feof($fp))) {
                    die(sprintf("XML error: %s at line %d",
                    xml_error_string(xml_get_error_code($xml_parser)),
                    xml_get_current_line_number($xml_parser)));
                }
            }
            xml_parser_free($xml_parser);
        ?>
    </body>
</html>
