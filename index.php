<?php
    if(isset($_POST['btn']))
    {
        $mail=$_POST['username'];
        mkdir("images/".$mail);
        $file=$_FILES['file']['name'];
        $array=explode('.',$file);
        $ext=end($array);
        $NewName="pic-".time().".".$ext;
        $from=$_FILES['file']['tmp_name'];
        $to="images/".$mail."/".$NewName;
        move_uploaded_file($from, $to);
        $password=$_POST['password'];
        $age=$_POST['age'];
        $gender=$_POST['gender'];
        $major=$_POST['major'];
        $var=mysqli_connect("localhost", "root", "", "stud_test");
        $sql="INSERT INTO users (email, password, age, gender, major, filename, address) VALUES ('$mail', '$password', '$age', '$gender', '$major', '$NewName', '$to')";
        mysqli_query($var, $sql);
        header("location: page2.php");
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign-Up</title>
</head>
<body style="background-color: #ff57f7; margin: 250px; text-align: center;">
    <form method="post" enctype="multipart/form-data">
        <h1>Sign-Up</h1>
        <input type="email" name="username" placeholder="E-Mail">
        <br>
        <br>
        <input type="password" name="password" placeholder="Password">
        <br>
        <br>
        <select name="age">
            <?php
                for ($i=1350; $i<=1380; $i++)
                {
                    echo "<option>$i</option>";
                }
            ?>
        </select>
        <br>
        <br>
        <select name="gender">
            <?php
                $gen=array("Male", "Female");
                foreach ($gen as $item) {
                        echo "<option>$item</option>";
                    }
            ?>
        </select>
        <br>
        <br>
        <select name="major">
            <?php
                $maj=array("Software", "Hardware", "IT", "Law", "Art", "English Translator", "Mathematical", "Psychology", "Other");
                foreach ($maj as $items)
                {
                    echo "<option>$items</option>";
                }
            ?>
        </select>
        <br>
        <br>
        <input type="file" name="file">
        <br>
        <br>
        <button type="submit" name="btn">Sign-Up</button>
    </form>
</body>
</html>