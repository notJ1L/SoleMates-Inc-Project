<!DOCTYPE html>
<html>
<head>
    <title>Image Test</title>
</head>
<body>
    <h1>Direct Image Test</h1>
    <img src="nike_dunkpanda.avif" alt="Nike" style="border: 2px solid blue; width: 200px;">
    <img src="addidas_ultraboost_light.webp" alt="Adidas" style="border: 2px solid red; width: 200px;">
    <img src="nb_550.jpg" alt="NB" style="border: 2px solid green; width: 200px;">
    
    <h2>File Paths:</h2>
    <?php
    $files = ['nike_dunkpanda.avif', 'addidas_ultraboost_light.webp', 'nb_550.jpg'];
    foreach ($files as $file) {
        echo "$file: " . (file_exists($file) ? "EXISTS" : "MISSING") . "<br>";
    }
    ?>
</body>
</html>
