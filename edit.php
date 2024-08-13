<?php

include_once("./connection/connection.php");

$con = connection();

$id = $_GET['ID'];

$sql = "SELECT * FROM student_list WHERE id = '$id'";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];

    $sql = "UPDATE student_list SET first_name = '$first_name', last_name = '$last_name', gender = '$gender' WHERE id = '$id'";
    $con->query($sql) or die($con->error);

    echo header("Location: details.php?ID=" . $id);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <form action="" method="post">
        <div>
            <label>First Name</label>
            <input type="text" name="first_name" id="first_name" value="<?php echo $row['first_name']; ?>">
        </div>
        <div>
            <label>Last Name</label>
            <input type="text" name="last_name" id="last_name" value="<?php echo $row['last_name']; ?>">
        </div>
        <div>
            <label>Last Name</label>
            <select name="gender" id="gender">
                <option value="Male" <?php echo ($row['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo ($row['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
            </select>
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>