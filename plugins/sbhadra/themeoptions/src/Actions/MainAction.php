 <?php
 $activated = jw_current_theme();
 //dd($activated);
    $fileName=jw_current_theme();
    $filePath = __DIR__ . '/theme-action/' . $fileName . '.php';
        
    if (file_exists($filePath)) {
        include($filePath);
    } else {
        $filePath = __DIR__ . '/theme-action/default.php';
        include($filePath);
    }