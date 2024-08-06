<div class="row">
    <div class="col-md-6 col-sm-12">
        <?php
        $data = array("Staff Salery", "Home", "dashboard.php", "Staff's Salery");
        breadcrumb($data);
        $gr_con = array(
            "s_campus" => $_SESSION['campus']
        );
        $gr = display_where("staff", $gr_con);
        ?>
    </div>
    <div class="col-md-6 col-sm-12 text-right">
        <div class="dropdown">
            <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Get Record
            </a>
            <div class="dropdown-menu dropdown-menu-right" style="">
                <?php
                if ($gr) {
                    foreach ($gr as $get) {
                        ?>
                        <a class="dropdown-item" href="?salery=<?php echo $get['s_id']; ?>"><?php echo $get['s_name']; ?></a>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>