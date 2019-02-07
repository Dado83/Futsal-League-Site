<?php

echo '<br>';
echo '<br>';

echo <<<E
<p style='font-weight:bold'>{$this->session->userdata['platform']}</p>
E;

