<html>
    <body>
        <form name="register" method="post" action="api/register.php">
            Email: <input type="text" name="email"><br>
            Password: <input type="password" name="password"><br>
            Confirm Password: <input type="password"><br>
            Credit Card Number: <input type="text" name="card_number"><br>
            Credit Card Exp. Month:
            <select name='expireMM' id='expireMM'>
                <option value=''>Month</option>
                <option value='01'>01</option>
                <option value='02'>02</option>
                <option value='03'>03</option>
                <option value='04'>04</option>
                <option value='05'>05</option>
                <option value='06'>06</option>
                <option value='07'>07</option>
                <option value='08'>08</option>
                <option value='09'>09</option>
                <option value='10'>10</option>
                <option value='11'>11</option>
                <option value='12'>12</option>
            </select>
            <br>
            Credit Card Exp. Year:
            <select name='expireYY' id='expireYY'>
                <option value=''>Year</option>
                <option value='18'>2018</option>
                <option value='19'>2019</option>
                <option value='20'>2020</option>
                <option value='21'>2021</option>
            </select>
            <br>
            Credit Card Security Code: <input type="text" name="security_number"><br>
            <input type="submit" value="Submit"><br>
        </form>
    </body>
</html>
