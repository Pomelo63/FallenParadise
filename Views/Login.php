<div>
    <p class="welcome-msg">Bienvenue,</p>
    <form method="POST" class="login-form" onsubmit="return onLogin()">
        <div>
            <label for="user-name">Nom:</label>
            <input type="text" name="user-name" id="user-name" required>
        </div>
        <div>
            <label for="user-password">Mot de passe:</label>
            <input type="password" name="user-password" id="user-password" required>
        </div>
        <button type="submit" class="main_button" id="login_button">Se connecter</button>
    </form>
    <a href="<?= "index.php?action=home" ?>">Home</a>
</div>