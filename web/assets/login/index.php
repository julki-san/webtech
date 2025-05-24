
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login & Sign Up</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 CDN -->
</head>
<body>
    <div class="container" id="container">
        <!-- Sign Up Form -->
        <div class="form-container sign-up-container">
        <form id="signUpForm" method="POST" action="register.php">
                <h1>Create Account</h1>
                <span>or use your email for registration</span>
                <input type="text" name="name" placeholder="Name" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <button type="submit">Sign Up</button>
            </form>
        </div>

        <!-- Sign In Form -->
        <div class="form-container sign-in-container">
        <form id="signInForm" method="POST" action="login.php">
                <h1>Sign in</h1>
                <span>or use your account</span>
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <a href="#">Forgot your password?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>

        <!-- Overlay for toggling between Sign Up and Sign In -->
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start your journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');
        const signUpForm = document.getElementById('signUpForm');
        const signInForm = document.getElementById('signInForm');

        // Overlay toggle functionality
        signUpButton.addEventListener('click', () => {
            container.classList.add('right-panel-active');
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove('right-panel-active');
        });
    </script>
<script>
document.getElementById('authForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    // To know which button was clicked (signUp or signIn)
    // Because both buttons submit the form, we detect clicked button
    const clickedButton = document.activeElement;
    if (clickedButton.name === "signUp") {
        formData.set('signUp', true);
        formData.delete('signIn');
    } else if (clickedButton.name === "signIn") {
        formData.set('signIn', true);
        formData.delete('signUp');
    }

    // If signIn, remove name field to prevent empty validation on backend (optional)
    if (formData.has('signIn')) {
        formData.delete('name');
    }

    fetch('', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if(data.status === "success") {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: data.message,
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                // Reload page or redirect, or clear form if you want
                // location.reload();
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.message
            });
        }
    })
    .catch(() => {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Something went wrong. Please try again.'
        });
    });
});
</script>



</body>
</html>
