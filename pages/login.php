<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('../includes/db_conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from form
    $form_username = $_POST['username'];
    $form_password = $_POST['password'];
    $token = bin2hex(random_bytes(16));
    $token_expiry = date('Y-m-d H:i:s', strtotime('+1 day'));
    $message = ''; //notification message

    // Check password
    $stmt = $conn->prepare("SELECT user_password FROM users WHERE user_name = ?");
    $stmt->bind_param("s", $form_username);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    // Verify the password
    if (password_verify($form_password, $hashed_password)) {
        // Session user id variable
        $stmtid = $conn->prepare("SELECT user_id FROM users WHERE user_name = ?");
        $stmtid->bind_param("s", $form_username);
        $stmtid->execute();  
        $stmtid->bind_result($_SESSION['userid']);
        $stmtid->fetch();
        $stmtid->close();
        // Token
        $stmt = $conn->prepare("UPDATE users SET user_token = ? WHERE user_name = ?");
        $stmt->bind_param("ss", $token, $form_username);
        $stmt->execute();        
        //Token expiry
        $stmt = $conn->prepare("UPDATE users SET user_token_expiry = ? WHERE user_name = ?");
        $stmt->bind_param("ss", $token_expiry, $form_username);
        $stmt->execute();   

        // Set session variable
        $_SESSION['username'] = $form_username;

        // Set cookie
        setcookie('token', $token, time() + (86400), "/"); // 1 day
        $stmt->close();

        $message = '<div class="alert alert-success d-flex justify-content-center align-items-center" style="width: 250px; margin: auto;" role="alert">Zalogowano pomyślnie!</div>';
        sleep(1);
        header("Location: /home.php");
    } else {
        $message = '<div class="alert alert-danger d-flex justify-content-center align-items-center" style="width: 250px; margin: auto;" role="alert">Błędny login lub hasło!</div>';

    }

    
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