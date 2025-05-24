<?php
include 'conn.php'; // Your DB connection file

$formStatus = ""; // For feedback to user

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajax'])) {
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $message = $_POST['user_message'];

    // Validate basic input
    if (!empty($name) && !empty($email) && !empty($message)) {
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            $formStatus = "Message sent successfully!";
            // Send back response as JSON (success)
            echo json_encode(['status' => $formStatus, 'status_code' => 200]);
        } else {
            $formStatus = "Error: " . $stmt->error;
            // Send back response as JSON (error)
            echo json_encode(['status' => $formStatus, 'status_code' => 500]);
        }

        $stmt->close();
    } else {
        $formStatus = "All fields are required.";
        // Send back response as JSON (error)
        echo json_encode(['status' => $formStatus, 'status_code' => 400]);
    }

    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Paws & Claws Clinic</title>
</head>
<body>
   <div class="container">
    <nav id="header">
         <div class="nav-logo">
             <img src="assets/images/logo.png" alt="Paws & Claws Clinic Logo" class="logo-image">
         </div>

         <div class="nav-menu" id="myNavMenu">
             <ul class="nav_menu_list">
                 <li class="nav_list">
                     <a href="#home" class="nav-link active-link">Home</a>
                     <div class="circle"></div>
                 </li>
                 <li class="nav_list">
                     <a href="#about" class="nav-link">About</a>
                     <div class="circle"></div>
                 </li>
                 <li class="nav_list">
                     <a href="#projects" class="nav-link">Projects</a>
                     <div class="circle"></div>
                 </li>
                 <li class="nav_list">
                     <a href="#contact" class="nav-link">Contact</a>
                     <div class="circle"></div>
                 </li>
             </ul>
         </div>

         <div class="nav-button">
            <a href="assets/pdf/brochure.pdf" download="brochure.pdf">
                <button class="btn">
                    Download Brochure <i class="uil uil-file-alt"></i>
                </button>
            </a>
        </div>

         <div class="nav-menu-btn">
             <i class="uil uil-bars" onclick="myMenuFunction()"></i>
         </div>
     </nav>
    <main class="wrapper">
       <section class="featured-box" id="home">
          <div class="featured-text">
            <div class="featured-text-card">
                <span>Paws & Claws Clinic</span>
            </div>
            <div class="featured-name">
                <p>We Do <span class="typedText"></span></p>
            </div>
            <div class="featured-text-info">
                <p>
                    We offer here expert care with routine check-ups, emergency treatment,
                    and grooming services to keep your pets healthy, happy, and looking their best.
                </p>
            </div>
            <div class="featured-text-btn">
    <a href="reservation.php" class="btn blue-btn">Make Reservation</a>
    
                <a href="assets/pdf/brochure.pdf" download="brochure.pdf">
                    <button class="btn">
                        Download Brochure <i class="uil uil-file-alt"></i>
                    </button>
                </a>

                <div class="social_icons">
    <div class="icon"><a href="https://www.instagram.com/vetsinpracticeanimalhospital/?hl=en" target="_blank"><i class="uil uil-instagram"></i></a></div>
    <div class="icon"><a href="https://x.com/_animalclinic" target="_blank"><i class="uil uil-twitter"></i></a></div>
    <div class="icon"><a href="https://www.facebook.com/Vetsureanimalclinic/" target="_blank"><i class="uil uil-facebook"></i></a></div>
    <div class="icon"><a href="https://www.youtube.com/@evergreenanimalhospital3891" target="_blank"><i class="uil uil-youtube"></i></a></div>
