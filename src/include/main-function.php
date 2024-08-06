<?php

include("connection.php");
session_start();

function logout()
{
    if (isset($_GET['logout'])) {
        session_destroy();
    ?>
        <script>
            setTimeout(function() {
                window.location = "index.php";
            }, 0)
        </script>
    <?php
    }
}

function display($table)
{
    include "connection.php";
    $q = "SELECT * FROM " . $table;
    $results = mysqli_query($connect, $q);
    if (mysqli_num_rows($results) > 0) {
        while ($data = mysqli_fetch_array($results)) {
            $ary[] = $data;
        }
        return $ary;
    } else {
        return false;
    }
    //mysqli_free_result($results);
}

function display_where($table, $condition)
{
    include "connection.php";
    $where = "";
    foreach ($condition as $ind => $val) {
        $where .= $ind . "='" . $val . "' AND ";
    }
    $where = substr($where, 0, -5);
    $query = "SELECT * FROM " . $table . " WHERE " . $where;
    $results = mysqli_query($connect, $query);
    $ar = array();
    if (mysqli_num_rows($results) > 0) {
        while ($data = mysqli_fetch_array($results)) {
            $ary[] = $data;
        }
        return $ary;
    } else {
        return false;
    }
    //mysqli_free_result($results);
}

function del($table, $condition)
{
    $where = "";
    include "connection.php";
    foreach ($condition as $ind => $val) {
        $where .= $ind . " = " . $val . " AND ";
    }
    $where = substr($where, 0, -5);
    $q = "DELETE FROM " . $table . " WHERE " . $where;
    $q_run = mysqli_query($connect, $q);
    return $q_run;
}

function insert($table, $data)
{
    $response = 0;
    include "connection.php";
    $query = "INSERT INTO " . $table . " ( " . implode(" , ", array_keys($data)) . ")  VALUES ('" . implode("','", array_values($data)) . "')";
    $q_run = mysqli_query($connect, $query);
    echo mysqli_error($connect);
    if ($q_run) {
        $response = 1;
    } else {
        $response = 0;
    }
    return $response;
}

function update($table, $data, $where)
{
    include "connection.php";
    $sets = "";
    foreach ($data as $ind => $val) {
        $sets .= $ind . " = '" . $val . "', ";
    }
    $sets = substr($sets, 0, -2);
    $wh = "";
    foreach ($where as $ind => $val) {
        $wh .= $ind . " = '" . $val . "' AND ";
    }
    $wh = substr($wh, 0, -5);
    $q = "UPDATE " . $table . " SET " . $sets . " WHERE " . $wh;
    $q_run = mysqli_query($connect, $q);
    //echo mysqli_error($con);
    return $q_run;
}