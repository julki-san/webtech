<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Bar Chart Example</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <canvas id="servicesChart" width="800" height="400"></canvas>

  <script>
    const ctx = document.getElementById("servicesChart").getContext("2d");
    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Type A", "Type B", "Type C", "Type D"],
        datasets: [{
          label: "Total Services",
          data: [12, 19, 7, 14],
          backgroundColor: ["#4dc9f6", "#f67019", "#f53794", "#537bc4"],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            title: {
              display: true,
              text: "Number of Services"
            }
          },
          x: {
            title: {
              display: true,
              text: "Service Types"
            }
          }
        },
        plugins: {
          legend: { display: false },
          title: {
            display: true,
            text: "Total Services by Type"
          }
        }
      }
    });
  </script>
</body>
</html>
