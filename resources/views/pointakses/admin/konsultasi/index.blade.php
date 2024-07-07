<!-- resources/views/konsultasi/index.blade.php -->
@extends('pointakses.admin.index')

@section('title', 'Konsultasi')

@section('content')
<div class="head-title">
	<div class="left">
		<h1>Konsultasi</h1>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/halaman_konsultasi/style.css') }}">
		<ul class="breadcrumb">
			<li>
				<a class="active" href="{{ route('dashboard') }}">Dashboard</a>
			</li>
			<li><i class='bx bx-chevron-right'></i></li>
			<li>
				<a href="#">Konsultasi</a>
			</li>
		</ul>
	</div>
</div>

<body>
    <link rel="stylesheet" href="assets/halaman_konsultasi/style.css">
    <div class="chat-container">
        <div class="chat-header">
            <h1 class="chat-header-font">Selamat datang di MentalBot</h1>
        </div>
        <div class="chat-messages" id="chat-messages"></div>
        <div class="chat-input">
            <input type="text" id="message-input" placeholder="Type your message here...">
            <button id="send-button">Send</button>
        </div>
    </div>
    <script src="{{ asset('assets/admin/halaman_konsultasi/script.js') }}"></script>
</body>
@endsection

