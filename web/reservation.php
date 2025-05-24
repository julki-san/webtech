<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $departureDate = $_POST['departureDate'];
    $returnTime = $_POST['returnTime'];
    $services = $_POST['services'];

    $sql = "INSERT INTO bookings (first_name, last_name, email, phone, departure_date, return_time, service_type)
            VALUES ('$firstName', '$lastName', '$email', '$phone', '$departureDate', '$returnTime', '$services')";

    if ($conn->query($sql) === TRUE) {
        echo '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "success",
                    title: "Booking Successful!",
                    text: "Thank you, ' . $firstName . '!",
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: true
                }).then(() => {
                    window.location.href = "index.php"; // Redirect to form
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
                    title: "Booking Failed",
                    text: "Something went wrong. Please try again.",
                    showConfirmButton: true
                }).then(() => {
                    window.history.back();
                });
            });
        </script>
        ';
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Booking Form</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
  <style>
    input[type="date"]::-webkit-calendar-picker-indicator,
    input[type="time"]::-webkit-calendar-picker-indicator {
      filter: invert(0.4) sepia(1) saturate(5) hue-rotate(180deg);
    }
  </style>
</head>
<body class="min-h-screen bg-center bg-no-repeat flex items-center justify-center p-4" style="background-image: url('assets/images/bg.png'); background-size: 100% 100%; background-position: center; background-repeat: no-repeat;">


  <form action="" method="POST" class="w-full max-w-lg bg-white bg-opacity-95 rounded-xl shadow-lg p-6 space-y-5" aria-label="Booking Form">
    <h1 class="text-lg font-semibold text-center text-gray-700">Booking Form</h1>

    <!-- Name -->
    <div class="grid grid-cols-2 gap-4">
      <div>
        <label for="firstName" class="block text-sm font-medium text-gray-700">First Name <span class="text-red-600">*</span></label>
        <input type="text" id="first_name" name="firstName" required placeholder="First"
               class="mt-1 block w-full rounded-md bg-blue-100 border border-gray-300 px-3 py-2 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300" />
      </div>
      <div>
        <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name <span class="text-red-600">*</span></label>
        <input type="text" id="last_name" name="lastName" required placeholder="Last"
               class="mt-1 block w-full rounded-md bg-blue-100 border border-gray-300 px-3 py-2 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300" />
      </div>
    </div>

    <!-- Email & Phone -->
    <div class="grid grid-cols-2 gap-4">
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email <span class="text-red-600">*</span></label>
        <input type="email" id="email" name="email" required
               class="mt-1 block w-full rounded-md bg-blue-100 border border-gray-300 px-3 py-2 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300" />
        <p class="text-xs text-gray-500 mt-1">We will send your booking copy here.</p>
      </div>
      <div>
        <label for="phone" class="block text-sm font-medium text-gray-700">Phone <span class="text-red-600">*</span></label>
        <input type="tel" id="phone" name="phone" required placeholder="### ### ####"
               class="mt-1 block w-full rounded-md bg-blue-100 border border-gray-300 px-3 py-2 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300" />
      </div>
    </div>

    <!-- Dates -->
    <div class="grid grid-cols-2 gap-4">
      <div>
        <label for="departureDate" class="block text-sm font-medium text-gray-700">Departure Date <span class="text-red-600">*</span></label>
        <input type="date" id="departure_date" name="departureDate" required
               class="mt-1 block w-full rounded-md bg-blue-100 border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300" />
      </div>
      <div>
        <label for="returnTime" class="block text-sm font-medium text-gray-700">Return Time <span class="text-red-600">*</span></label>
        <input type="time" id="return_time" name="returnTime" required
               class="mt-1 block w-full rounded-md bg-blue-100 border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300" />
      </div>
    </div>

    <!-- Services-->
    <div>
  <label for="services" class="block text-sm font-medium text-gray-700">Type of Services <span class="text-red-600">*</span></label>
  <select id="service_type" name="services" required
          class="mt-1 block w-full rounded-md bg-blue-100 border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300">
    <option value="" disabled selected>*Please Select*</option>
    <option value="Checkups">Checkups</option>
    <option value="Physical Exam">Physical Exam</option>
    <option value="Vaccinations">Vaccinations</option>
    <option value="Bloodwork">Bloodwork</option>
    <option value="Parasite Control">Parasite Control</option>
    <option value="Weight Management">Weight Management</option>
    <option value="Heart Check">Heart Check</option>
    <option value="Surgery Care">Surgery Care</option>
    <option value="Pre-Surgical Evaluation">Pre-Surgical Evaluation</option>
    <option value="Anesthesia">Anesthesia</option>
    <option value="Tumor Removal">Tumor Removal</option>
    <option value="Emergency Care">Emergency Care</option>
    <option value="Cleaning">Cleaning</option>
    <option value="Bathing">Bathing</option>
    <option value="Nail Trimming">Nail Trimming</option>
    <option value="Grooming">Grooming</option>
  </select>
</div>


    <!-- Submit -->
    <button type="submit" class="w-full bg-[#0a2a44] text-white text-sm font-bold py-2 rounded-md hover:bg-[#08375f] transition">
      BOOK
    </button>

    <!-- Footer Notice -->
    <p class="text-[10px] text-center text-gray-600 mt-2">
      Never submit sensitive information such as passwords.
      <a href="#" class="underline">Report abuse</a>
    </p>
  </form>
</body>
</html>
