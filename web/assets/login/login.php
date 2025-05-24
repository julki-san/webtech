<?php
// Include database connection
include('../../conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // Success - Login successful
            echo '
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            icon: "success",
                            title: "Login Successful!",
                            text: "Welcome back, ' . $user['name'] . '!",
                            timer: 1500,
                            timerProgressBar: true,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = "booklist.php";
                        });
                    });
                </script>
            ';
        } else {
            echo '
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            icon: "error",
                            title: "Login Failed",
                            text: "Invalid email or password."
                        }).then(() => {
                            window.history.back();
                        });
                    });
                </script>
            ';
        }
    } else {
        echo '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "error",
                        title: "Login Failed",
                        text: "No user found with that email."
                    }).then(() => {
                        window.history.back();
                    });
                });
            </script>
        ';
    }
}
?>
