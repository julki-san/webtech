<?php
include('../../conn.php');  

$sql = "SELECT service_type, COUNT(*) as total FROM bookings GROUP BY service_type";
$result = $conn->query($sql);

$data = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[$row['service_type']] = (int)$row['total'];
    }
} else {
    // Return zeros for all known service types if no data found
    $serviceTypes = [
        "Checkups", "Physical Exam", "Vaccinations", "Bloodwork", "Parasite Control",
        "Weight Management", "Heart Check", "Surgery Care", "Pre-Surgical Evaluation",
        "Anesthesia", "Tumor Removal", "Emergency Care", "Cleaning", "Bathing",
        "Nail Trimming", "Grooming"
    ];
    foreach ($serviceTypes as $type) {
        $data[$type] = 0;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
exit;  // Stop further output (very important!)
?>
