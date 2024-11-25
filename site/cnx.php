<?php
if(!($cnx = mysqli_connect("localhost","root","","exxos"))); 
{
echo mysqli_error($cnx);
}