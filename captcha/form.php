<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="form.php" method=post>
    <table>
    <tr>
        <td align="left">
        <label for="captcha">Captcha</label>
        </td>
        <td>
        <input type="text" name="txtCaptcha" maxlength="10" size="32" />
        </td>
        <td>
        <img src="random_image.php" />
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>
        <input type=submit name=ok value="Check" />
        </td>
    </tr>
    </table>
</form>
</body>
</html>