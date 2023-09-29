@extends('layouts.admin')
<style>
	/* mas estilisado */	
		body{
			background-color: #e5e8eb  !important;
		}
		.card-header {
			background-color: #b0c1d1  !important;
		}
		.black-skin .btn-primary {
			background-color: #b0c1d1  !important;
		}
		.btn {
			box-shadow: none;
			border-radius: 15px;
		}
	/* mas estilisado */

	.card1:hover{
		background: rgb(28, 115, 255);
		color: white;
		transition: all 0.5s;
	}
	.card1:hover .icon_c{
		color: white;
		transition: all 0.5s;
	}
</style>
@section('content')
	<div class="row justify-content-center">
		@foreach ($cards as $card)
			<div class="col-6 col-lg-2 p-2"  >
				<a href="{{route($card['route'])}}" class="card h-100 card1" style="border-radius: 16px; box-shadow: none;">
					<span class="card-body text-muted text-center">
						<i class="icon_c {{$card['icon']}} fa-3x mb-3"></i> <br>
						<span class="icon_c"> {{$card['text']}} </span>
					</span>
				</a>
			</div>
		@endforeach
	</div>

@endsection

@section('scriptExtras')
	<script type="text/javascript">
	var container = document.querySelector('.custom-scrollbar');

	$('.datepicker').pickadate();
	$(function() {
		$('[data-toggle="tooltip"]').tooltip()
	})
	</script>
@endsection
