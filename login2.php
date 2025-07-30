<!DOCTYPE html>
<html>
<head>
    <title>Modern Login Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(120deg, #2980b9, #8e44ad);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.25);
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        input[type="submit"],
        input[type="reset"] {
            width: 48%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            color: white;
            font-weight: bold;
        }

        input[type="submit"] {
            background-color: #27ae60;
        }

        input[type="reset"] {
            background-color: #e74c3c;
        }

        input[type="submit"]:hover {
            background-color: #219150;
        }

        input[type="reset"]:hover {
            background-color: #c0392b;
        }

        .message {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Login</h2>
    <form method="post">
        <label>User Name</label>
        <input type="text" name="txtuser" required>

        <label>Password</label>
        <input type="password" name="txtpass" required>

        <div style="display: flex; justify-content: space-between;">
            <input type="submit" value="Submit" name="submitbtn">
            <input type="reset" value="Reset">
        </div>

        <div class="message">
            <?php
            if (isset($_POST['submitbtn'])) {
                $user = $_POST['txtuser'];
                $pass = $_POST['txtpass'];
                if ((strcmp($user, "mahesh") == 0) && (strcasecmp($pass, "indore") == 0)) {
                    header("Location:sheet2.php");
                } else {
                    echo "<span style='color:red;'>Invalid username or password</span>";
                }
            }
            ?>
        </div>
    </form>
</div>

</body>
</html>
