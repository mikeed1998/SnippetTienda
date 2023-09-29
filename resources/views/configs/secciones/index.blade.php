@extends('layouts.admin')
@section('cssExtras')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('jsLibExtras')

@endsection
@section('styleExtras')
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
@endsection
@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('config.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>
	<div class="row justify-content-center">
		@foreach ($seccion as $card)
			
				<div class="col-6 col-lg-2 p-2">
					<a href="{{route('config.seccion.show',$card->slug)}}"  class="card h-100 card1" style="box-shadow: none; border-radius: 16px;">
						<span class="card-body text-muted text-center">
							<i class="{{$card->portada}} mb-3"></i> <br>
							<span class="icon_c text-capitalize"> {{$card->seccion}}</span>
						</span>
					</a>
				</div>
			
		@endforeach
	</div>
@endsection
@section('jsLibExtras2')

@endsection
@section('jqueryExtra')

@endsection
