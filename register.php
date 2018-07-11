<html>
    <head>
        <script>
            function checkForm()
            {
                var f = document.forms["registerForm"].elements;
                var canSubmit = true;

                for (var i = 0; i < f.length; i++) {
                    if (f[i].value.length == 0) {
                        canSubmit = false;
                    }
                }

                canSubmit = canSubmit
                    && document.getElementById('expire_month') != "Month"
                    && document.getElementById('exp_year') != "Year";

                document.getElementById('registerFormSubmit').disabled = !canSubmit;
            }
        </script>
    </head>
    <body>
        <form name="registerForm" method="post" action="api/register.php">
            Email: <input type="text" name="email" onkeyup="checkForm()"><br>
            Password: <input type="password" name="password" onkeyup="checkForm()"><br>
            Confirm Password: <input type="password" onkeyup="checkForm()"><br>
            Credit Card Number: <input type="text" name="card_number" onkeyup="checkForm()"><br>
            Credit Card Exp. Month:
            <select name="exp_month" id="exp_month" onchange="checkForm()">
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
            <select name="exp_year" id="exp_year" onchange="checkForm()">
                <option value=''>Year</option>
                <option value='2018'>2018</option>
                <option value='2019'>2019</option>
                <option value='2020'>2020</option>
                <option value='2021'>2021</option>
            </select>
            <br>
            Credit Card Security Code: <input type="text" name="security_number" maxlength="4"><br>

            <input type="submit" id="registerFormSubmit" value="Submit" disabled="disabled"><br>
        </form>
        <form action="index.php">
            <input type="submit" value="Back"/>
        </form>
    </body>
</html>
