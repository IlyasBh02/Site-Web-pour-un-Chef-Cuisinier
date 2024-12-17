<!-- Page de connexion -->

<?php include 'includes/header.php'; ?>
<h1>Connexion</h1>
<form action="login-handler.php" method="POST">
  <input type="email" name="email" placeholder="Email" required>
  <input type="password" name="password" placeholder="Mot de passe" required>
  <button type="submit">Se connecter</button>
</form>
<?php include 'includes/footer.php'; ?>
