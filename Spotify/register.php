<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include_once "nav.php";
    include_once 'database.php';
    $Errors = array();
    $registered = false;
    if (isset($_POST["register"])) {
        if (empty($_POST["firstname"])) {
            $Errors['firstname'] = "firstname is required";
        }
        if (empty($_POST["email"])) {
            $Errors['email'] = "email is required";
        }
        if (empty($_POST["password"])) {
            $Errors['password'] = "password is required";
        }
        if (empty($_POST["lastname"])) {
            $Errors['lastname'] = "Last name is required";
        }



        if (empty($Errors)) {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
            $compareQuery = "SELECT * FROM users WHERE mail = '" . $_POST['email'] . "'";
            $results = mysqli_query($conn, $compareQuery);

            $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
            if (mysqli_num_rows($results) <= 0) {
                $password = $_POST["password"];
                //$hash = md5($password);
                $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

                $query = 'INSERT INTO users (first_name, last_name, mail, password) VALUES ("' . $_POST["firstname"] . '" , "' . $_POST["lastname"] . '","' . $_POST["email"] . '","' . $hashedpassword . '")';

                if ($conn->query($query) === TRUE) {
                    //echo "New record created successfully";
                    echo "<h2>Registration succesful.</h2>";
                    $registered = true;
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "<h2>That user or email is already in use</h2>";
                $registered = true;
            }
        }
    }

    ?>

    <body>
        <div class="login">
            <h1>Register your account</h1>
            <form action="" method="POST" class="form">
                <input type="text" name="firstname" placeholder="First Name">
                <?php if (isset($Errors["firstname"])) echo "<p>" . $Errors["firstname"] . "</p>"; ?><br>

                <input type="text" name="lastname" id="" placeholder="Last Name">
                <?php if (isset($Errors["lastname"])) echo "<p>" . $Errors["lastname"] . "</p>"; ?><br>

                <input type="email" name="email" placeholder="email">
                <?php if (isset($Errors["email"])) echo "<p>" . $Errors["email"] . "</p>"; ?><br>

                <input type="text" name="password" placeholder="password">
                <?php if (isset($Errors["password"])) echo "<p>" . $Errors["password"] . "</p>"; ?><br>

                <input type="submit" value="register" name="register">
            </form>
            <?php if ($registered) echo "<a href='login.php'>Log In</a>"; ?>
        </div>
    </body>

</html>