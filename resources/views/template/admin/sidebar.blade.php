<!-- resources/views/template/sidebar.blade.php -->
<section id="sidebar">
	<a href="{{ route('dashboard') }}" class="brand">
		<i class='bx bx-message-dots'></i>
		<span class="text">MentalBot</span>
	</a>
	<ul class="side-menu top">
		<li id="menu-dashboard">
			<a href="{{ route('dashboard') }}">
				<i class='bx bxs-dashboard'></i>
				<span class="text">Dashboard</span>
			</a>
		</li>
		<li id="menu-konsultasi">
			<a href="{{ route('konsultasi') }}">
				<i class='bx bx-conversation'></i>
				<span class="text">Konsultasi</span>
			</a>
		</li>
		<li id="menu-data-gejala">
			<a href="{{ route('data_gejala') }}">
				<i class='bx bx-data'></i>
				<span class="text">Data Gejala</span>
			</a>
		</li>
        <li id="menu-report">
			<a href="{{ route('report') }}">
				<i class='bx bxs-report'></i>
				<span class="text">Report</span>
			</a>
		</li>
	</ul>
	<ul class="side-menu top">
		<li id="menu-settings">
			<a href="#">
				<i class='bx bxs-cog'></i>
				<span class="text">Settings</span>
			</a>
		</li>
		<li id="menu-logout">
			<a href="#" class="logout">
				<i class='bx bxs-log-out-circle'></i>
				<span class="text">Logout</span>
			</a>
		</li>
	</ul>
</section>
<script>
document.addEventListener('DOMContentLoaded', function() {
	const menuItems = document.querySelectorAll('#sidebar ul.side-menu.top li');

	menuItems.forEach(item => {
		item.addEventListener('click', function(event) {
			// Cegah aksi default jika diperlukan
			event.preventDefault();

			// Hapus kelas aktif dari semua item
			menuItems.forEach(i => i.classList.remove('active'));

			// Tambahkan kelas aktif ke item yang diklik
			this.classList.add('active');

			// Opsional, navigasi ke href link
			window.location.href = this.querySelector('a').getAttribute('href');
		});
	});

	// Atur kelas aktif berdasarkan URL saat ini
	const currentPath = window.location.pathname;
	if (currentPath === '{{ route('dashboard') }}' || currentPath.includes('dashboard')) {
		document.getElementById('menu-dashboard').classList.add('active');
	} else if (currentPath.includes('konsultasi')) {
		document.getElementById('menu-konsultasi').classList.add('active');
	} else if (currentPath.includes('data_gejala')) {
		document.getElementById('menu-data-gejala').classList.add('active');
	} else if (currentPath.includes('report')) {
		document.getElementById('menu-report').classList.add('active');
	}
});
</script>


