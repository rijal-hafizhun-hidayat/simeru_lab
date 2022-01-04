<?php
include_once("../function/koneksi.php");
include_once("../function/helper.php");

$book_id = $_GET["book_id"];

$query = mysqli_query($koneksi, "SELECT status FROM booking WHERE book_id='$book_id'");
$row = mysqli_fetch_assoc($query);
$status = $row['status'];

?>
<form method="POST" action="update_proses.php?book_id=<?php echo $book_id ?>">
    <div class="element-form">
        <label>Booking ID</label>
        <span><input type="text" value="<?php echo $book_id; ?>" name="book_id" readonly="true" /></span>
    </div>

    <div class="element-form">
        <label>Status</label>
        <span>
            <select name="status">
                <?php

                foreach ($arrayStatusPesanan as $key => $value) {
                    if ($status == $key) {
                        echo "<option value='$key' selected='true'>$value</option>";
                    } else {
                        echo "<option value='$key'>$value</option>";
                    }
                }

                ?>
            </select>
        </span>
    </div>

    <div class="element-form">
        <span><input class="tombol-action" type="submit" value="Edit Status" name="button" /></span>
    </div>

</form>

<?php
