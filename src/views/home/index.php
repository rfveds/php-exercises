<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<h1>Welcome</h1>

<hr />

<div>
    <?php
        if (! empty($user)) {
            echo 'User ID: ' . $user['id'] . '<br />';
            echo 'Name: ' . $user['name'] . '<br />';
            echo 'Email: ' . $user['email'] . '<br />';
            echo 'Is Active: ' . ($user['is_active'] ? 'Yes' : 'No') . '<br />';
            echo 'Created At: ' . $user['created_at'] . '<br />';
        }
    ?>
</div>

</body>
</html>