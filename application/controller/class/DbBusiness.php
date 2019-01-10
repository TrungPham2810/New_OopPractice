<?php 
    
    class DbBusiness extends Db 
    {
    // Hàm thêm mới
    function addNew($table, $a, $className){
        $c = new ClawlerFactory();
        $d = $c->makePhpClass($className);
        $d -> url = $a;
        // gán giá trị cho các biến title và content
        if ($d->deleteGarbage() =='') {
            return ERROR;
        } else {
            $title = $d -> takeTitle();
            $content = $d -> takeContent();
        // kiểm tra xem dữ liệu này đã được lưu chưa
        $sql1 = "SELECT Id FROM $table WHERE Title = '$title' ";
        
        if ($this->getRow($sql1) == false) {
            $data = array(
                'Title'   => $title,
                'Content' => $content,
            );
            $this->insert($table, $data);
            $_SESSION['success']= '<span class="flash text_color">Add data Success</span>';
        } else {
            // var_dump($test->getRow($sql1));
            $_SESSION['linkerror']= $_POST['link'];
            $_SESSION['existed']=  '<span class="flash" >Data existed. Please input new url !</span>';
        }       
        }
    }
    public function showData($table,$tableTitle)
    {   
        echo  "<table class=\"show_data\" border='1' style=\"border-collapse:collapse\">
        <tr style=\"text-align:center;font-size:1.5em;font-weight:bold;\">
            <td colspan='4'>".$tableTitle." </td>
        </tr>
        <tr style=\"text-align:center;\">
            <td >ID</td>
            <td >Title</td>
            <td>Content</td>
            <td>Delete</td>
        </tr>";
        
         $sql1 = "SELECT * FROM $table";
        // var_dump($this->getList($sql1) ) ;
         foreach($this->getList($sql1) as $key=>$value)
         {
             echo '<tr>';
             echo "<td>".$value['Id']."</td>";
             echo "<td>".$value['Title']."</td>";
             echo "<td><a href=\"index.php?action=content&table=".$table."&id=".$value['Id']."\">Show Content</a></td>";
             echo "<td><a href=\"index.php?action=delete&table=".$table."&id=".$value['Id']."\">Delete</a></td></tr>";
         }
        echo '</table>';
        
    }
    // Hàm xóa theo id
    function deleteById($table, $id){
        // return $this->remove($table, "Id = $id");
        $this->remove($table, "Id = $id");
    }

    // hàm select theo id
    function selectById($table, $id){
        $sql = "SELECT * FROM $table WHERE Id = $id";
        return $this->getRow($sql);
    }
}
?>