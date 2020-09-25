<form action="{{ route('car-add-form')}}" method="post">
    @csrf
    <div class="form-group row">
        <label class="col-form-label col-4" for="visitor_surname">Фамилия</label>
        <div class="col-6">
            <input id="visitor_surname" type="text" name="visitor_surname" placeholder="Фамилия" class="form-control capitalize" autocomplete="off">
        </div>
    </div>

    <div class="form-group row">        
        <label class="col-form-label col-4" for="visitor_name">Имя</label>
        <div class="col-6">
            <input id="visitor_name" type="text" name="visitor_name" placeholder="Имя" class="form-control capitalize">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="visitor_patronymic">Отчество</label>
        <div class="col-6">
            <input id="visitor_patronymic" type="text" name="visitor_patronymic" placeholder="Отчество" class="form-control capitalize">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="visitor_phone">Номер телефона</label>
        <div class="col-6">
            <input id="visitor_phone" type="tel" name="visitor_phone" placeholder="Номер телефона" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="visitor_carNumber">Номер авто</label>
        <div class="col-6">
            <input id="visitor_carNumber" type="text" name="visitor_carNumber" placeholder="Номер авто" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="visitor_carModel">Модель авто</label>
        <div class="col-6">
            <input id="visitor_carModel" type="text" name="visitor_carModel" placeholder="Модель авто" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="visitor_firm">Организация</label>
        <div class="col-6">
            <input id="visitor_firm" type="text" name="visitor_firm" placeholder="Организация" class="form-control capitalize">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="visitor_category">Категория</label>
        <div class="col-6">
            <select class="custom-select" name="visitor_category">
                <option value="visitor" selected>Подрядчик</option>
                <option value="contractor">Отгружающий на склад</option>
                <option value="businesstrip">Сервис</option>
                <option value="businesstrip">Курьер\Доставка</option>
                <option value="businesstrip">Посетитель</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="visitor_security">Сотрудник охраны</label>
        <div class="col-6">
            <input type="text" name="visitor_security" placeholder="Сотрудник охраны" class="form-control capitalize">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="visitor_employee">Сотрудник Клаас</label>
        <div class="col-6">
            <input type="text" name="visitor_employee" placeholder="Сотрудник Клаас" class="form-control capitalize">
        </div>
    </div>

    <button type="submit" class="btn btn-info">Отправить</button>
</form>