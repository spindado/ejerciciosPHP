<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
      <link rel="stylesheet" href="style.css">
</head>
<body>

      
      <div id="login-form">
            <form action="$_SERVER[PHP_SELF]" method="post">
                  <table>
                        <tr>
                              <td>
                                    <input type="text" name="uname" placeholder="User Name" />
                              </td>
                        </tr>
                        <tr>
                              <td>
                                    <input type="password" name="pass" placeholder="Your Password" />
                              </td>
                        </tr>
                        <tr>
                              <td>
                                    <button type="submit" name="btn-signup">Sign Me Up</button>
                              </td>
                        </tr>
                        
                        
                  </table>
            </form>
      </div>
      
</body>
</html>