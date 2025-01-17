<h3>Добавить в галерею</h3>
<?php
if (!isset($_POST['uploadbtn'])) {
    ?>

    <form action="index.php?page=2" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="MAX_FILE_SIZE" value="3145728"> <!-- 3MB -->
            <input type="file" id="myfile" name="myfile" accept="image/*">
        </div>
        <button type="submit" name="uploadbtn" class="btn btn-primary btn-block">Upload</button>
    </form>

    <?php
} else {
    if ($_FILES['myfile']['error'] != UPLOAD_ERR_OK) {
        printAlert("Ошибка при загрузке файла " . $_FILES['myfile']['error']);
        exit;
    }
    if (is_uploaded_file($_FILES['myfile']['tmp_name'])) {
        if (move_uploaded_file($_FILES['myfile']['tmp_name'], './images/' . $_FILES['myfile']['name'])) {
            printAlert("Файл загружен");
        } else {
            printAlert("Не удалось загрузить файл");
        }
    }
}

?>