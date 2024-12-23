 <?php
// ... existing code ...
include 'koneksi.php'; // Menggunakan koneksi dari file koneksi.php

// Mengambil data laporan
$sql = "SELECT * FROM laporan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	 <!-- Boxicons  -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="message.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>Admin Synergy</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Admin</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
                <i class='bx bxs-report'></i>
					<span class="text">Laporan</span>
				</a>
			</li>
			<li>
				<a href="message.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">message</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<!-- <li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li> -->
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<!-- <nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav> -->
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<!-- <a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a> -->
			</div>

			<!-- <ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>1020</h3>
						<p>New Order</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>Visitors</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>$2543</h3>
						<p>Total Sales</p>
					</span>
				</li>
			</ul> -->

                <!-- laporan -->
                <div class="table-data">
    <div class="order">
        <div class="head">
            <h3>Laporan</h3>
            <i class='bx bx-search'></i>
            <i class='bx bx-filter'></i>
        </div>
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Pesan</th>
                    <th>Gambar</th>
                    <th>Waktu Laporan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Menampilkan data laporan
                    while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                       
                        <p><?php echo $row['name']; ?></p>
                    </td>
                    <td><?php echo $row['pesan']; ?></td>
                    <td><img src="<?php echo $row['gambar']; ?>" alt="Gambar" width="50"></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td>
                        <form action="hapus_laporan.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?');">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada laporan ditemukan.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
	<script>
	function deleteReport(id) {
		if (confirm('Apakah Anda yakin ingin menghapus laporan ini?')) {
			var xhr = new XMLHttpRequest();
			xhr.open("POST", "hapus_laporan.php", true);
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xhr.onreadystatechange = function () {
				if (xhr.readyState == 4 && xhr.status == 200) {
					alert(xhr.responseText);
					location.reload(); // Muat ulang halaman setelah penghapusan
				}
			};
			xhr.send("id=" + id);
		}
	}
	</script>
</body>
</html>