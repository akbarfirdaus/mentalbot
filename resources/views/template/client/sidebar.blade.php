<!-- resources/views/template/sidebar.blade.php -->
<section id="sidebar">
    <a href="{{ route('dashboard.client') }}" class="brand">
        <i class='bx bx-message-dots'></i>
        <span class="text">MentalBot</span>
    </a>
    <ul class="side-menu top">
        <li id="menu-dashboard">
            <a href="{{ route('dashboard.client') }}">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li id="menu-konsultasi">
            <a href="{{ route('konsultasi.client') }}">
                <i class='bx bx-conversation'></i>
                <span class="text">Konsultasi</span>
            </a>
        </li>
        <li id="menu-report">
            <a href="{{ route('report.client') }}">
                <i class='bx bxs-report'></i>
                <span class="text">Report</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu top">
        <li>
            <a href="#">
                <i class='bx bxs-cog'></i>
                <span class="text">Ganti Password</span>
            </a>
        </li>
        <li>
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
	if (currentPath === '{{ route('dashboard') }}' || currentPath.includes('dashboard.client')) {
		document.getElementById('menu-dashboard').classList.add('active');
	} else if (currentPath.includes('konsultasi.client')) {
		document.getElementById('menu-konsultasi').classList.add('active');
	} else if (currentPath.includes('report.client')) {
		document.getElementById('menu-report').classList.add('active');
	}
});
</script>
