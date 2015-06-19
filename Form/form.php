<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Tao form post get</title>
    </head>
    
    <body>
        <form action = "xuly.php" method = "post">
        	<table>
            	<tr>
                	<td>Username</td>
                    <td><input type = "text" size ="25" name = "txtname" /></td>
                </tr>
                <tr>
                	<td>Password</td>
                    <td><input type = "password" size ="25" name = "txtpass" /></td>
                </tr>
                
                <tr>
                    <td>Birthday</td>
                    <td> 
                    	<select name = "ngay">
                            <option value = "ngay">Ngày</option>
                            <?php
                                for($i=1;$i<=31;$i++)
                                {echo "<option value = '$i'>$i</option>";}
                            ?>
                    	</select>
                    	<select name = "thang">
                            <option value = "thang">Tháng</option>
                            <?php
                                for($i=1;$i<=12;$i++)
                                {echo "<option value = '$i'>$i</option>";}
                            ?>
                    	</select>
                    	<select name = "nam">
                            <option value = "nam">năm</option>
                            <?php
                                for($i=1980;$i<=2015;$i++)
                                {echo "<option value = '$i'>$i</option>";}
                            ?>
                    	</select>
                    </td>
                </tr>
                <tr>
                	<td>Giới tính</td>
                    <td>
                    	<input type = "radio" name ="gender" value ="1"/>Nam
                        <input type = "radio" name ="gender" value ="2"/>Nữ
                        <input type = "radio" name ="gender" value ="3"/>BD
                    </td>
                </tr>
                
                <tr>
                	<td>Information</td>
                    <td>
                    	<textarea name = "info" cols ="30" row = "8"></textarea>
                    </td>
                </tr>
                <tr>
                	<td></td>
                    <td><input type = "submit" value = "Submit" /></td>                    
                </tr>
            </table>
         </form>
            
    </body>
</html>
