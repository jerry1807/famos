@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            padding: 20px;
        }

        .conntection-box {
            background-color: #ffffff;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .plus-icon {
            font-size: 36px;
            cursor: pointer;
        }

        .conntection-box:hover {
            background-color: #ccc; /* Gray background on hover */
            transform: scale(1.1); /* Scale the box on hover */
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2); /* Add a box shadow on hover */
        }
</style>
@endsection


@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0">{{ __('AI BOTS') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{route('user.communications.index')}}"><i class="fa-solid fa-chart-tree-map mr-2 fs-12"></i>{{ __('AI Panel') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}"> {{ __('AI BOTS') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')


<iframe src="https://bandraroad-famos-autogen-chatbot.hf.space/?userid={{ auth()->user()->email }}" width="1000" height="700" frameborder="0" scrolling="auto"></iframe>
   
   
    <h2>{{ auth()->user()->email }}</h2>
        
        <h2>{{ auth()->user()->email }}</h2>
        <h2>asdsadasdasds</h2>

@endsection

