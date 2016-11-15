<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SYSMEDCLOUD CHILE | DASHBOARD - PANEL DE CONTROL</title>
    
    <?php
        
        //Cargar archivos css
        foreach ($files['style'] as $file_css){ ?>
    
        <link rel="stylesheet" href="<?=$file_css?>" />
        
    <?php } ?>
</head>

<body data-baseurl="<?=base_url()?>">