</div>
            </div>
          </div>
          <div class="featured-image">
            <div class="image">
                <img src="assets/images/avatar.png" alt="avatar">
            </div>
          </div>
          <div class="scroll-icon-box">
            <a href="#about" class="scroll-btn">
                <i class="uil uil-mouse-alt"></i>
                <p>Scroll Down</p>
            </a>
          </div>

       </section>
       <section class="section" id="about">
          <div class="top-header">
            <h1>About Me</h1>
          </div>
          <div class="row">
            <div class="col">
                <div class="about-info">
                    <h3>Introduction</h3>
                    <p>At Paws & Claws Clinic, we are dedicated to providing the highest quality care for your pets.
                        Our team is passionate about ensuring that each animal receives the attention and treatment they deserve.
                        With years of experience in veterinary care, we offer a range of services to keep your furry friends happy and healthy.
                        Whether it's a routine check-up, emergency care, or preventive treatment, we are here to support you and your pets every step of the way.
                    </p>
                    <div class="about-btn">
                        <a href="assets/pdf/brochure.pdf" download="brochure.pdf">
                            <button class="btn blue-btn">
                                Download Brochure <i class="uil uil-import"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="skills-box">
                   <div class="skills-header">
                       <h3>Checkups</h3>
                   </div>
                   <div class="skills-list">
                       <span>Physical Exam</span>
                       <span>Vaccinations</span>
                       <span>Bloodwork</span>
                       <span>Parasite Control</span>
                       <span>Weight Management</span>
                       <span>Heart Check</span>
                   </div>
                </div>
                <div class="skills-box">
                   <div class="skills-header">
                       <h3>Surgery Care</h3>
                   </div>
                   <div class="skills-list">
                       <span>Pre-Surgical Evaluation</span>
                       <span>Anesthesia</span>
                       <span>Tumor Removal</span>
                       <span>Emergency Care</span>
                   </div>
                </div>
                <div class="skills-box">
                   <div class="skills-header">
                       <h3>Cleaning</h3>
                   </div>
                   <div class="skills-list">
                       <span>Bathing</span>
                       <span>Nail Trimming</span>
                       <span>Grooming</span>
                   </div>
                </div>
            </div>
          </div>
       </section>

       <section class="section" id="projects">
          <div class="top-header">
              <h1>Projects</h1>
          </div>
          <div class="project-container">
            <div class="project-box">
                <i class="uil uil-briefcase-alt"></i>
                <h3>Completed</h3>
                <label>15+ Finished Projects</label>
            </div>
            <div class="project-box">
                <i class="uil uil-users-alt"></i>
                <h3>Clients</h3>
                <label>25+ Happy Clients</label>
            </div>
            <div class="project-box">
                <i class="uil uil-award"></i>
                <h3>Experience</h3>
                <label>7+ Years in the field</label>
            </div>
          </div>
       </section>

       <section class="section" id="contact">
          <div class="top-header">
            <h1>Get in touch</h1>
            <span>Do you have a project in your mind, contact me here</span>
          </div>
          <div class="row">
             <div class="col">
                <div class="contact-info">
                    <h2>Find Me <i class="uil uil-corner-right-down"></i></h2>
                    <p><i class="uil uil-envelope"></i> Email: PawsClaws@gmail.com</p>
                    <p><i class="uil uil-phone"></i> Tel: +87000</p>
                </div>
             </div>

             <form id="contact-form" action="" method="POST">
                <div class="col">
                    <div class="form-control">
                        <div class="form-inputs">
                            <input type="text" class="input-field" placeholder="Name" name="user_name" required>
                            <input type="email" class="input-field" placeholder="Email" name="user_email" required>
                         </div>
                        <div class="text-area">
                            <textarea placeholder="Message" name="user_message" required></textarea>
                        </div>
                        <div class="form-button">
                            <button type="submit" class="btn">Send <i class="uil uil-message"></i></button>
                        </div>
                        <div id="form-status" style="margin-top: 15px;"></div>
                    </div>
                </div>
             </form>
          </div>
       </section>

    </main>

    <footer>
        <div class="top-footer">
            <p>Paws & Claws Clinic</p>
        </div>
        <div class="middle-footer">
            <ul class="footer-menu">
                <li class="footer_menu_list">
                    <a href="#home">Home</a>
                </li>
                <li class="footer_menu_list">
                    <a href="#about">About</a>
                </li>
                <li class="footer_menu_list">
                    <a href="#projects">Projects</a>
                </li>
                <li class="footer_menu_list">
                    <a href="#contact">Contact</a>
                </li>
            </ul>
        </div>
        <div class="bottom-footer">
            <p>Copyright &copy; <a href="#home" style="text-decoration: none;">Paws & Claws Clinic</a> - All rights reserved</p>
        </div>
    </footer>
    </div>

    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="assets/js/main.js"></script>
    <script>
        // Using jQuery for the AJAX request
        $(document).ready(function() {
            $("#contact-form").submit(function(e) {
                e.preventDefault();  // Prevent default form submission

                // Gather form data
                var formData = $(this).serialize();
                formData += "&ajax=true";  // Append the ajax flag

                // Send AJAX request
                $.ajax({
                    type: "POST",
                    url: "",  // Current page URL
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        if (response.status === "Message sent successfully!") {
                            // Success alert
                            Swal.fire({
                                title: 'Success!',
                                text: response.status,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                // Optionally reset the form after success
                                $('#contact-form')[0].reset();
                            });
                        } else {
                            // Error alert
                            Swal.fire({
                                title: 'Error!',
                                text: response.status,
                                icon: 'error',
                                confirmButtonText: 'Try Again'
                            });
                        }
                    },
                    error: function() {
                        // If something goes wrong with the AJAX request
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while processing your request.',
                            icon: 'error',
                            confirmButtonText: 'Try Again'  
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
