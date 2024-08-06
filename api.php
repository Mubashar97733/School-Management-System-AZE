<?php

include("src/include/function.php");;

if (isset($_REQUEST['log_un'])) {
    $name = $_REQUEST['log_un'];
    $pass = $_REQUEST['log_pass'];
    $condition = array(
        "u_un" => $name,
        "u_pass" => $pass
    );
    $data = display_where("user", $condition);
    if ($data) {
        foreach ($data as $result) {
            $_SESSION['id'] = $result['u_id'];
            $_SESSION['name'] = $result['u_name'];
            $_SESSION['status'] = $result['u_status'];
            $_SESSION['campus'] = $result['u_campus'];
            ?>
            <script>
                swal("Welcome! <?php echo $result['u_name']; ?>", "Login Successfully!", "success", {
                    button: false,
                    timer: 2000
                });
                setTimeout(function() {
                    <?php
                    if($_SESSION['status']== "Admin"){
                        ?>
                        window.location = "";
                        <?php
                    }else{
                        ?>
                        // window.location = "index.php";
                        window.location.reload();
                        <?php
                    }
                    ?>
                }, 2000);
                $(".u_un").val("");
                $(".u_pass").val("");
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            swal("Login Failed!", "Username Or Password Is Incorrect!", "error", {
                button: false,
                timer: 2000
            });
        </script>
    <?php
    }
}

if (isset($_REQUEST['delete_user'])) {
    $condition = array(
        "u_id" => $_REQUEST['delete_user']
    );

    if (del("user", $condition)) {
        echo 1;
    } else {
        echo 0;
    }
}   //Done

if (isset($_REQUEST['u_name'])) {
    $data = array(
        "u_name" => $_REQUEST['u_name'],
        "u_phone" => $_REQUEST['u_phone'],
        "u_sex" => $_REQUEST['u_sex'],
        "u_status" => $_REQUEST['u_status'],
        "u_un" => $_REQUEST['u_un'],
        "u_pass" => $_REQUEST['u_pass'],
        "u_campus" => $_SESSION['campus']
    );
    if (insert('user', $data)) {
    ?>
        <script>
            swal("Good job!", "User Created Successfully!", "success", {
                button: false,
                timer: 1500
            });
            setTimeout(function() {
                window.location = "user.php";
            }, 1000);
        </script>
    <?php
    }
}

if (isset($_REQUEST['u_up_id'])) {
    $data = array(
        "u_name" => $_REQUEST['u_up_name'],
        "u_phone" => $_REQUEST['u_up_phone'],
        "u_sex" => $_REQUEST['u_up_sex'],
        "u_status" => $_REQUEST['u_up_status'],
        "u_un" => $_REQUEST['u_up_un'],
        "u_pass" => $_REQUEST['u_up_pass']
    );
    $condition = array(
        "u_id" => $_REQUEST['u_up_id']
    );
    if (update('user', $data, $condition)) {
    ?>
        <script>
            swal("Good job!", "User Update Successfully!", "success", {
                button: false,
                timer: 1500
            });
            setTimeout(function() {
                window.location = "user.php"; // search page location
            }, 1000);
        </script>
    <?php
    }
}

if (isset($_REQUEST['s_name'])) {
    $data = array(
        "s_name" => $_REQUEST['s_name'],
        "s_phone" => $_REQUEST['s_phone'],
        "s_sex" => $_REQUEST['s_sex'],
        "s_pay" => $_REQUEST['s_pay'],
        "s_edu" => $_REQUEST['s_edu'],
        "s_post" => $_REQUEST['s_post'],
        // "s_joining" => $_REQUEST['s_joining'],
        "s_join_date" => $_REQUEST['s_join_date'],
        "s_join_month" => $_REQUEST['s_join_month'],
        "s_join_year" => $_REQUEST['s_join_year'],
        "s_campus" => $_SESSION['campus']
    );
    if (insert('staff', $data)) {
    ?>
        <script>
            swal("Good job!", "Staff Created Successfully!", "success", {
                button: false,
                timer: 1500
            });
            setTimeout(function() {
                window.location = "staff.php";
            }, 1000);
        </script>
    <?php
    }
}

if (isset($_REQUEST['s_up_id'])) {
    $data = array(
        "s_name" => $_REQUEST['s_up_name'],
        "s_phone" => $_REQUEST['s_up_phone'],
        "s_sex" => $_REQUEST['s_up_sex'],
        "s_pay" => $_REQUEST['s_up_pay'],
        "s_edu" => $_REQUEST['s_up_edu'],
        "s_post" => $_REQUEST['s_up_post'],
        // "s_joining" => $_REQUEST['s_up_joining'],
        "s_join_date" => $_REQUEST['s_up_join_date'],
        "s_join_month" => $_REQUEST['s_up_join_month'],
        "s_join_year" => $_REQUEST['s_up_join_year']
    );
    $condition = array(
        "s_id" => $_REQUEST['s_up_id']
    );
    if (update('staff', $data, $condition)) {
    ?>
        <script>
            swal("Good job!", "Staff Update Successfully!", "success", {
                button: false,
                timer: 1500
            });
            setTimeout(function() {
                window.location = "staff.php"; // search page location
            }, 1000);
        </script>
    <?php
    }
}

if (isset($_REQUEST['s_l_id'])) {
    $data = array(
        "s_leave_reason" => $_REQUEST['s_l_leave_comment'],
        "s_leave_date" => $_REQUEST['s_l_leave_date'],
        "s_leave_month" => $_REQUEST['s_l_leave_month'],
        "s_leave_year" => $_REQUEST['s_l_leave_year'],
        "s_leave_status" => "1"
    );
    $condition = array(
        "s_id" => $_REQUEST['s_l_id']
    );
    if (update('staff', $data, $condition)) {
    ?>
        <script>
            swal("Good job!", "Staff Update Successfully!", "success", {
                button: false,
                timer: 1500
            });
            setTimeout(function() {
                window.location = "staff.php"; // search page location
            }, 1000);
        </script>
    <?php
    }
}

if (isset($_REQUEST['delete_staff_pay'])) {
    $condition = array(
        "sp_id" => $_REQUEST['delete_staff_pay']
    );

    if (del("staff_pay", $condition)) {
        echo 1;
    } else {
        echo 0;
    }
}   //Done