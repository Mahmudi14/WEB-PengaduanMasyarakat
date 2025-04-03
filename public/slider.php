<div class="top-profiles">
    <div class="pf-hd">
        <h3>Pengguna Aplikasi</h3>
        <i class="la la-ellipsis-v"></i>
    </div>
    <div class="profiles-slider">
        <?php
        include "../config.php";
        $query = $koneksi->query("SELECT * FROM tb_user");
        while ($user = $query->fetch_array()) {
            if ($user["kode"] != @$_SESSION["user"]["kode"]) {
        ?>
        <div class="user-profy">
            <?php
                    if ($user["foto"] != "") {
                        echo "<img src='foto/profil/" . $user['foto'] . "' width='57' height='57' />";
                    } else {
                        echo "<img src='images/cmp-icon11.png' width='57' height='57' />";
                    }
                    ?>
            <h3><?php echo $user["nama_user"] ?></h3>
            <span><?php echo $user["pekerjaan"] ?></span>
            <ul>
                <li><a href="#" title="" class="btn btn-primary">Message</a></li>
            </ul>
            <ul>
                <li>
                    <?php
                            $follower = @$_SESSION['user']['kode'];
                            $following = $user["kode"];

                            $fo = $koneksi->query("SELECT * FROM tb_user_follow WHERE kode='$follower' AND following='$following'");
                            $newfo = $fo->num_rows;
                            ?>
                    <style type="text/css">
                    .tombol {
                        padding: 5px;
                        cursor: pointer;
                        box-shadow: none;
                        border-color: none;
                        margin: 0;
                    }
                    </style>
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?php echo $following ?>">
                        <?php
                                if ($newfo > 0) {
                                    echo '<button><a href="unfollow.php?kode=' . $user['kode'] . '" class="tombol bg-secondary">UnFollow</a></button>';
                                } else {
                                    echo '<input type="submit" class="tombol bg-success text-white" name="sub" value="follow">';
                                }
                                ?>
                    </form>
                </li>
            </ul>
        </div>
        <!--user-profy end-->
        <?php }
        } ?>

        <?php
        $tz = 'Asia/Jakarta';
        $dt = new DateTime("now", new DateTimeZone($tz));
        $date = $dt->format('Y-m-d G:i:s');

        $id = @$_POST["id"];
        $sub = @$_POST["sub"];
        $unsub = @$_POST["unsub"];

        if ($sub) {
            $relod = $koneksi->query("INSERT INTO tb_user_follow (kode, following, subscribed) VALUES ('$follower', '$id', '$date')");
            if ($relod) {
                echo "<script>location='index.php'</script>";
            }
        }

        ?>
    </div>
    <!--profiles-slider end-->
</div>
<!--top-profiles end-->