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
    if (isset($_POST["login"])) {
        if (empty($_POST["email"])) {
            $Errors['email'] = "email is required";
        }
        if (empty($_POST["password"])) {
            $Errors['password'] = "password is required";
        }


        if (empty($Errors)) {
            if (isset($_POST["login"])) {
                $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
                if ($conn) {
                    $query = 'SELECT * FROM users WHERE mail = "' . $_POST["email"] . '"';
                    $results = mysqli_query($conn, $query);
                    $users = mysqli_fetch_assoc($results);

                    if (password_verify($_POST["password"], $users["password"])) {
                        $_SESSION["firstname"] = $users["first_name"];
                        $_SESSION["lastname"] = $users["last_name"];
                        $_SESSION["email"] = $users["mail"];
                        header("location: account.php");
                        exit();
                    } else {

                        echo "<h1> Incorrect username of password, press register to create an account</h1>";
                        if (isset($_SESSION)) {
                            session_destroy();
                        }
                    }
                }
            }
        }
    }

    ?>

    <body>
        <div class="login">
            <h1>Log in</h1>
            <form action="" method="POST">
                <input type="email" name="email" placeholder="email">
                <?php if (isset($Errors["email"])) echo "<p>" . $Errors["email"] . "</p>"; ?><br>

                <input type="text" name="password" placeholder="password">
                <?php if (isset($Errors["password"])) echo "<p>" . $Errors["password"] . "</p>"; ?><br>

                <input type="submit" value="log in" name="login">
            </form>
        </div>
    </body>

</html>