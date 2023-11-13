<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		
		<title>Task Manager</title>

		<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
		<script src="{{ asset('js/app.js') }}"></script>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
		<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
	</head>
	<body>
		<header class="container-fluid bg-grey">
			<div class="row">
				<div class="col-md-9">
					<a href="/">
						<h1>Task Manager</h1>
					</a>
				</div>
				<div class="col-md-3">
					<nav>
						<ul>
							<li>
								<a href="/tasks/create/">
									<i class="bi bi-plus"></i> Add Task
								</a>
							</li>
						</ul>
					</nav>
				</div>
		</header>
		<main class="container">
			{{ $slot }}
		</main>
		<footer>
			Copyright &copy; 2023
		</footer>
	</body>
</html>