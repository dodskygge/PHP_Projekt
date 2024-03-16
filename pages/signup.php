<?php
include('../includes/db_conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $form_username = $_POST['username'];
    $form_email = $_POST['mail'];
    $form_password = $_POST['password'];

    $form_email_check = $_POST['mailCheck'];
    $form_password_check = $_POST['passwordCheck'];

        // Check if email and password are the same
        if ($form_email != $form_email_check) {
            $message = '<div class="alert alert-danger d-flex justify-content-center align-items-center" style="width: 250px; margin: auto;" role="alert">Maile się nie zgadzają!</div>';
        } elseif ($form_password != $form_password_check) {
            $message = '<div class="alert alert-danger d-flex justify-content-center align-items-center" style="width: 250px; margin: auto;" role="alert">Hasła się nie zgadzają</div>';
        } else {

            // Check if form fields are not empty
            if (!empty($form_username) && !empty($form_email) && !empty($form_password)) {
                // Check if username already exists
                $stmt = $conn->prepare("SELECT * FROM users WHERE user_name = ?");
                $stmt->bind_param("s", $form_username);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $message = '<div class="alert alert-danger d-flex justify-content-center align-items-center" style="width: 250px; margin: auto;" role="alert">Użytkownik już istnieje!</div>';

                } else {
                    $hashed_password = password_hash($form_password, PASSWORD_DEFAULT);

                    // SQL query
                    $sql = "INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)";

                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sss", $form_username, $form_email, $hashed_password);

                    // Execute SQL query
                    if ($stmt->execute()) {
                        $message = '<div class="alert alert-success d-flex justify-content-center align-items-center" style="width: 250px; margin: auto;" role="alert">Konto utworzono pomyślnie!</div>';
                    } else {
                        echo "Error: " . $stmt->error;
                    }
                }

                $stmt->close();
            } else {
                $message = '<div class="alert alert-danger d-flex justify-content-center align-items-center" style="width: 250px; margin: auto;" role="alert">Wpisz dane do formularza!</div>';

            }
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
                    <form action="signup.php" method="POST">
                        <div class="form-group">
                            <label for="username">Login:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">E-mail:</label>
                            <input type="email" class="form-control" id="mail" name="mail" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Powtórz E-mail:</label>
                            <input type="email" class="form-control" id="mailCheck" name="mailCheck" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Hasło:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Powtórz hasło:</label>
                            <input type="password" class="form-control" id="passwordCheck" name="passwordCheck" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Zarejestruj się</button>
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
