<?php 

$pass= password_hash("employd1",PASSWORD_DEFAULT,['cost'=>12]);
echo $pass;


?>