<?php 
    include "inc/header.php";
    include "config.php";
    include "Database.php";
?>
<?php
   $db = new Database();
   $query =  "SELECT * FROM user";
   $read = $db->select($query);
   

?>
 
<div class="content clear">
    <?php
        if(isset($_GET['msg'])){
            echo "<span style='color:green'>".$_GET['msg']."</span>";
        }
   ?>
    <table class="tbl_one">

        <tr>

            <th width="25%">Si No</th>
            <th width="25%">Name</th>
            <th width="25%">Email</th>
            <th width="25%">Skill</th>
            <th width="25%">Action</th>

        </tr>

        <?php if($read){ $i = 0; ?>
            
        <?php while($row = $read->fetch_assoc()){
             $i++;
            
            ?>

        <tr>
            <td>
                <?php echo $i; ?>
            </td>
            <td>
                <?php echo $row['name']; ?>
            </td>
            <td>
                <?php echo $row['email'];?>
            </td>
            <td>
                <?php echo $row['skill'];?>
            </td>
            <td><a href="update.php?id=<?php echo urlencode($row['id']); ?>">Edit</a></td>
        </tr>
        <?php }?>

        <?php }else{ ?>

        <p>Data is not available</p>

        <?php } ?>



    </table>
    <a href="create.php">Create</a>



</div>
<?php 
include "inc/footer.php";
?>