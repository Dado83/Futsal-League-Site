<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta name="description" content="Fair Play LBŠ website">
    <meta name="keywords" content="Fair Play, Liga Budućih Šampiona, LBŠ, Liga">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#fcc914">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" defer></script>
    <script src="/js/scripts.js" defer></script>
    <script src="/js/Chart.bundle.min.js" defer></script>
</head>

<body>
    <div class="fpLogo">
        <a href="/"><img id="logo" src="/images/grb.png" /></a>
        <span class="title1">Fair Play LBŠ</span>
        <span class="title2">Liga Budućih Šampiona</span>
        <?php if ($this->session->role == "admin"): ?>
        <form class="login" action="/liga/logout" method="POST">
            <input type="submit" value="Logout">
            <p>Views/Visitors: <?=$this->session->lastHourViews->vis?>/<?=$this->session->lastHourVisitors->vis?></p>
            <p></p>
        </form>
        <?php else: ?>
        <form class="login" action="/liga/login" method="POST">
            <span><?=$this->session->loginError?></span>
            <input type="text" name="user" placeholder="user" size="1" maxlength="20">
            <input type="password" name="pass" placeholder="pass" size="1" maxlength="20">
            <input type="submit" value="Login">
        </form>
        <?php endif?>
    </div>
    <ul id="youthSel">
        <li><a href="/liga/index/2006">2006</a></li>
        <li><a href="/liga/index/2007">2007</a></li>
        <li><a href="/liga/index/2008">2008</a></li>
        <li><a href="/liga/index/2009">2009</a></li>
        <li><a href="/liga/index/2010">2010</a></li>
        <li><a href="/liga/rezultati">Rezultati</a> </li>
        <li><a href="/liga/raspored">Raspored</a></li>
        <?php if ($this->session->role == 'admin'): ?>
        <li><a href="/liga/admin">Admin</a></li>
        <?php endif?>
    </ul>