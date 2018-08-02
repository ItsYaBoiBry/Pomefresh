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
                <form method="post" action="doRegister.php">
                    <img src="img/pomefresh_logo.jpg" alt="" style="width:400px"/>
                    <h3>Staff Registration</h3>
                    <fieldset style="width:400px;">
                        
                        <table>
                            <tr>
                                <td class="col-right-align"><label>Name:</label></td>
                                <td><input type="text" name="name" /></td>
                            </tr>
                            <tr>
                                <td class="col-right-align"><label>Username:</label></td>
                                <td><input type="text" name="username"/></td>
                            </tr>
                            <tr>
                                <td class="col-right-align"><label>Password:</label></td>
                                <td><input type="password" name="password"/></td>
                            </tr>
                        </table>	
                    </fieldset>
                    <input type="submit" value="Register" name="submit" style="margin-top: 10px; padding: 10px;border: none; background: orangered;color: white; text-decoration: none;border-radius: 5px;"/>
                </form>
            </div>
        </div>
    </body>
</html>
