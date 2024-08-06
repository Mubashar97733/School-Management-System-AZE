function login() {
    var username = $(".u_un").val();
    var password = $(".u_pass").val();
    if (username != "" && password != "") {
        $.post(
            "api.php", {
            log_un: username,
            log_pass: password
        },
            function (data) {
                $('.login_result').html(data);
            }
        );
    } else {
        swal("Login Failed!", "Something is Missing!", "warning", {
            button: false,
            timer: 2000
        });
    }
}

function delete_user(id) {
    swal({
        title: "Note!",
        text: "Are You Really Want To Delete It?",
        icon: "warning",
        buttons: ["Cancel", "Delete"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                swal("Good Job!", "User Deleted Successfully!", "success", {
                    button: false,
                    timer: 1500
                });
                $.get(
                    "api.php?delete_user=" + id,
                    function (data) {
                        if (data == 1) {
                            $("." + id).fadeOut();
                        }
                    }
                );
            } else {
                swal("Note!", "User Is Not Deleted!", "info", {
                    button: false,
                    timer: 1500
                });
            }
        });
}

function create_user() {
    $.post(
        "api.php", {
        u_name: $(".u_name").val().trim(),
        u_phone: $(".u_phone").val().trim(),
        u_sex: $(".u_sex").val().trim(),
        u_status: $(".u_status").val().trim(),
        u_un: $(".u_un").val().trim(),
        u_pass: $(".u_pass").val().trim()
    },
        function (data) {
            $('.create_user').html(data);
        }
    );
}

function edit_user(id) {
    $.post(
        "api.php", {
        u_up_id: id,
        u_up_name: $(".u_name").val().trim(),
        u_up_phone: $(".u_phone").val().trim(),
        u_up_sex: $(".u_sex").val().trim(),
        u_up_status: $(".u_status").val().trim(),
        u_up_un: $(".u_un").val().trim(),
        u_up_pass: $(".u_pass").val().trim()
    },
        function (data) {
            $('.edit_user').html(data);
        }
    );
}

function create_staff() {
    var d = $(".s_join_date").val();
    array = d.split("-");
    $.post(
        "api.php", {
        s_name: $(".s_name").val().trim(),
        s_phone: $(".s_phone").val().trim(),
        s_sex: $(".s_sex").val().trim(),
        s_pay: $(".s_pay").val().trim(),
        s_edu: $(".s_edu").val().trim(),
        s_post: $(".s_post").val().trim(),
        // s_joining: $(".s_joining").val().trim(),
        s_join_date: $(".s_join_date").val().trim(),
        s_join_month: array[1],
        s_join_year: array[0]
    },
        function (data) {
            $('.create_staff').html(data);
        }
    );
}

function edit_staff(id) {
    var d = $(".s_join_date").val();
    array = d.split("-");
    $.post(
        "api.php", {
        s_up_id: id,
        s_up_name: $(".s_name").val().trim(),
        s_up_phone: $(".s_phone").val().trim(),
        s_up_sex: $(".s_sex").val().trim(),
        s_up_pay: $(".s_pay").val().trim(),
        s_up_edu: $(".s_edu").val().trim(),
        s_up_post: $(".s_post").val().trim(),
        // s_up_joining: $(".s_joining").val().trim(),
        s_up_join_date: $(".s_join_date").val().trim(),
        s_up_join_month: array[1],
        s_up_join_year: array[0]
    },
        function (data) {
            $('.edit_staff').html(data);
        }
    );
}

function leave_staff(id) {
    var d = $(".s_leave_date").val();
    array = d.split("-");
    $.post(
        "api.php", {
        s_l_id: id,
        s_l_leave_comment: $(".s_leave_comment").val().trim(),
        s_l_leave_date: $(".s_leave_date").val().trim(),
        s_l_leave_month: array[1],
        s_l_leave_year: array[0]
    },
        function (data) {
            $('.leave_staff').html(data);
        }
    );
}

function delete_staff_pay(id) {
    swal({
        title: "Note!",
        text: "Are You Really Want To Delete It?",
        icon: "warning",
        buttons: ["Cancel", "Delete"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                swal("Good Job!", "Record Deleted Successfully!", "success", {
                    button: false,
                    timer: 1500
                });
                $.get(
                    "api.php?delete_staff_pay=" + id,
                    function (data) {
                        if (data == 1) {
                            $("." + id).fadeOut();
                        }
                    }
                );
            } else {
                swal("Note!", "Record Is Not Deleted!", "info", {
                    button: false,
                    timer: 1500
                });
            }
        });
}