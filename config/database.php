<?php
$mysql["state"] = "project";
if($config["state"] == "local")
{
    $mysql["server"] = "10.25.100.61";
    $mysql["username"] = "inspira";
    $mysql["password"] = "inzpire2020!!";
    $mysql["database"] = "mmp_dev";
}
if($config["state"] == "dev_new")
{
    $mysql["server"] = "10.25.100.61";
    $mysql["username"] = "inspira";
    $mysql["password"] = "inzpire2020!!";
    $mysql["database"] = "mmp_dev";
}
if($config["state"] == "project")
{
    $mysql["server"] = "10.25.100.61";
    $mysql["username"] = "inspira";
    $mysql["password"] = "inzpire2020!!";
    $mysql["database"] = "mmp_dev";
}
if($config["state"] == "center")
{
    $mysql["server"] = "202.6.224.234:3366";
    $mysql["username"] = "inspiradb";
    $mysql["password"] = "inzpire2020!!";
    $mysql["database"] = "mmp_dev";
}
