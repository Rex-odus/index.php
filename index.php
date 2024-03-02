<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        $current_directory = basename(__DIR__);
        echo $current_directory;
        ?>
    </title>
</head>
<body>
    <h1>
        <?php
        echo $current_directory;
        ?>
    </h1>
    <ul>
        <?php
        $dir = './';
        $files = array_diff(scandir($dir), array('..', '.', 'index.php')); // Exclusief 'index.php'
        echo "<li><a href='../'>..</a></li>";
        foreach ($files as $entry) {
            if (!is_dir($dir . '/' . $entry)) {
                $filesize = filesize($dir . '/' . $entry);
                $size = formatSizeUnits($filesize);
                echo "<li><a href='$entry' download>$entry</a> - $size</li>";
            } else {
                echo "<li><a href='./$entry'>$entry/</a></li>";
            }
        }
        function formatSizeUnits($bytes){
            if ($bytes >= 1073741824) {
                $bytes = number_format($bytes / 1073741824, 2) . ' GB';
            } elseif ($bytes >= 1048576) {
                $bytes = number_format($bytes / 1048576, 2) . ' MB';
            } elseif ($bytes >= 1024) {
                $bytes = number_format($bytes / 1024, 2) . ' KB';
            } elseif ($bytes > 1) {
                $bytes = $bytes . ' bytes';
            } elseif ($bytes == 1) {
                $bytes = $bytes . ' byte';
            } else {
                $bytes = '0 bytes';
            }
            return $bytes;
        }
        ?>
    </ul>
</body>
</html>
