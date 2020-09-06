<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/reportBlank.css">
    <title>Пропуск посетитель</title>
</head>
</html>

<body>
	<div class="no-print header">
		<button class="header__button" onclick="window.print()">Печатать</button>
	</div>
	<div class="page">
		<div class="title">
            <h1 class="title__head">Пропуск для посетителя №</h1>
			<img class="title__img" src="/img/claas-logo.svg"/>
        </div>
        
        <div class="divider"></div>
        
        <div class="container">
            <div class="left-part">
                <table class="table-box">
                    <tr>
                        <td class="table-box__item table-box__item_w50">
                            <h3 class="table-box__item-head">Автомобиль:</h3>
                            <small>(модель, гос. рег. знак)</small>
                        </td>
                        <td class="table-box__item"> vehicle_license_plate </td>
                    </tr>

                    <tr>
                        <td class="table-box__item table-box__item_w50">
                            <h3 class="table-box__item-head">Водитель:</h3>
                            <small>(Фамилия И. О., № паспорта)</small>
                        </td>
                        <td class="table-box__item"> driver_full_name </td>
                    </tr>

                    <tr>
                        <td class="table-box__item table-box__item_w50">
                            <h3 class="table-box__item-head">Организация:</h3>
                            <small>(отправитель, перевозчик)</small>
                        </td>
                        <td class="table-box__item"> contractor_name </td>
                    </tr>

                    <tr>
                        <td class="table-box__item table-box__item_w50">
                            <h3 class="table-box__item-head">Контактное лицо:</h3>
                            <small>(со стороны ООО "КЛААС")</small>
                        </td>
                        <td class="table-box__item"></td>
                    </tr>
                </table>

                <div class="warning-message">
                    <h3 class="warning-message__text">Внимание!</h3>
                    <p class="warning-message__text">Ознакомьтесь с правилами пребывания на предприятии</p>
                    <small>(на обратной стороне бланка)</small>
                    <img class="warning-message__img" src="/img/signs.png" />
                </div>

        
                <table class="table-box">
                    <tr>
                        <th class="table-box__item" colspan=2>с правилами ознакомлен</th>
                    </tr>
                    <tr>
                        <th class="table-box__item table-box__item_w50">Дата</th>
                        <th class="table-box__item">Подпись водителя</th>
                    </tr>
                    <tr>
                        <td class="table-box__item table-box__item_center table-box__item_w50"> date  г.</td>
                        <td class="table-box__item"></td>
                    </tr>
                </table>

            </div>

            <div class="right-part">
                <table class="table-box">
                    <tr>
                        <th class="table-box__item" colspan=2>Прибытие</th>
                    </tr>

                    <tr>
                        <td class="table-box__item table-box__item_w50">Дата</td>
                        <td class="table-box__item"> date  г.</td>
                    </tr>

                    <tr>
                        <td class="table-box__item table-box__item_w50">Время</td>
                        <td class="table-box__item"> registration_time</td>
                    </tr>

                    <tr>
                        <td class="table-box__item table-box__item_w50">Ф.И.О. сотрудника охраны</td>
                        <td class="table-box__item"> security </td>
                    </tr>
                </table>

                <table class="table-box">
                    <tr>
                        <th class="table-box__item" colspan=2>Убытие</th>
                    </tr>
                    <tr>
                        <td class="table-box__item table-box__item_w50">Время</td>
                        <td class="table-box__item"></td>
                    </tr>
                    <tr>
                        <td class="table-box__item table-box__item_w50">Ф.И.О. сотрудника охраны</td>
                        <td class="table-box__item">Иванов</td>
                    </tr>
                </table>

                <table class="table-box">
                    <caption class="table-box__caption">Отметки сотрудника ООО "КЛААС"</caption>
                    <tr>
                        <td class="table-box__item table-box__item_w50">Место выгрузки:</td>
                        <td class="table-box__item"> dock </td>
                    </tr>
                    <tr>
                        <td class="table-box__item table-box__item_w50">Груз, количество мест:</td>
                        <td class="table-box__item"></td>
                    </tr>
                    <tr>
                        <td class="table-box__item table-box__item_w50">Разгрузку осуществил:</td>
                        <td class="table-box__item"></td>
                    </tr>
                </table>
    

                <table class="table-box">
                    <tr>
                        <td class="table-box__item table-box__item_w50">Время убытия</td>
                        <td class="table-box__item"></td>
                    </tr>
                    <tr>
                        <td class="table-box__item table-box__item_w50">Ф.И.О. сотрудника<br/>ООО "КЛААС"</td>
                        <td class="table-box__item">Петров</td>
                    </tr>
                    <tr>
                        <td class="table-box__item table-box__item_w50">Подпись</td>
                        <td class="table-box__item"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

	<div class="page">
		<div class="center">
			<img class="location-map" src=" location_map " />
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
