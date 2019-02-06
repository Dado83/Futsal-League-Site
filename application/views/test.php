<?php

echo '<br>';
echo '<br>';

foreach ($this->session->userdata() as $a) {
    echo "<br>$a";
}



$query = $this->DBModel->getUser('admin');

echo ($query != NULL) ? $query->password : 'sdf';

