<?php
    include 'dbconn.php';
    if(isset($_POST['submit'])){
        //check username and pass validity
    }
?>


<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" media="screen" href="asset/main.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:bold" rel="stylesheet"> 
        <script src="asset/main.js"></script>
        <title>Smart Greenhouse Application</title>

    </head>


    <body>
        <form action="" method="POST">
            <div class="login-box">
                <table>
                    <tbody>
                        <tr>
                            <td>USERNAME:</td>
                            <td><input name="username" type="text" placeholder="Username"/></td>
                        </tr>
                        <tr>
                            <td>PASSWORD:</td>
                            <td><input name="pass" type="password" placeholder="Password"/></td>
                        </tr>
                        <tr>
                            <td colspan=2 style="text-align:center;"><button type="submit" name="submit" value="submit">SUBMIT</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </body>


</html>


