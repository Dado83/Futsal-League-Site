<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="description" content="Fair Play LBŠ website">
        <meta name="keywords" content="Fair Play, Liga Budućih Šampiona, LBŠ, Liga">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="shortcut icon" href="<?php base_url() ?>/images/favicon.ico" type="image/x-icon">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" defer></script>
        <script src="js/scripts.js" defer></script>
    </head>
    <body>
        <div class="fpLogo">
            <a href="<?php base_url() ?>"><img id="logo" src="<?php base_url() ?>/images/grb.png"/></a>
            <span class="title1">Fair Play</span><span class="title2">Liga Budućih Šampiona</span>
        </div>
        <ul class="logos">
            <li class="logosLi" th:each="tim: ${teamLogos}">
                <a th:class="${tim?.teamName}" th:href="@{/team(index = ${tim?.id})}">
                    <img th:class="${tim?.teamName}" th:src="@{'logos/' + ${tim?.id} + '.png'}"/>
                    <p th:text="${tim?.teamName}"></p>
                </a>       
            </li>
        </ul>
