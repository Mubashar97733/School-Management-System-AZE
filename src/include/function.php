<?php

include("main-function.php");

if (isset($_SESSION['name'])) {
    $st_con = array(
        "us_id" => $_SESSION['status']
    );
    $st = display_where("user_status", $st_con);
    $status = "";
    foreach ($st as $sta) {
        $status = $sta['us_status'];
    }

    $cam_con = array(
        "campus_id" => $_SESSION['campus']
    );
    $cam = display_where("campus", $cam_con);
    $campus = "";
    foreach ($cam as $camp) {
        $campus = $camp['campus_name'];
    }

    function status($st)
    {
        $st_con = array(
            "us_id" => $st
        );
        $st = display_where("user_status", $st_con);
        $status = "";
        foreach ($st as $sta) {
            $status = $sta['us_status'];
        }
        return $status;
    }

    function status_badge($st_color)
    {
        if (status($st_color) == "Principal") {
            echo "badge-success";
        } else {
            echo "badge-secondary";
        }
    }

    function staff_post($post)
    {
        $p_con = array(
            "sp_id" => $post
        );
        $post_return = "";
        $p = display_where("staff_post", $p_con);
        if($p){
            foreach($p as $po){
                $post_return = $po['sp_post'];
            }
        }
        return $post_return;
    }

    function staff_post_badge($post){
        $p_con = array(
            "sp_id" => $post
        );
        $post_return = "";
        $p = display_where("staff_post", $p_con);
        foreach($p as $po){
            $post_return = $po['sp_badge'];
        }
        echo $post_return;
    }

    function classes($class)
    {
        switch ($class) {
            case "-2":
                return "Play-Group";
            case "-1":
                return "Nersury";
            case "0":
                return "Prep";
            case "1":
                return "One";
            case "2":
                return "Two";
            case "3":
                return "Three";
            case "4":
                return "Four";
            case "5":
                return "Five";
            case "6":
                return "Six";
            case "7":
                return "Seven";
            case "8":
                return "Eight";
        }
    }

    function month($m)
    {
        switch ($m) {
            case "1":
                return "January";
            case "2":
                return "Febuary";
            case "3":
                return "March";
            case "4":
                return "April";
            case "5":
                return "May";
            case "6":
                return "June";
            case "7":
                return "July";
            case "8":
                return "August";
            case "9":
                return "September";
            case "10":
                return "October";
            case "11":
                return "November";
            case "12":
                return "December";
        }
    }

    function breadcrumb($data)
    {
        ?>
        <div class="title">
            <h4><?php echo $data[0]; ?></h4>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $data[2]; ?>"><?php echo $data[1]; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $data[3]; ?></li>
            </ol>
        </nav>
        <?php
    }
}
