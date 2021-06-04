<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet" type="text/css">
	<script src="{{ asset('../../js/jquery.min.js') }}" type="text/javascript"  async></script>
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
			<form method="post" action="#">
				<input type="text" name="name" class="nameField" placeholder="Введите имя">
				<input type="text" name="surname" class="surnameField" placeholder="Введите фамилию">
				<input type="text" name="age" class="ageField" placeholder="Введите возраст"> 
				<input type="submit" value="enter" class="button">
			</form>
			<table class="rows">

			</table>
		</div>
		<div class="map-wrapper">
			<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A4bc5362cc6b6088dbc2d9447c8521b89c443a0f8f0e86b7452e2ea5189e0efdd&amp;width=100%&amp;height=100%&amp;lang=ru_RU&amp;scroll=true"></script>
		</div>
	</div>
</div>
@endsection
<!--<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=42ba24f6-3a76-4f9f-9192-23201360664a" type="text/javascript"></script>
<script src="https://yandex.st/jquery/2.2.3/jquery.min.js" type="text/javascript"></script>-->
<script>
	jQuery(document).ready(function() {
    jQuery(".button").bind("click", function() {

        var name = jQuery('.nameField').val();
		var surname = jQuery('.surnameField').val();
		var age = jQuery('.ageField').val();
        
		jQuery('.nameField').val('');
		jQuery('.surnameField').val('');
		jQuery('.ageField').val('');
		
        jQuery.ajax({
            url: "for_db.php",
            type: "POST",
            data: {name:name, surname:surname, age: age}, // Передаем данные для записи
            dataType: "json",
            success: function(result) {
                if (result){ 
					jQuery('.rows tr').remove();
                    jQuery('.rows').append(function(){
						var res = '';
						for(var i = 0; i < result.users.name.length; i++){
							res += '<tr><td>' + result.users.id[i] + '</td><td>' + result.users.name[i] + '</td><td>' + result.users.surname[i] + '</td><td>' + result.users.age[i] + '</td></tr>';
						}
							return res;
					});
					console.log(result);
                }else{
                    alert(result.message);
                }
				return false;
            }
        });
	return false;
    });
});
</script>

<script src="{{ asset('../../js/home.js') }}" type="text/javascript"  async></script>
</body>
</html>

