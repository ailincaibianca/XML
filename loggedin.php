<?php
        if (!isset($_COOKIE['visits'])) $_COOKIE['visits'] = 0;
        $visits = $_COOKIE['visits'] + 1;
        setcookie('visits',$visits,time()+3600*24*365);
        session_start();
        if ( !isset( $_SESSION['count'] ) ) 
        $_SESSION['count'] = 1; else $_SESSION['count']++;
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title></title>
    </head>
    <body class="bg-warning">
        <?php
            $xslDoc=new DOMDocument();
            $xslDoc->load("menu.xsl");
            $xmlDoc=new DOMDocument();
            $xmlDoc->load("logoutMenu.xml");
            $proc=new XSLTProcessor();
            $proc->importStylesheet($xslDoc);
            echo $proc->transformToXml($xmlDoc);
        ?>
        <?php
       $xslDoc1=new DOMDocument();
       $xslDoc1->load("loggedindata.xsl");
       $xmlDoc1=new DOMDocument();
       $xmlDoc1->load("data.xml");
       $proc1=new XSLTProcessor();
       $proc1->importStylesheet($xslDoc1);
       echo $proc1->transformToXml($xmlDoc1);
        ?>
        <div class="alert alert-light" role="alert">
            <a href="insert.php"> Add new item</a>
        </div>
        <?php
        $xslDoc2=new DOMDocument();
        $xslDoc2->load("hyperlink.xsl");
        $xmlDoc2=new DOMDocument();
        $xmlDoc2->load("hyperlink.xml");
        $proc2=new XSLTProcessor();
        $proc2->importStylesheet($xslDoc2);
        echo $proc2->transformToXml($xmlDoc2);
        ?>
        
       
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>

