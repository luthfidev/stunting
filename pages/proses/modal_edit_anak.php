<?php

    include "../../config.php";

    if($_POST['idx']) {

        $id = $_POST['idx'];      

        $sql = mysqli_query($connect, "SELECT * FROM anak WHERE id_anak = $id");

        while ($result = mysqli_fetch_array($sql)){

        ?>

        <form action="edit.php" method="post">

            <input type="hidden" name="id" value="<?php echo $result['id_anak']; ?>">

            <div class="form-group">

                <label>Nama Siswa</label>

                <input type="text" class="form-control" name="nama" value="<?php echo $result['nama_anak']; ?>">

            </div>

            <div class="form-group">

                <label>Umur</label>

                <input type="text" class="form-control" name="umur" value="<?php echo $result['umur']; ?>">

            </div>

              <button class="btn btn-primary" type="submit">Update</button>

        </form>     

        <?php } }

?>