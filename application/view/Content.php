<div class="box">
        <?php
            if (isset($_GET)) {
                $table = $_GET['table'];
                $id = $_GET['id'];
                $a = new DbBusiness();
                $b = $a -> selectById($table, $id);
                // show data
                echo '<div class="news">';
                echo "<h1>".$b['Title']."</h1>";
                echo "<p class=\"text_content\">".$b['Content']."</p>";
                echo '</div>';
            }
        ?> 
        <div class="back" style="text-align:center">
            <a href="index.php">
                 <span class="arrow">&lsaquo;</span>
                 <p style="display:inline">Back to previous page</p>
            </a>
        </div>
    </div>