<?php
// Include database connection
include('../../conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure password

    // Check if email already exists
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        // Email already exists
        echo '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "error",
                        title: "Registration Failed",
                        text: "Email is already registered!",
                        confirmButtonText: "Try Again"
                    }).then(() => {
                        window.history.back();
                    });
                });
            </script>
        ';
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            echo '
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            icon: "success",
                            title: "Success!",
                            text: "Registration completed!",
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = "index.php"; // Replace with your login page
                        });
                    });
                </script>
            ';
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $check->close();
    $conn->close();
}
?>
