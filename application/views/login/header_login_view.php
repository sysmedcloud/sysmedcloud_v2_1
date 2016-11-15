<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?=$titulo;?></title>

    <?php
    foreach ($files['style'] as $file_css){ ?>
    
        <link rel="stylesheet" href="<?=$file_css?>" />
        
    <?php } ?>

</head>

<body class="gray-bg">