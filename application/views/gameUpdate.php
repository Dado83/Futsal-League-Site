<div>
    <form action="/liga/ispravka_kola" method="POST">
        <fieldset>
            <legend>Unos rezultata <?php echo $game->m_day ?>. kola</legend>
            <table>
                <tr>
                    <th>
                        godiste
                        <input type="hidden" name="mday" value="<?php echo $game->m_day ?>"
                    </th>
                    <th>
                        domacin
                    </th>
                    <th>
                        gost
                    </th>
                </tr>
                <tr>
                    <td>

                    </td>
                    <td>
                        <?php echo $game->home ?>
                        <input type="hidden" name="homeID" value="<?php echo $game->home_team ?>">
                        <input type="hidden" name="home" value="<?php echo $game->home ?>">
                    </td>
                    <td>
                        <?php echo $game->away ?>
                        <input type="hidden" name="awayID" value="<?php echo $game->away_team ?>">
                        <input type="hidden" name="away" value="<?php echo $game->away ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        2009
                    </td>
                    <td>
                        <input type="number" name="home9">
                    </td>
                    <td>
                        <input type="number" name="away9">
                    </td>
                </tr>
                <tr>
                    <td>
                        2008
                    </td>
                    <td>
                        <input type="number" name="home8">
                    </td>
                    <td>
                        <input type="number" name="away8">
                    </td>
                </tr>
                <tr>
                    <td>
                        2007
                    </td>
                    <td>
                        <input type="number" name="home7">
                    </td>
                    <td>
                        <input type="number" name="away7">
                    </td>
                </tr>
                <tr>
                    <td>
                        2006
                    </td>
                    <td>
                        <input type="number" name="home6">
                    </td>
                    <td>
                        <input type="number" name="away6">
                    </td>
                </tr>
                <tr>
                    <td>
                        2005
                    </td>
                    <td>
                        <input type="number" name="home5">
                    </td>
                    <td>
                        <input type="number" name="away5">
                    </td>
                </tr>
            </table>                   
            <input type="submit" value="Snimi u bazu">
        </fieldset>
    </form>
</div>
