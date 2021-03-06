<p><?=$this->session->passwordChanged?></p>
<p><?=$this->session->passwordNotChanged?></p>
<div id="mForm" class="modalForm">
    <form action="/liga/passwordChange" method="post">
        <fieldset>
            <label for="user">Korisnik</label>
            <input type="text" name="user"><br>
            <label for="oldPassword">Šifra</label>
            <input type="password" name="password"><br>
            <label for="newPassword">Nova šifra</label>
            <input type="password" name="newPassword"><br>
            <input type="submit" value="Promijeni šifru">
        </fieldset>
    </form>
</div>
<div id="adminCards">
    <div class="adminCards"><a href="/liga/bilten"><img src="/images/icons/newsletter.svg" style="width: 100%" />Bilten</a>
    </div>
    <div class="adminCards"><a href="/liga/metrics"><img src="/images/icons/charts.svg" style="width: 100%" />Metrics</a>
    </div>
    <div id="passwordChange" class="adminCards"><img src="/images/icons/pass.svg" style="width: 100%" />Password
    </div>
</div>
<table class="admin">
    <p>Odigrane utakmice:</p>
    <tr>
        <th>kolo</th>
        <th>domacin</th>
        <th>gost</th>
        <th>termin</th>
    </tr>
    <?php foreach ($results as $row): ?>
    <tr>
        <td class="oddResRow"><?=$row->m_day?></td>
        <td><?=$row->home_team?></td>
        <td><?=$row->away_team?></td>
        <td><a class='button' href='/liga/brisanjeKola/<?=$row->id?>' onclick="return confirm('Brišem zadnje kolo?')">Briši</a></td>
    </tr>
    <?php endforeach?>
</table>
<table class="admin">
    <p>Raspored:</p>
    <tr>
        <th>kolo</th>
        <th>domacin</th>
        <th>gost</th>
        <th>termin</th>
    </tr>
    <?php foreach ($matchPairs as $row): ?>
    <tr>
        <td class="oddResRow"><?=$row->m_day?></td>
        <td><?=$row->home_team?></td>
        <td><?=$row->away_team?></td>
        <td><a class='button' href='/liga/formIn/<?=$row->id?>'>Unos</a></td>
    </tr>
    <?php endforeach?>
</table>