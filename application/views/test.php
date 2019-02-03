<?php

echo '<br>';
echo '<br>';

foreach ($this->session->userdata() as $a) {
    echo "<br>$a";
}

//$this->session->sess_destroy();
var_dump(get_cookie('time'));