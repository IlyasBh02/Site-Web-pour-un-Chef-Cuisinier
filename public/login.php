<?php 
include '../includes/header.php';
require('../connection.php');
session_start();

if (isset($_POST['login'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if (!$email || !$password) {
        $error = "Please provide both email and password";
    } else {
        $sql = "SELECT * FROM client WHERE email = ?";
        
        if ($stmt = mysqli_prepare($db, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                
                if ($user = mysqli_fetch_assoc($result)) {
                    if (password_verify($password, $user['password'])) {
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['role'] = ($user['roleId'] == 1) ? 'admin' : 'client';
                        
                        header("Location: " . ($user['roleId'] == 1 ? "../chef/dashboard.php" : "index.php"));
                        exit();
                    } else {
                        $error = "Invalid email or password";
                    }
                } else {
                    $error = "No account found with this email";
                }
            } else {
                $error = "An error occurred. Please try again later.";
            }
            
            mysqli_stmt_close($stmt);
        }
    }
}

if (isset($_POST['register'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $tele = $_POST['tele'];
    $adresse = $_POST['adress'];
    $password = $_POST['password'];

    if (!$nom || !$prenom || !$email || !$tele || !$adresse || !$password) {
        $error = "All fields are required";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        
        $sql = "INSERT INTO client (nom, prenom, email, tele, adress, password, roleId) VALUES (?, ?, ?, ?, ?, ?, 2)";
        
        if ($stmt = mysqli_prepare($db, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssssss", $nom, $prenom, $email, $tele, $adresse, $hashedPassword);
            
            if (mysqli_stmt_execute($stmt)) {
                $user_id = mysqli_insert_id($db);
                $_SESSION['user_id'] = $user_id;
                $_SESSION['role'] = 'client';
                header("Location: index.php");
                exit();
            } else {
                $error = "Registration failed. Please try again.";
            }
            
            mysqli_stmt_close($stmt);
        }
    }
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion / Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="flex justify-center space-x-4 mb-8">
                <button onclick="showForm('login')" class="tab-btn px-6 py-2 rounded-lg font-medium focus:outline-none" id="loginTab">
                    Connexion
                </button>
                <button onclick="showForm('register')" class="tab-btn px-6 py-2 rounded-lg font-medium focus:outline-none" id="registerTab">
                    Inscription
                </button>
            </div>

            <!-- connexion -->
            <div id="loginForm" class="bg-white p-8 rounded-xl shadow-md space-y-4">
                <h2 class="text-center text-2xl font-bold text-gray-900 mb-8">Connexion</h2>
                <?php if (isset($loginError)): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        <?php echo $loginError; ?>
                    </div>
                <?php endif; ?>
                <form action="" method="post" class="space-y-6">
                    <!-- <div>
                        <label class="block text-sm font-medium text-gray-700">Type d'utilisateur</label>
                        <select name="userType" class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="client">Client</option>
                            <option value="admin">Administrateur</option>
                        </select>
                    </div> -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Mot de passe</label>
                        <input type="password" name="password" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <button type="submit" name="login" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                        Se connecter
                    </button>
                </form>
            </div>

            <!-- inscription -->
            <div id="registerForm" class="bg-white p-8 rounded-xl shadow-md space-y-4" style="display: none;">
                <h2 class="text-center text-2xl font-bold text-gray-900 mb-8">Inscription</h2>
                <?php if (isset($registerError)): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        <?php echo $registerError; ?>
                    </div>
                <?php endif; ?>
                <form action="" method="post" class="space-y-6" id="registrationForm">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" name="nom" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Prénom</label>
                            <input type="text" name="prenom" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Téléphone</label>
                        <input type="tel" name="tele" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Adresse</label>
                        <input type="text" name="adress" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Mot de passe</label>
                        <input type="password" name="password" required class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <button type="submit" name="register" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none">
                        S'inscrire
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showForm(formType) {
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');
            const loginTab = document.getElementById('loginTab');
            const registerTab = document.getElementById('registerTab');

            if (formType === 'login') {
                loginForm.style.display = 'block';
                registerForm.style.display = 'none';
                loginTab.classList.add('bg-blue-600', 'text-white');
                loginTab.classList.remove('bg-gray-200', 'text-gray-700');
                registerTab.classList.add('bg-gray-200', 'text-gray-700');
                registerTab.classList.remove('bg-blue-600', 'text-white');
            } else {
                loginForm.style.display = 'none';
                registerForm.style.display = 'block';
                registerTab.classList.add('bg-blue-600', 'text-white');
                registerTab.classList.remove('bg-gray-200', 'text-gray-700');
                loginTab.classList.add('bg-gray-200', 'text-gray-700');
                loginTab.classList.remove('bg-blue-600', 'text-white');
            }
        }

        // Initialisation des onglets
        document.addEventListener('DOMContentLoaded', () => {
            showForm('login');
        });
    </script>
</body>
</html>

<?php include '../includes/footer.php'; ?>