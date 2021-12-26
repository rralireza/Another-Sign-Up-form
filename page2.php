<?php
    $var=mysqli_connect('localhost', 'root', '', 'stud_test');
    $sql="SELECT * FROM users";
    $result=mysqli_query($var,$sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table class="maintbl">
        <tr>
            <th>E-Mail</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Major</th>
            <th>Picture</th>
        </tr>
        <?php
        while ($row=mysqli_fetch_assoc($result)){
            ?>
        <tr>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['major']; ?></td>
            <td><img src="<?php echo $row['address']; ?>" height="50px"></td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>