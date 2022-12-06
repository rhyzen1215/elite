<!DOCTYPE html>
<html lang="en">
	<head>
		@include('layout.header')
		@yield('pageTitle')
		@yield('metaCSRF')
	</head>
	<body>
			@yield('contents')
	</body>
</div>
	@yield('js')
</html>
