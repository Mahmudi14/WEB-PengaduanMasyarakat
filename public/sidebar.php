<div class="user-profile">
    <div class="username-dt">
        <div class="usr-pic">
            <?php
            if (@$_SESSION["user"]) {
                if ($tampil["foto"] != "") {
                    echo "<img src='foto/profil/" . $tampil['foto'] . "' width='100' height='100' />";
                } else {
                    echo "<img src='images/cmp-icon11.png' width='100' height='100' />";
                }
            }
            ?>
        </div>
    </div>
    <!--username-dt end-->
    <div class="user-specs">

        <h3>
            <?php
            if (@$_SESSION["user"]) {
                echo $tampil['nama_user'];
            } else if (@$_SESSION["admin"]) {
                echo $tampil['nama_admin'];
            }
            ?>
        </h3>
        <span>
            <?php
            if (@$_SESSION["user"]) {
                echo $tampil['pekerjaan'];
            } else if (@$_SESSION["admin"]) {
                echo "Admin";
            }
            ?>
        </span>
    </div>
</div>
<!--user-profile end-->
<ul class="user-fw-status">
    <?php
    $akun = @$_SESSION["user"]["kode"];
    $variabel = $koneksi->query("SELECT * FROM tb_user_follow WHERE kode='$akun'");
    $jum = $variabel->num_rows;
    ?>
    <li>
        <h4>Following</h4>
        <span><?php echo $jum ?></span>
    </li>
    <?php
    $akun2 = @$_SESSION["user"]["kode"];
    $variabel2 = $koneksi->query("SELECT * FROM tb_user_follow WHERE following='$akun2'");
    $jum2 = $variabel2->num_rows;
    ?>
    <li>
        <h4>Followers</h4>
        <span><?php echo $jum2 ?></span>
    </li>
    <li>
        <a href="../logout.php" title="">Logout</a>
    </li>
</ul>