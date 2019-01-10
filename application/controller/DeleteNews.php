
<?php
if (isset($_GET)) {
    $table = $_GET['table'];
    $id = $_GET['id'];
    // $a = new DbBusiness();
    // $a -> deleteById($table, $id);
    $a = new DbBusiness();
    $a -> deleteById($table, $id);
    $_SESSION['delete']= '<span class="flash text_color">Delete Success</span>';
    // header('location:../../public/index.php');
    header('location:index.php');
}
?> 

