<?php

echo '<br>';
echo '<br>';

echo <<<E
<p style='font-weight:bold'>{$this->session->userdata['platform']}</p>
E;

echo $this->DBModel->getLastResults('results5')['lastMday'];
echo '<br>';
echo '<br>';
echo $this->DBModel->getMaxMday()->mDay;

