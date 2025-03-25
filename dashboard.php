<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZMS Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { display: flex; font-family: 'Poppins', sans-serif; background: #eef2f7; }
        .sidebar { width: 250px; background: #34495e; color: white; min-height: 100vh; padding-top: 20px; position: fixed; }
        .sidebar h3 { text-align: center; padding-bottom: 20px; font-size: 20px; }
        .sidebar a { color: white; text-decoration: none; padding: 12px 20px; display: block; font-size: 16px; transition: 0.3s; }
        .sidebar a:hover { background: #1abc9c; border-radius: 5px; }
        .submenu { display: none; padding-left: 15px; }
        .submenu a { font-size: 14px; padding: 8px 20px; }
        .content { margin-left: 260px; padding: 20px; width: 100%; }
        .card { box-shadow: 4px 4px 15px rgba(0, 0, 0, 0.2); border-radius: 10px; transition: transform 0.3s ease-in-out; padding: 20px; margin-bottom: 20px; color: white; text-align: center; font-weight: bold; }
        .card:hover { transform: translateY(-5px); }
        
        /* Unique Colors for Each Card */
        .card:nth-child(1) { background:rgb(22, 134, 208); }  /* Blue */
        .card:nth-child(2) { background:rgb(187, 19, 42); }  /* Green */
        .card:nth-child(3) { background:rgb(241, 15, 139); }  /* Yellow */
        .card:nth-child(4) { background: #e74c3c; }  /* Red */
        .card:nth-child(5) { background:rgb(14, 69, 2); }  /* Purple */
        .card:nth-child(6) { background: #1abc9c; }  /* Teal */
        .card:nth-child(7) { background:rgb(180, 199, 142); }  /* Orange */
        .card:nth-child(8) { background: #34495e; }  /* Dark Blue */
        .card:nth-child(9) { background: #16a085; }  /* Dark Teal */
        .card:nth-child(10) { background: #8e44ad; } /* Dark Purple */
        .card:nth-child(11) { background: #c0392b; } /* Dark Red */
        .card:nth-child(12) { background: #27ae60; } /* Dark Green */
        .card:nth-child(13) { background:rgb(211, 165, 113); } /* Deep Blue */
        .card:nth-child(14) { background: #d35400; } /* Orange */
    </style>
</head>
<body>
    <div class="sidebar">
        <h3>ZMS ADMIN</h3>
        <a href="dashboard.php">Dashboard</a>
        <a href="#" onclick="toggleMenu('animals')">Animals Details</a>
        <div id="animals" class="submenu">
            <a href="add-animals.php">Add Animals</a>
            <a href="manage-animals.php">Manage Animals</a>
        </div>
        <a href="manage-type-ticket.php">Manage Type Ticket</a>
        <a href="#" onclick="toggleMenu('normal')">Normal Ticket</a>
        <div id="normal" class="submenu">
            <a href="add-normal-ticket.php">Add Ticket</a>
            <a href="manage-normal-ticket.php">Manage Ticket</a>
        </div>
        <a href="#" onclick="toggleMenu('foreigner')">Foreigner Ticket</a>
        <div id="foreigner" class="submenu">
            <a href="add-foreigner-ticket.php">Add Ticket</a>
            <a href="manage-foreigner-ticket.php">Manage Ticket</a>
        </div>
        <a href="#" onclick="toggleMenu('reports')">Reports</a>
        <div id="reports" class="submenu">
            <a href="normal-people-report.php">Normal People Reports</a>
            <a href="foreigner-people-report.php">Foreigner People Reports</a>
        </div>
        <a href="#" onclick="toggleMenu('search')">Search</a>
        <div id="search" class="submenu">
            <a href="normal-ticket-search.php">Normal Ticket Search</a>
            <a href="foreigner-search.php">Foreigner Ticket Search</a>
        </div>
        <li><a href="logout.php" onclick="return confirm('Are you sure you want to logout?');">Logout</a></li>

    </div>
    <div class="content">
        <h2 class="mb-4">Dashboard</h2>
        <div class="row">
            <div class="col-md-4"><div class="card"><h5>Total Animals</h5><span>8</span></div></div>
            <div class="col-md-4"><div class="card"><h5>Total Normal Adult Visitor</h5><span>6</span></div></div>
            <div class="col-md-4"><div class="card"><h5>Total Normal Children Visitor</h5><span>1</span></div></div>
            <div class="col-md-4"><div class="card"><h5>Today Normal Adult Visitor</h5><span>0</span></div></div>
            <div class="col-md-4"><div class="card"><h5>Today Normal Children Visitor</h5><span>0</span></div></div>
            <div class="col-md-4"><div class="card"><h5>Yesterday Normal Adult Visitor</h5><span>0</span></div></div>
            <div class="col-md-4"><div class="card"><h5>Yesterday Normal Children Visitor</h5><span>0</span></div></div>
            <div class="col-md-4"><div class="card"><h5>Total Foreigner Adult Visitor</h5><span>6</span></div></div>
            <div class="col-md-4"><div class="card"><h5>Total Foreigner Child Visitor</h5><span>3</span></div></div>
            <div class="col-md-4"><div class="card"><h5>Today Foreigner Adult Visitor</h5><span>0</span></div></div>
            <div class="col-md-4"><div class="card"><h5>Today Foreigner Children Visitor</h5><span>0</span></div></div>
            <div class="col-md-4"><div class="card"><h5>Yesterday Foreigner Adult Visitor</h5><span>0</span></div></div>
            <div class="col-md-4"><div class="card"><h5>Yesterday Foreigner Child Visitor</h5><span>0</span></div></div>
        </div>
    </div>
    <script>
        function toggleMenu(id) {
            var submenu = document.getElementById(id);
            submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
        }
    </script>
</body>
</html>
