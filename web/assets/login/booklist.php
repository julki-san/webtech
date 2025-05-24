<?php
error_reporting(0);
ini_set('display_errors', 0);
include('../../conn.php');
$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);
?>


<?php $conn->close(); ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paws & Claws Clinic</title>
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <header>
        <div class="logosec">
        <div class="logo"><img src="../images/favicon.png" alt="Logo" class="logo"></div>
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
                 class="icn menuicn"
                 id="menuicn"
                 alt="menu-icon">
        </div>
        <div class="header-content">
            <div class="content">
                <p><?php echo htmlspecialchars($display_content); ?></p>
            </div>
            <div class="dp">
                <div class="profile-container">
                <img src="../images/profile.png"
     class="dpicn dropdown-toggle"
     alt="Profile Image"
     onclick="toggleDropdown()">

                    <div id="profile-dropdown" class="dropdown-content">
                        <a href="#" class="logout-link">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        </header>

    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">
                <div class="option2 nav-option">
                        <img src="../images/dash.png"
                             class="nav-img"
                             alt="dashboard">
                        <a href="dashboard.php">
                            <h3>Dashboard</h3>
                        </a>
                    </div>

                    
                    <div class="nav-option option1">
                        <img src="../images/booking.png"
                             class="nav-img"
                             alt="articles">
                        <a href="booklist.php">
                            <h3>Booking List</h3>
                        </a>
                    </div>
                    <div class="nav-option option4">
                        <img src="../images/report.png"
                             class="nav-img"
                             alt="institution">
                        <a href="report.php">
                            <h3>Report</h3>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="main">
            <div class="searchbar2">
                <input type="text"
                       name=""
                       id=""
                       placeholder="Search">
                <div class="searchbtn">
                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
                         class="icn srchicn"
                         alt="search-button">
                </div>
            </div>
            <div class="dashboard">
            <h2>Reservation Records</h2>
<?php if ($result->num_rows > 0): ?>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Departure Date</th>
            <th>Return Time</th>
            <th>Service Type</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row["first_name"]) ?></td>
            <td><?= htmlspecialchars($row["last_name"]) ?></td>
            <td><?= htmlspecialchars($row["email"]) ?></td>
            <td><?= htmlspecialchars($row["phone"]) ?></td>
            <td><?= htmlspecialchars($row["departure_date"]) ?></td>
            <td><?= htmlspecialchars($row["return_time"]) ?></td>
            <td><?= htmlspecialchars($row["service_type"]) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>No records found.</p>
<?php endif; ?>
    </div>
</body> 
</html>
<script>
let menuicn = document.querySelector(".menuicn");
let nav = document.querySelector(".navcontainer");

menuicn.addEventListener("click", () => {
    nav.classList.toggle("navclose");
})
document.addEventListener('DOMContentLoaded', function() {
  const welcomeMessage = "<?php echo htmlspecialchars($welcome_message); ?>";

  // Display SweetAlert with the welcome message, no OK button
  Swal.fire({
    title: 'Welcome!',
    text: welcomeMessage,
    width: '350px', // Adjust width if needed
    timer: 2000, // SweetAlert will close after 3 seconds
    showConfirmButton: false, // Hide the OK button
    allowOutsideClick: false, // Prevent closing by clicking outside
    timerProgressBar: true, // Optional: show a progress bar
    customClass: {
      title: 'welcome-title', // Apply custom styles for the title
      popup: 'welcome-popup', // Apply custom styles for the popup
      icon: 'welcome-icon', // Apply custom styles for the icon
      content: 'welcome-content' // Apply custom styles for the content
    }
  }).then(() => {
    // Logout SweetAlert can now be displayed
  });
});
</script>
<script>
// Toggle the dropdown visibility
function toggleDropdown() {
    const dropdown = document.getElementById('profile-dropdown');
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
}

// SweetAlert for logout confirmation
document.querySelector('.logout-link').addEventListener('click', function (event) {
    event.preventDefault(); // Prevent default link behavior

    Swal.fire({
        title: 'Are you sure?',
        text: 'You will be logged out.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, log out!',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            // Perform logout action, e.g., redirect or API call
            window.location.href = 'index.php'; // Replace with your logout script or redirect
        }
    });
});

// Close dropdown if clicked outside
window.addEventListener('click', function (event) {
    if (!event.target.matches('.dropdown-toggle')) {
        const dropdown = document.getElementById('profile-dropdown');
        if (dropdown) {
            dropdown.style.display = 'none';
        }
    }
});
</script>
<style>
.dashboard {
    max-width: 1200px;
    margin: 40px auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
    overflow-x: auto; /* Add scroll if needed on smaller screens */
}

