<?php

include_once("./connection/connection.php");

$con = connection();

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];

    echo $sql = "INSERT INTO `student_list`(`first_name`, `last_name`, `gender`) VALUES ('$first_name','$last_name','$gender')";

    $con->query($sql) or die($con->error);

    echo header("Location: index.php");
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
            <input type="text" name="first_name" id="first_name">
        </div>
        <div>
            <label>Last Name</label>
            <input type="text" name="last_name" id="last_name">
        </div>
        <div>
            <label>Last Name</label>
            <select name="gender" id="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>