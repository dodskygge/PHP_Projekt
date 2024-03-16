<?php
include('../includes/db_conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from form
    $form_username = $_POST['username'];
    $form_password = $_POST['password'];
    $token = bin2hex(random_bytes(16));
    $message = '';

    // Token
    $stmt = $conn->prepare("UPDATE users SET user_token = ? WHERE user_name = ?");
    $stmt->bind_param("ss", $token, $form_username);
    $stmt->execute();

    // Login and check password
    $stmt = $conn->prepare("SELECT user_password FROM users WHERE user_name = ?");
    $stmt->bind_param("s", $form_username);
    $stmt->execute();
    // Bind result variables
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    // Verify the password
    if (password_verify($form_password, $hashed_password)) {
        // Set session variable
        $_SESSION['username'] = $form_username;

        // Set cookie
        setcookie('token', $token, time() + (86400), "/"); // 86400 = 1 day

        $message = '<div class="alert alert-success d-flex justify-content-center align-items-center" style="width: 250px; margin: auto;" role="alert">Zalogowano!</div>';
        // Here you can set your session variables and redirect to the logged in area
    } else {
        $message = '<div class="alert alert-danger d-flex justify-content-center align-items-center" style="width: 250px; margin: auto;" role="alert">Błędny login lub hasło!</div>';

    }

    $stmt->close();
}

$conn->close();
?>

<?php include('../components/header.php'); ?>

<div class="container-fluid">
    <div class="container-fluid d-flex align-items-center justify-content-center">
        <div class="mt-4 col-md-4">
            <div class="mt-4 card-dark">
                <div class="card-body">
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <label for="username">Login:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Hasło:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Zaloguj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
//Notyfikacja
if (!empty($message)) {
    echo $message;
}
?>

<?php include('../components/footer.php'); ?>