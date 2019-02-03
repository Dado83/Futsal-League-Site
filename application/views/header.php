<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="description" content="Fair Play LBŠ website">
        <meta name="keywords" content="Fair Play, Liga Budućih Šampiona, LBŠ, Liga">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/styles.css">
        <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" defer></script>
        <script src="/js/scripts.js" defer></script>
    </head>
    <body>
        <div class="fpLogo">
            <a href="/"><img id="logo" src="/images/grb.png"/></a>
            <span class="title1">Fair Play</span><span class="title2">Liga Budućih Šampiona</span>
            <?php
            if ($this->session->role == 'admin') {
                echo <<<EOT
                <form class="login" action="/liga/logout" method="POST">
                <span><a href='/liga/admin'>Admin</a></span>
                <input type="submit" value="Logout">
                </form>
EOT;
            } else {
                echo <<<EOT
                <form class="login" action="/liga/login" method="POST">
                <input type="text" name="user" placeholder="username" size="10" maxlength="20">
                <input type="password" name="pass" placeholder="password" size="10" maxlength="20">
                <input type="submit" value="Login">
                </form>
EOT;
            }
            ?>

        </div>
        <ul class="logos">
            <?php
            foreach ($teams as $t) {
                echo <<<EOT
                <li class='logosLi'>
                <a href='/liga/ekipa/$t->id'>
                <img src='/images/logos/$t->id.png'>
                <p>$t->team_name</p>
                </a>
                </li>
EOT;
            }
            ?>
        </ul>
