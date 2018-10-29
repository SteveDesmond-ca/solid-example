<html>
    <body>

        <?php if ($_GET['staff']) {?>
            <p>Enter the username whose password to reset.</p>
        <?php } else {?>
            <p>Please complete the form to reset your password.</p>
        <?php }?>

        <form method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username"/>
            <button>Submit</button>
        </form>

    </body>
</html>