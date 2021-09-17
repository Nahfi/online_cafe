<?php
include 'cox.php';
    foreach ($_POST as $key => $value)
    {
        if(preg_match("/[0-9]+_name/",$key)){
            if($value != ''){
            $key = strtok($key, '_');
            $value = htmlspecialchars($value);
            $sql = "UPDATE emp SET name = '$value' WHERE id = $key;";
            $con->query($sql);
            }
        }
        if(preg_match("/[0-9]+_oprice/",$key)){
            if($value != ''){
            $key = strtok($key, '_');
            $value = htmlspecialchars($value);
            $sql = "UPDATE emp SET pn = '$value' WHERE id = $key;";
            $con->query($sql);
            }
        }
        if(preg_match("/[0-9]+_oq/",$key)){
            if($value != ''){
            $key = strtok($key, '_');
            $value = htmlspecialchars($value);
            $sql = "UPDATE emp SET cat = '$value' WHERE id = $key;";
            $con->query($sql);
            }
        }
        if(preg_match("/[0-9]+_price/",$key)){
            $key = strtok($key, '_');
            $sql = "UPDATE emp SET address = $value WHERE id = $key;";
            $con->query($sql);
        }
        if(preg_match("/[0-9]+_oc/",$key)){
            $key = strtok($key, '_');
            $sql = "UPDATE items SET cat = '$value' WHERE id = $key;";
            $con->query($sql);
        }

        if(preg_match("/[0-9]+_hide/",$key)){
            if($_POST[$key] == 1){
            $key = strtok($key, '_');
            $sql = "UPDATE emp SET active = 0 WHERE id = $key;";
            $con->query($sql);
            } else{
            $key = strtok($key, '_');
            $sql = "UPDATE emp SET active = 1 WHERE id = $key;";
            $con->query($sql);          
            }
        }
    }
    header('location:eminfo.php');

?>