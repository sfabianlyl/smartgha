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
        <script src="asset/main.js"></script>
        <title>Smart Greenhouse Application</title>
    </head>


    <body>
        <form action="" method="POST">
            <div class="login-box">
                <table class="login-table"><tbody>
                    <tr>
                        <td>Username:</td>
                        <td><input name="username" type="text"/></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input name="pass" type="password"/></td>
                    </tr>
                    <tr>
                        <td colspan=2 style="text-align:right;"><button type="submit" name="submit" value="submit">Submit</button></td>
                    </tr>
                </tbody></table>
            </div>
        </form>
    </body>


</html>


