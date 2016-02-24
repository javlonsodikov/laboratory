<?php
$mysqlLink = mysqli_connect("localhost", "root", "", "db_npp", 3306);
mysqli_select_db($mysqlLink, "db_npp");
$res = mysqli_query($mysqlLink, "select * from users");
while ($row = mysqli_fetch_assoc($res))
{
    print_r($row);

}
