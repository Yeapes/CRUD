<?php
include "inc/header.php";
include "config.php";
include "Database.php";
?>
<?php
$db = new Database();
if (isset($_POST['submit'])) {


    $name = mysqli_real_escape_string($db->link, $_POST['name']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $skill = mysqli_real_escape_string($db->link, $_POST['skill']);

    if ($name == '' || $email == '' || $skill == '') {
        $error = "Field Must Not Be Empty";
    } else {

        $query = "INSERT INTO user(name, email, skill) Values('$name','$email','$skill')";

        $create = $db->insert($query);
    }
}
?>    
<div class="content clear">


<?php
if (isset($error)) {
    echo "<span style='color:red'>" . $error . "</span>";
}
?>

    <form action="create.php" method="POST">
        <table class="tbl_one">

            <tr>
                <td>Name</td>
                <td><input type="text" name="name" placeholder="Please Enter Your Name"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" placeholder="Please Enter Your Email Address"></td>
            </tr>
            <tr>

                <td>Skill</td>
                <td><input type="text" name="skill" placeholder="Please Enter Your Email"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" value="Cancel"> 
                </td>

            </tr>
        </table>
    </form>
    <a href="index.php">Go Back Home</a>


</div>
<?php
include "inc/footer.php";
?>