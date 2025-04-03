<?php
@session_start();
if (@$_SESSION["admin"] || @$_SESSION["user"]) {
?>

<?php include "header.php"; ?>

<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <div class="col-lg-3 col-md-2 pd-left-none no-pd">
                        <div class="main-left-sidebar no-margin">
                            <div class="user-data full-width">
                                <?php include "sidebar.php" ?>
                            </div>
                            <!--user-data end-->


                        </div>
                        <!--main-left-sidebar end-->
                    </div>
                    <div class="col-lg-9 col-md-8 no-pd">
                        <div class="main-ws-sec">
                            <?php
                                if (@$_SESSION["user"]) {
                                    $kode = @$_SESSION["user"]["kode"];
                                    $data = $koneksi->query("SELECT * FROM tb_user WHERE kode='$kode'");
                                    $tampil = $data->fetch_array();

                                    if ($tampil["pekerjaan"] != "" && $tampil["no_hp"] != "" && $tampil["foto"] != "") {
                                ?>
                            <div class="posts-section">
                                <div class="post-bar">

                                    <div class="job_descp">
                                        <h3 class="mt-3">PROFIL PENGGUNA</h3>
                                        <?php
                                                    $data2 = $koneksi->query("SELECT tb_user.nama_user,tb_login.kode,tb_login.username,tb_user.email,tb_user.pekerjaan,tb_user.no_hp FROM (tb_login LEFT JOIN tb_user on tb_login.kode=tb_user.kode) WHERE tb_login.kode='$kode'");
                                                    $tampil2 = $data2->fetch_array();
                                                    ?>
                                        <table class="table table-striped">
                                            <tr>
                                                <td>NAMA USER</td>
                                                <td>:</td>
                                                <td><?php echo $tampil2["nama_user"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>KODE</td>
                                                <td>:</td>
                                                <td><?php echo $tampil2["kode"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>USERNAME</td>
                                                <td>:</td>
                                                <td><?php echo $tampil2["username"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>E-MAIL</td>
                                                <td>:</td>
                                                <td><?php echo $tampil2["email"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>PEKERJAAN</td>
                                                <td>:</td>
                                                <td><?php echo $tampil2["pekerjaan"] ?></td>
                                            </tr>
                                            <tr>
                                                <td>NO HP</td>
                                                <td>:</td>
                                                <td><?php echo $tampil2["no_hp"] ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php
                                    } else {
                                    ?>
                            <!--post-topbar end-->
                            <div class="posts-section">
                                <div class="post-bar">
                                    <div class="post_topbar">
                                        <div class="job_descp">
                                            <h3>Update Profil</h3>
                                            <?php
                                                        $update = $koneksi->query("SELECT * FROM tb_user WHERE kode='$kode'");
                                                        $hasil = $update->fetch_array();
                                                        ?>
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="kode"
                                                        value="<?php echo $hasil["kode"] ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="nama_user"
                                                        value="<?php echo $hasil["nama_user"] ?>"
                                                        placeholder="Nama User">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="pekerjaan"
                                                        value="<?php echo $hasil["pekerjaan"] ?>"
                                                        placeholder="Pekerjaan">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="email"
                                                        value="<?php echo $hasil["email"] ?>" placeholder="Email">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="no_hp"
                                                        value="<?php echo $hasil["no_hp"] ?>" placeholder="No HP">
                                                </div>
                                                <div class="form-group">
                                                    <input type="file" name="foto" value="">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary" name="tombol"
                                                        value="Update Profil">
                                                </div>
                                            </form>
                                            <?php
                                                        if (@$_SESSION["user"]) {
                                                            $kode = @$_SESSION["user"]["kode"];
                                                        }
                                                        $nama_user = @$_POST["nama_user"];
                                                        $email = @$_POST["email"];
                                                        $pekerjaan = @$_POST["pekerjaan"];
                                                        $no_hp = @$_POST["no_hp"];

                                                        $foto = @$_FILES["foto"]["name"];
                                                        $tmp = @$_FILES["foto"]["tmp_name"];

                                                        $directory = "foto/profil/";
                                                        $tombol = @$_POST["tombol"];

                                                        if ($tombol) {
                                                            if ($nama_user == "" || $email == "" || $pekerjaan == "" || $no_hp == "" || $foto == "") {
                                                                echo "Input tidak boleh kosong";
                                                            } else {
                                                                move_uploaded_file($tmp, $directory . $foto);
                                                                $update = $koneksi->query("UPDATE tb_user SET nama_user='$nama_user',pekerjaan='$pekerjaan',email='$email',no_hp='$no_hp',foto='$foto' WHERE kode='$kode'");
                                                                if ($update) {
                                                                    echo "Data Berhasi di Update";
                                                                    echo "<script>location='index.php';</script>";
                                                                } else {
                                                                    echo "Data gagal di Update";
                                                                }
                                                            }
                                                        }
                                                        ?>
                                        </div>
                                    </div>
                                    <!--post-bar end-->
                                </div>
                            </div>
                            <!--posts-section end-->
                            <?php

                                    }
                                }
                                ?>
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div>
        </div>
</main>

<?php include "footer.php"; ?>

<?php
} else {
    echo "<script>location='../login.php';</script>";
}
?>