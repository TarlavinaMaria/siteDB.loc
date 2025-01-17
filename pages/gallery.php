<h3>Gallery</h3>
<p>Выберите расширение для отображения</p>
<form action="index.php?page=3" method="post">
    <select name="ext">
        <?php
        $path = 'images/';
        if ($dir = opendir($path)) {
            $ar = [];
            while (($file = readdir($dir)) !== false) {
                $pos = strpos($file, '.'); // находим позицию точки
                $ext = substr($file, $pos + 1); // находим расширение
                $ext = strtolower($ext); // переводим в нижний регистр
                if (!in_array($ext, $ar) &&$ext != '') {
                    $ar[] = $ext;
                    echo '<option >' . $ext . '</option>';
                }

            }
            closedir($dir);
        }
        ?>
    </select>
    <input type="submit" value="Show Pictures" class="btn btn-primary" name = "show_pictures_btn">
</form>
<br>
<?php
if (isset($_POST['show_pictures_btn'])) {
    $ext = $_POST['ext'];
    $ar = glob($path . '*.' . $ext);
    echo "<div class = 'panel panel-primary'>";
    echo "<div class = 'panel-heading'>";
    echo "<h3 class = 'panel-title'>Содержимое галереи</h3></div>";
    foreach ($ar as $a) {
        echo "<a href = '$a' target = '_blank'>
        <img src = '$a'height = '100px' border = 0 class = 'img-polaroid'>
        </a>";
    }
    echo "</div>";
}
?>