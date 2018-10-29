<html>
    <body>

        <p>
            <?= $view_model['message'] ?>
        </p>
        
        <form method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username"/>
            <button>Submit</button>
        </form>

    </body>
</html>