.dashboard h2 {
    text-align: center;
    margin-bottom: 25px;
    font-size: 28px;
    color: #2c3e50;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

th, td {
    padding: 12px 15px;
    text-align: left;
    white-space: nowrap; /* Prevent wrapping */
}

th {
    background-color: #2d98da;
    color: #fff;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

tr:nth-child(even) {
    background-color: #f0f4f8;
}

tr:hover {
    background-color: #dff3ff;
    transition: background-color 0.3s ease;
}

td {
    color: #333;
}

p {
    text-align: center;
    color: #888;
    font-size: 16px;
}

/* Main CSS Here */
.logo {
    height: 100px;         /* Adjust height of the logo */
    width:100px; 
    margin-right: 15px;   /* Adds spacing between the logo and the text */
    margin-left:15px;
    margin-top:10px;
}
a {
    text-decoration: none;
}
/* Ensure headings and other elements don't have underlines */
.topic-heading, .topic {
    text-decoration: none;
}
.icon {
    font-size: 50px; /* Adjust the size as needed */
}

{

  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
:root {
  --background-color1: #ffffff; /* White */
  --background-color2: #fafaff; /* Light gray */
  --background-color3: #ededed; /* Lighter gray */
  --background-color4: #ffffff; /* White */
  --primary-color: #000000; /* Black */
  --secondary-color: #000000; /* Black */
  --Border-color: #000000; /* Black */
  --one-use-color: #000000; /* Black */
  --two-use-color: #000000; /* Black */
}
body {
  background-color: var(--background-color4);
  max-width: 100%;
  overflow-x: hidden;
}

header {
  height: 123px;
  width: 100vw;
  padding: 0 30px;
  background-color: var(--background-color1);
  position: fixed;
  z-index: 100;
  box-shadow: 1px 1px 15px rgba(161, 182, 253, 0.825);
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom:90vh;
}

.logo {
  font-size: 27px;
  font-weight: 600;
  color: var(--primary-color); /* Black */
}

.icn {
  height: 30px;
}
.menuicn {
  cursor: pointer;
}

.searchbar,
.message,
.logosec {
  display: flex;
  align-items: center;
  justify-content: center;
}

.searchbar2 {
  display: none;
}

.logosec {
  gap: 60px;
}

.searchbar input {
  width: 250px;
  height: 42px;
  border-radius: 50px 0 0 50px;
  background-color: var(--background-color3); /* Light gray */
  padding: 0 20px;
  font-size: 15px;
  outline: none;
  border: none;
}
.searchbtn {
  width: 50px;
  height: 42px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 0px 50px 50px 0px;
  background-color: var(--secondary-color); /* Black */
  cursor: pointer;
}

.message {
  gap: 40px;
  position: relative;
  cursor: pointer;
}
.circle {
  height: 7px;
  width: 7px;
  position: absolute;
  background-color: #fa7bb4;
  border-radius: 50%;
  left: 19px;
  top: 8px;
}

/* Add a flex container to hold both the profile image and text */
.header-content {
  display: flex;
  align-items: center; /* Vertically center the elements */
}

/* Make the header-content a flex container */
.header-content {
    display: flex;
    align-items: center; /* Vertically align the items */
    justify-content: space-between; /* Add space between the elements */
}

/* Profile image container */
.dp {
    height: 40px; /* Set height */
    width: 40px;  /* Set width to match the height */
    background-color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    margin-left: 15px; /* Space between the image and content */
    cursor: pointer;
}

/* Content paragraph */
.content p {
    font-size: 16px;
    font-weight: 500;
    margin: 0;
    white-space: nowrap; /* Prevent text from wrapping */
    text-align: left; /* Align text to the left */
}


.dpicn {
  height: 100%; /* Ensure the image fills the circle */
  width: 100%;
  object-fit: cover; /* Maintain aspect ratio and cover the container */
}
.dpicn:hover {
    border-color: #007bff; /* Highlight effect on hover */
}

/* Dropdown styling */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: black;
    min-width: 100px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
    border-radius: 5px;
    margin-left:-50px;

}

.dropdown-content a {
    color: white;
    padding: 10px;
    text-decoration: none;
    display: block;
    font-size: 14px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

.dropdown-content a:last-child {
    border-bottom: none;
}

.dropdown-content a:hover {
    background-color: white;
    color:black;
    border-radius: 5px;
}

/* Show dropdown when visible */
.profile-container .dropdown-content.show {
    display: block;
    
}
.content {
  display: flex;
  align-items: center; /* Vertically center the content */
  gap: 10px; /* Space between the profile image and text */
}

.content p {
  font-size: 16px;
  font-weight: 500;
  margin: 0; /* Remove default margin */
  white-space: nowrap; /* Prevent content from wrapping */
  text-align: center; /* Center-align text horizontally */
}


.main-container {
  display: flex;
  width: 100vw;
  position: relative;
  top: 70px;
  z-index: 1;
}
.dpicn {
  height: 42px;
}

.main {
  height: calc(100vh - 70px);
  width: 100%;
  overflow-y: scroll;
  overflow-x: hidden;
  padding: 40px 30px 30px 30px;
}

.main::-webkit-scrollbar-thumb {
  background-image: 
        linear-gradient(to bottom, rgb(0, 0, 85), rgb(0, 0, 50));
}
.main::-webkit-scrollbar {
  width: 5px;
}
.main::-webkit-scrollbar-track {
  background-color: #9e9e9eb2;
}

.box-container {
  display: flex;
  justify-content: space-evenly;
  align-items: center;
  flex-wrap: wrap;
  gap: 40px;
  color:white;
}

.box {
  flex-basis: calc(33.33% - 40px); /* Adjust this to fit 3 boxes per row */
  max-width: calc(33.33% - 40px); /* Ensures it doesn't exceed 3 items per row */
  box-sizing: border-box; /* Ensures padding and border are included in the width calculation */
}

.nav {
  min-height: 91vh;
  width: 250px;
  background-color: var(--background-color2); /* Light gray */
  position: absolute;
  top: 0px;
  left: 0;
  box-shadow: 1px 1px 10px rgba(198, 189, 248, 0.825);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  overflow: hidden;
  padding: 30px 0 20px 10px;
}

.navcontainer {
  height: calc(100vh - 70px);
  width: 250px;
  position: relative;
  overflow-y: scroll;
  overflow-x: hidden;
  transition: all 0.5s ease-in-out;
  margin-left:1vh;
}

.navcontainer::-webkit-scrollbar {
  display: none;
}

/* Remove underline from links */
.nav a {
  text-decoration: none;
  color: inherit; /* Ensure the color of the text is inherited from the parent */
}

.nav a:hover {
  text-decoration: none; /* Optional: Prevent underline on hover */
}

.navclose {
  width: 78px;
}
.nav-option {
  width: 250px;
  height: 60px;
  display: flex;
  align-items: center;
  padding: 0 30px 0 20px;
  gap: 20px;
  transition: all 0.1s ease-in-out;
  font-size:14px;
}
.nav-option:hover {
  border-left: 5px solid black;
  background-color: #dadada;
  cursor: pointer;
}
.nav-img {
  height: 40px;
}

.nav-upper-options {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 30px;
}

.option1 {
  border-left: 5px solid black;
  color: black;
  cursor: pointer;
}
.option1:hover {
  border-left: 5px solid black;
  background-color: var(--background-color2); /* Light gray */
}
.box {
  height: 130px;
  width: 230px;
  border-radius: 20px;
  box-shadow: 3px 3px 10px rgba(0, 30, 87, 0.751);
  padding: 20px;
  display: flex;
  align-items: center;
  justify-content: space-around;
  cursor: pointer;
  transition: transform 0.3s ease-in-out;
}
.box:hover {
  transform: scale(1.08);
}

.box:nth-child(1),
.box:nth-child(3) {
  background-color: var(--one-use-color); /* Black */
  text-decoration: none; /* Ensures no underline */
}

.box:nth-child(2),
.box:nth-child(4),
.box:nth-child(5),
.box:nth-child(6) {
  background-color: var(--two-use-color); /* Black */
  text-decoration: none; /* Ensures no underline */
}


.box img {
  height: 50px;
}
.box .text {
  color: white;
  text-decoration: none; /* Ensures no underline */
  
}
.topic {
  font-size: 13px;
  font-weight: 400;
  letter-spacing: 1px;
  text-decoration: none; /* Ensures no underline */
}

.topic-heading {
  font-size: 30px;
  letter-spacing: 3px;
  text-decoration: none; /* Ensures no underline */
}

.report-container {
  min-height: 300px;
  max-width: 1200px;
  margin: 70px auto 0px auto;
  background-color: #ffffff; /* White */
  border-radius: 30px;
  box-shadow: 3px 3px 10px rgb(188, 188, 188);
  padding: 0px 20px 20px 20px;
}
.report-header {
  height: 80px;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px 20px 10px 20px;
  border-bottom: 2px solid rgba(0, 20, 151, 0.59);
}

.recent-Articles {
  font-size: 30px;
  font-weight: 600;
  color: var(--two-use-color); /* Black */
}

.view {
  height: 35px;
  width: 90px;
  border-radius: 8px;
  background-color: var(--two-use-color); /* Black */
  color: white;
  font-size: 15px;
  border: none;
  cursor: pointer;
}

.report-body {
  max-width: 1160px;
  overflow-x: auto;
  padding: 20px;
}
.report-topic-heading,
.item1 {
  width: 1120px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.t-op {
  font-size: 18px;
  letter-spacing: 0px;
}

.items {
  width: 1120px;
  margin-top: 15px;
}

.item1 {
  margin-top: 20px;
}
.t-op-nextlvl {
  font-size: 14px;
  letter-spacing: 0px;
  font-weight: 600;
}

.label-tag {
  width: 100px;
  text-align: center;
  background-color: #000000; /* Black */
  color: white;
  border-radius: 4px;
}
.swal2-popup.welcome-popup {
  font-family: 'Arial', sans-serif; /* Customize font */
  font-size: 12px; /* Customize font size */
  background-color: #f7f9fc; /* Light background color */
  border-radius: 10px; /* Rounded corners */
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); /* Soft shadow */
  color: #333; /* Text color */
  width: 200px; /* Set fixed width */
  position: fixed; /* Fix the position */
  top: 20px; /* Distance from the top */
  right: 20px; /* Distance from the right */
  z-index: 9999; /* Ensure it stays on top */
  transform: none !important; /* Prevent SweetAlert from centering */
 
}

.swal2-title.welcome-title  {
  font-size: 14px; /* Title font size */
  color: green; /* Custom title color */
}

.swal2-content.welcome-content{
  font-size: 10px; /* Content font size */
  color: #555; /* Text content color */
}
.small-popup {
  display: flex;
  align-items: center;
}
.swal2-icon.welcome-title  {
  position: absolute; /* Position icon absolutely within the relative parent */
  left: 0; /* Align icon to the left edge of the container */
  top: 50%; /* Center vertically */
  transform: translateY(-50%); /* Adjust for vertical centering */
  overflow: hidden; /* Hide any overflow */
  margin-left:10px;
  margin-right:-10px;
  margin-top:0px; 
}
.centered-content {
  text-align: center; /* Center text horizontally */
}

/* Responsive CSS Here */
@media screen and (max-width: 950px) {
  .nav-img {
    height: 25px;
  }
  .nav-option {
    gap: 30px;
  }
  .nav-option h3 {
    font-size: 15px;
  }
  .report-topic-heading,
  .item1,
  .items {
    width: 800px;
  }
}

@media screen and (max-width: 850px) {
  .nav-img {
    height: 30px;
  }
  .nav-option {
    gap: 30px;
  }
  .nav-option h3 {
    font-size: 20px;
  }
  .report-topic-heading,
  .item1,
  .items {
    width: 700px;
  }
  .navcontainer {
    width: 100vw;
    position: absolute;
    transition: all 0.6s ease-in-out;
    top: 0;
    left: -100vw;
  }
  .nav {
    width: 100%;
    position: absolute;
  }
  .navclose {
    left: 00px;
  }
  .searchbar {
    display: none;
  }
  .main {
    padding: 40px 30px 30px 30px;
  }
  .searchbar2 {
    width: 100%;
    display: flex;
    margin: 0 0 40px 0;
    justify-content: center;
  }
  .searchbar2 input {
    width: 250px;
    height: 42px;
    border-radius: 50px 0 0 50px;
    background-color: var(--background-color3);
    padding: 0 20px;
    font-size: 15px;
    border: 2px solid var(--secondary-color);
  }
}

@media screen and (max-width: 490px) {
  .message {
    display: none;
  }
  .logosec {
    width: 100%;
    justify-content: space-between;
  }
  .logo {
    font-size: 20px;
  }
  .menuicn {
    height: 25px;
  }
  .nav-img {
    height: 25px;
  }
  .nav-option {
    gap: 25px;
  }
  .nav-option h3 {
    font-size: 12px;
  }
  .nav-upper-options {
    gap: 15px;
  }
  .recent-Articles {
    font-size: 20px;
  }
  .report-topic-heading,
  .item1,
  .items {
    width: 550px;
  }
}

@media screen and (max-width: 400px) {
  .recent-Articles {
    font-size: 17px;
  }
  .view {
    width: 60px;
    font-size: 10px;
    height: 27px;
  }
  .report-header {
    height: 60px;
    padding: 10px 10px 5px 10px;
  }
  .searchbtn img {
    height: 20px;
  }
}

@media screen and (max-width: 320px) {
  .recent-Articles {
    font-size: 12px;
  }
  .view {
    width: 50px;
    font-size: 8px;
    height: 27px;
  }
  .report-header {
    height: 60px;
    padding: 10px 5px 5px 5px;
  }
  .t-op {
    font-size: 12px;
  }
  .t-op-nextlvl {
    font-size: 10px;
  }
  .report-topic-heading,
  .item1,
  .items {
    width: 300px;
  }
  .report-body {
    padding: 10px;
  }
  .label-tag {
    width: 70px;
  }
  .searchbtn {
    width: 40px;
  }
  .searchbar2 input {
    width: 180px;
  }
}
</style>