<html>
    <head>
        <script>
            function monthChange() {
                var exipreMM = document.getElementById("exipreMM").value;
                document.getElementById("exp_month").value = expireMM;
            }
            function yearChange() {
                var expireYY = document.getElementById("expireYY").value;
                document.getElementById("exp_year").value = expireYY;
            }
        </script>
    </head>
    <body>
        <form name="register" method="post" action="api/register.php">
            Email: <input type="text" name="email"><br>
            Password: <input type="password" name="password"><br>
            Confirm Password: <input type="password"><br>
            Credit Card Number: <input type="text" name="card_number"><br>
            Credit Card Exp. Month:
            <select name='exp_month' id='expireMM'>
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
            <select name='exp_year' id='expireYY'>
                <option value=''>Year</option>
                <option value='2018'>2018</option>
                <option value='2019'>2019</option>
                <option value='2020'>2020</option>
                <option value='2021'>2021</option>
            </select>
            <br>
            Credit Card Security Code: <input type="text" name="security_number" maxlength="4"><br>
            <!-- <input type="hidden" id="expire_month" name="expire_month" maxlength="4"/>
            <input type="hidden" id="expire_year" name="expire_year" maxlength="4"/> -->

            <input type="submit" value="Submit"><br>
        </form>
    </body>
</html>
