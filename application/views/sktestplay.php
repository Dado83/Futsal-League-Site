<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TEST PLAY pretraga</title>
    <meta name="description" content="Sve">
    <meta name="keywords" content="Fair Play, Liga Budućih Šampiona, LBŠ, Liga">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#fcc914">
    <link rel="stylesheet" href="/css/stylesSk.css">
    <link rel="shortcut icon" href="/images/sk.ico" type="image/x-icon">

    <script src="/js/skgameindex.js" defer></script>
</head>

<body>
    <form action="#" method="GET">
        <p><a href="https://www.sk.rs/arhiva/rubrika/test-play">
                <span id="sk">Svet Kompjutera</span></a> TEST PLAY(<span id="links"></span>)</p>
        <fieldset>
            <label for="title" class="hidden">Naslov</label>
            <input type="text" id="title" placeholder="The Witcher 3: Wild Hunt">
            <label for="author" class="hidden">Autor</label>
            <input type="text" id="author" placeholder="Miodrag KUZMANOVIĆ">
            <label for="score" class="hidden">Ocjena</label>
            <input type="number" id="score" min="1" max="99" placeholder="90">
            <label for="platform" class="hidden">Platforma</label>
            <input type="text" id="platform" placeholder="PC, PlayStation 4, Xbox One">
            <input type="submit" id="search" value="Pretraga">
            <input type="reset" id="reset" value="Reset">
        </fieldset>
    </form>
    <table>
        <thead>
            <tr>
                <th>Datum</th>
                <th>Naslov</th>
                <th>Autor</th>
                <th>Ocjena</th>
                <th class="hidden">Platforma</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</body>