<?php
include '../includes/header.php';
include '../connection.php';

$error = '';
$success = '';

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $sujet = trim($_POST['sujet']);
    $message = trim($_POST['message']);

    // Validation des champs
    if (empty($nom) || empty($email) || empty($sujet) || empty($message)) {
        $error = 'Tous les champs sont obligatoires.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Adresse e-mail invalide.';
    } else {
        // Insérer dans la base de données (si nécessaire)
        $stmt = $db->prepare('INSERT INTO messages (nom, email, sujet, message) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('ssss', $nom, $email, $sujet, $message);

        if ($stmt->execute()) {
            $success = 'Votre message a été envoyé avec succès.';
        } else {
            $error = 'Une erreur est survenue. Veuillez réessayer.';
        }
    }
}
?>

<section class="p-8 bg-gray-50">
    <h1 class="text-4xl text-center font-bold mb-10 text-gray-800">Contactez-nous</h1>

    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-8">
        <?php if (!empty($error)): ?>
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
                <?= htmlspecialchars($success) ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" class="space-y-6">
            <div>
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom complet</label>
                <input type="text" id="nom" name="nom" class="mt-1 p-3 border rounded-md w-full"value="<?= isset($nom) ? htmlspecialchars($nom) : '' ?>"required>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                <input type="email" id="email" name="email" class="mt-1 p-3 border rounded-md w-full"value="<?= isset($email) ? htmlspecialchars($email) : '' ?>"required>
            </div>

            <div>
                <label for="sujet" class="block text-sm font-medium text-gray-700">Sujet</label>
                <input type="text" id="sujet" name="sujet" class="mt-1 p-3 border rounded-md w-full"value="<?= isset($sujet) ? htmlspecialchars($sujet) : '' ?>" required>
            </div>

            <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea id="message" name="message" rows="5" class="mt-1 p-3 border rounded-md w-full"required>
                <?= isset($message) ? htmlspecialchars($message) : '' ?></textarea>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="w-[50%]  bg-black text-white text-xl p-3 rounded-md hover:bg-primary-dark">Envoyer</button>
            </div>
        </form>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
