<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="img/pomefresh_logo.jpg" sizes="16x16" type="image/jpg">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="css/vendor.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Pomefresh</title>
        <style>
            form{
                margin: 0 auto;
                width: 400px;
            }
        </style>
    </head>
    <body>
        <div id="page">
            <div id="body">
                <form method="post" action="doLogin.php">
                    <img src="img/pomefresh_logo.jpg" alt="" style="width:400px"/>
                    <h3>Login</h3>
                    <fieldset style="width:400px;margin-top: 10px;">
                        <table>
                            <tr>
                                <td><label for="idUsername">Username:</label></td>
                                <td><input type="text" id="idUsername" name="username"/></td>
                            </tr>
                            <tr>
                                <td><label for="idPassword">Password:</label></td>
                                <td><input type="password" id="idPassword" name="password"/></td>
                            </tr>
                        </table>
                    </fieldset>
                    <input type="submit" value="Login" name="submit" style="padding: 10px;background: orangered;color: white;border: none; border-radius: 5px;margin-top: 10px;"/>
                    <p>Or</p>
                    <a href="register.php" style="padding: 10px;background: orangered;color: white; text-decoration: none;border-radius: 5px;">Register Here</a>
                </form>
            </div>
        </div>
    </body>
</html>
