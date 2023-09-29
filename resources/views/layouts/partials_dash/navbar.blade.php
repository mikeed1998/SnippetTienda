
<div class="card col-12" style="">
	<div class="container my-3 d-flex justify-content-between">
		<div class="col-auto">
			<img src="{{asset('img/design/logo.png')}}" style="width: 50%;" alt="">
		</div>
		<div class="col-auto">
			<a href="{{url('home')}}" class="col-12 mb-2 p-2 px-4 d-flex " style="background: rgba(0, 94, 255, 0.179); border-radius: 50px; box-shadow:1px 1px 10px rgba(0, 0, 0, 0.097); color: black;">
				<i class="fa-solid fa-user  me-2 my-auto"></i><p class="col-auto my-auto" style="font-weight: bold;">{{$usuario->name}}</p>
			</a>
		</div>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>