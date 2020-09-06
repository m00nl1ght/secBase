<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/report_car.css">
    <title>Пропуск авто</title>
</head>
</html>

<body>
	<div class="no-print">
		<button onclick="window.print()">Печатать</button>
		<hr/>
	</div>
	<div class="page">
		<div class="header">
			<span>Пропуск для автотранспорта</span> <span class="number">№ {{ ticket }}</span>
			<img src="/images/claas-logo.svg"/>
		</div>
		<div class="divider"></div>
		<div class="container">
			<div class="left-part">
				<div>
				<table>
					<tr>
						<td>Автомобиль:<br/>(модель, гос. рег. знак)</td>
						<td>{{ vehicle_license_plate }}</td>
					</tr>
					<tr>
						<td>Водитель:<br/>(Фамилия И. О., № паспорта)</td>
						<td>{{ driver_full_name }}</td>
					</tr>
					<tr>
						<td>Организация:<br/>(отправитель, перевозчик)</td>
						<td>{{ contractor_name }}</td>
					</tr>
					<tr>
						<td>Контактное лицо:<br/>(со стороны ООО "КЛААС")</td>
						<td></td>
					</tr>
				</table>
				</div>
				<div>
				<div class="warning">
					<u>Внимание!</u><br/>
					Ознакомьтесь с правилами пребывания на предприятии<br />
					(на обратной стороне бланка)
					<img src="/img/signs.png" />
				</div>
				</div>
				<div>
				<table>
					<tr>
						<th colspan=2>с правилами ознакомлен</th>
					</tr>
					<tr>
						<th>Дата</th><th>Подпись водителя</th>
					</tr>
					<tr>
						<td class="center">{{ date }} г.</td><td></td>
					</tr>
				</table>
				</div>
			</div>
			<div class="right-part">
				<div>
				<table>
					<tr>
						<th colspan=2>Прибытие</th>
					</tr>
					<tr>
						<td>Дата</td><td>{{ date }} г.</td>
					</tr>
					<tr>
						<td>Время</td><td>{{ registration_time }}</td>
					</tr>
					<tr>
						<td>Ф.И.О. сотрудника охраны</td><td>{{ security }}</td>
					</tr>
				</table>
				</div>
				<div>
				<table>
					<tr>
						<th colspan=2>Убытие</th>
					</tr>
					<tr>
						<td>Время</td><td></td>
					</tr>
					<tr>
						<td>Ф.И.О. сотрудника охраны</td><td></td>
					</tr>
				</table>
				</div>
				<div>
				<table class="claas">
					<caption>Отметки сотрудника ООО "КЛААС"</caption>
					<tr>
						<td>Место выгрузки:</td><td>{{ dock }}</td>
					</tr>
					<tr>
						<td>Груз, количество мест:</td><td></td>
					</tr>
					<tr>
						<td>Разгрузку осуществил:</td><td></td>
					</tr>
				</table>
				</div>
				<div>
				<table>
					<tr>
						<td>Время убытия</td><td></td>
					</tr>
					<tr>
						<td>Ф.И.О. сотрудника<br/>ООО "КЛААС"</td><td></td>
					</tr>
					<tr>
						<td>Подпись</td><td></td>
					</tr>
				</table>
				</div>
			</div>
		</div>
	</div>
	<div class="page">
		<div class="center">
			<img class="location-map" src="{{ location_map }}" />
		</div>
		<div>
			<div class="rules-header">Пожалуйста, соблюдайте правила пребывания на территории предприятия:</div>
			<ul class="rules-text">
				<li>Следуйте правилам безопасности, с которыми Вас ознакомили сотрудники охраны;</li>
				<li>Транспортные средства ООО «КЛААС» имеют право преимущественного проезда;</li>
				<li>Передвижение по территории только в сопровождении или по маршруту, указанному сотрудником  ООО «КЛААС»;</li>
				<li>Парковка разрешена только в специально отведенных местах;</li>
				<li>Запрещен доступ на территорию зоны таможенного контроля, отмеченной соответствующим знаком;</li>
				<li>Запрещены фото- и видеосъемка;</li>
				<li>Запрещено курение, за исключением специально отведенных мест;</li>
				<li>Сотрудники охраны могут произвести осмотр транспортных средств, сумок и других имеющихся при себе вещей.</li>
			</ul>
		</div>
		</div>
</body>
</html>
