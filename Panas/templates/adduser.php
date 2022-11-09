<h2>Log in</h2>

<form action="" method="post">
    <label>Email</label>
    <input type="text" name="email" value="<?= $users[0]->email ?? '' ?>" />
    <label>Name</label>

    <input type="text" name="name" value="<?= $users[0]->name ?? '' ?>" />

    <label>Password</label>
    <input type="text" name="password" value="<?= $users[0]->password ?? '' ?>" />

    <input type="submit" name="submit" value="Log In" />
</form>