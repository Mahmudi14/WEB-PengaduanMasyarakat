<?php
@session_start();
if (@$_SESSION["user"]) {
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
                            <!--post-topbar end-->
                            <div class="posts-section">
                                <div class="post-bar">
                                    <div class="post_topbar">
                                        <div class="job_descp">
                                            <h3>Update Postingan</h3>
                                            <?php
                                                $id = @$_GET["id"];
                                                $update = $koneksi->query("SELECT * FROM tb_pengaduan WHERE id_pengaduan='$id'");
                                                $hasil = $update->fetch_array();

                                                if ($hasil["gambar_pengaduan" != ""]) {
                                                ?>
                                            <img src="foto/<?php echo $hasil["gambar_pengaduan"] ?>"
                                                class="mb-3 img-thumbnail col-lg-12">
                                            <?php
                                                } else {
                                                    echo "";
                                                }


                                                ?>
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="judul_post"
                                                        value="<?php echo $hasil["judul_pengaduan"] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control"
                                                        name="isi_post"><?php echo $hasil["isi_pengaduan"] ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input type="file" name="foto">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary" name="tombol"
                                                        value="Update Post">
                                                    <a href="index.php" class="btn btn-danger">Batal</a>
                                                </div>
                                            </form>
                                            <?php
                                                $judul_post = @$_POST["judul_post"];
                                                $isi_post = @$_POST["isi_post"];
                                                $foto = @$_FILES["foto"]["name"];
                                                $tmp = @$_FILES["foto"]["tmp_name"];

                                                $directory = "foto/";
                                                $tombol = @$_POST["tombol"];

                                                if ($tombol) {
                                                    if ($hasil["gambar_pengaduan"] != "") {
                                                        move_uploaded_file($tmp, to: $directory . $foto);
                                                        $update = $koneksi->query("UPDATE tb_pengaduan SET judul_pengaduan='$judul_post',isi_pengaduan='$isi_post', gambar_pengaduan='$foto' WHERE id_pengaduan='$id'");

                                                        if ($update) {
                                                            unlink("foto/" . $hasil["gambar_pengaduan"] . "");
                                                            echo "Post Berhasi di edit";
                                                            echo "<script>location='index.php';</script>";
                                                        } else {
                                                            echo "Post gagal di edit";
                                                        }
                                                    } else {
                                                        move_uploaded_file($tmp, to: $directory . $foto);
                                                        $update = $koneksi->query("UPDATE tb_pengaduan SET judul_pengaduan='$judul_post',isi_pengaduan='$isi_post', gambar_pengaduan='$foto' WHERE id_pengaduan='$id'");

                                                        if ($update) {
                                                            echo "Post Berhasi di edit";
                                                            echo "<script>location='index.php';</script>";
                                                        } else {
                                                            echo "Post gagal di edit";
                                                        }
                                                    }
                                                }
                                                ?>
                                        </div>
                                    </div>
                                    <!--post-bar end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include "footer.php" ?>
<?php
} else {
    echo "<script>location='../login.php' </script>";
}

?>