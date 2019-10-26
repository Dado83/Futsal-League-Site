<div class="form">
    <form action="/liga/unosKola" method="POST">
        <fieldset>
            <legend>Unos rezultata <?php echo $game->m_day ?>. kola</legend>
            <table>
                <tr>
                    <th>
                        godiste
                        <input type="hidden" name="mday" value="<?php echo $game->m_day ?>">
                        <input type="hidden" name="id" value="<?php echo $game->id ?>">
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
                        2010
                    </td>
                    <td>
                        <input type="number" name="home10" value="0" min="0" max="50">
                    </td>
                    <td>
                        <input type="number" name="away10" value="0" min="0" max="50">
                    </td>
                </tr>
                <tr>
                    <td>
                        2009
                    </td>
                    <td>
                        <input type="number" name="home9" value="0" min="0" max="50">
                    </td>
                    <td>
                        <input type="number" name="away9" value="0" min="0" max="50">
                    </td>
                </tr>
                <tr>
                    <td>
                        2008
                    </td>
                    <td>
                        <input type="number" name="home8" value="0" min="0" max="50">
                    </td>
                    <td>
                        <input type="number" name="away8" value="0" min="0" max="50">
                    </td>
                </tr>
                <tr>
                    <td>
                        2007
                    </td>
                    <td>
                        <input type="number" name="home7" value="0" min="0" max="50">
                    </td>
                    <td>
                        <input type="number" name="away7" value="0" min="0" max="50">
                    </td>
                </tr>
                <tr>
                    <td>
                        2006
                    </td>
                    <td>
                        <input type="number" name="home6" value="0" min="0" max="50">
                    </td>
                    <td>
                        <input type="number" name="away6" value="0" min="0" max="50">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="submit" value="Snimi u bazu">
                    </td>
                </tr>
            </table>

        </fieldset>
    </form>
</div>
