<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet" type="text/css">
	<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=42ba24f6-3a76-4f9f-9192-23201360664a" type="text/javascript"></script>
	<script type="text/javascript">
    	ymaps.ready(init);
    	function init(){
			var location = ymaps.geolocation;
			var myMap = new ymaps.Map('map', {
    			center: [55.76, 37.64],
    			zoom: 10
			}, {
    			searchControlProvider: 'yandex#search'
			});
			// Получение местоположения и автоматическое отображение его на карте.
			location.get({
        		mapStateAutoApply: true
    		})
			.then(
    			function(result) {
        		// Получение местоположения пользователя.
        			var userAddress = result.geoObjects.get(0).properties.get('text');
        			var userCoodinates = result.geoObjects.get(0).geometry.getCoordinates();
        			// Пропишем полученный адрес в балуне.
        			result.geoObjects.get(0).properties.set({
            			balloonContentBody: 'Адрес: ' + userAddress +
                                '<br/>Координаты:' + userCoodinates
    				});
        			myMap.geoObjects.add(result.geoObjects)
    			},
    			function(err) {
        			console.log('Ошибка: ' + err)
    			}
			);
    	}
</script>
</head>
<body>
    @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="private">
		<div class="locations">
			<div class="locations-create">
				<div class="locations-create__item">
					<label class="locations-create__item_label" for="">
						Название
					</label>
					<input class="locations-create__item_input" id="input1" type="text">
				</div>
				<div class="locations-create__item">
					<label class="locations-create__item_label" for="">
						Долгота
					</label>
					<input class="locations-create__item_input" id="input2" type="text">
				</div>
				<div class="locations-create__item">
					<label class="locations-create__item_label" for="">
						Ширина
					</label>
					<input class="locations-create__item_input" id="input3" type="text">
				</div>
			</div>
			<button class="locations__btn" id="locations__btn" type="button">Ввести данные</button>

		<div class="locations-box-output">
			<div class="locations-box" id="locations-box">
				<div class="outinput-wrapper" id="outinput-wrapper1">
					<label class="home-label" for="outInput1">Название:</label>
					<div class="outInput1"></div>
				</div>
				<div class="outinput-wrapper" id="outinput-wrapper1">
					<label class="home-label" for="outInput2">Долгота:</label>
					<div class="outInput2"></div>
				</div>
				<div class="outinput-wrapper" id="outinput-wrapper1">
					<label class="home-label" for="outInput3">Ширина:</label>
					<div class="outInput3"></div>
				</div>
			</div>
		</div>
		<button class="add-locations__btn locations__btn" id="add-locations__btn">
			Добавить локацию
		</button>
			<div class="locations__list-wrapper">
	
			</div>
		</div>
		<div class="map-wrapper">
			<div id="map" style="width: 100%; height: 100%"></div>
		</div>
	</div>
	

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
			
				<form method="POST" action="/location">
	
					<div class="form-group">
						<textarea name="location" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Название локации'></textarea>  
						@if ($errors->has('location_name'))
							<span class="text-danger">{{ $errors->first('location_name') }}</span>
						@endif
					</div>
					
					<div class="form-group">
						<textarea name="longitude" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Широта'></textarea>  
						@if ($errors->has('longitude'))
							<span class="text-danger">{{ $errors->first('longitude') }}</span>
						@endif
					</div>
					
					<div class="form-group">
						<textarea name="latitude" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Долготаk'></textarea>  
						@if ($errors->has('latitude'))
							<span class="text-danger">{{ $errors->first('latitude') }}</span>
						@endif
					</div>
	
					<div class="form-group">
						<button type="submit" class="add-locations__btn locations__btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Task</button>
					</div>
					{{ csrf_field() }}
				</form>
			</div>
		</div>
	</div>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
			
				<form method="POST" action="/location">
	
					<div class="form-group">
						<textarea name="description" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"></textarea>	
						@if ($errors->has('location'))
							<span class="text-danger">{{ $errors->first('locations') }}</span>
						@endif
					</div>
	
					<div class="form-group">
						<button type="submit" name="update" class="add-locations__btn locations__btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update task</button>
					</div>
				{{ csrf_field() }}
				</form>
			</div>
		</div>
	</div>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
				<div class="flex">
					<div class="flex-auto text-2xl mb-4">Locations List</div>
					
					<div class="flex-auto text-right mt-2">
						<a href="/location" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add new Task</a>
					</div>
				</div>
				<table class="w-full text-md rounded mb-4">
					<thead>
					<tr class="border-b">
						<th class="text-left p-3 px-5">Location</th>
						<th class="text-left p-3 px-5">Actions</th>
						<th class="text-left p-3 px-5">Actions</th>
						<th></th>
					</tr>
					</thead>
					<tbody>
					@foreach(auth()->user()->locations as $location)
						<tr class="border-b hover:bg-orange-100">
							<td class="p-3 px-5">
								{{$location->locations_name}}
							</td>
							<td class="p-3 px-5">
								
								<a href="/location/{{$location->id}}" name="edit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
								<form action="/location/{{$location->id}}" class="inline-block">
									<button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
									{{ csrf_field() }}
								</form>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>


</div>
@endsection

<!--<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=42ba24f6-3a76-4f9f-9192-23201360664a" type="text/javascript"></script>
<script src="https://yandex.st/jquery/2.2.3/jquery.min.js" type="text/javascript"></script>-->


</body>
</html>

