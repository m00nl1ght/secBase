<form action="{{ route('visitor-add-form')}}" method="post">
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
        <label class="col-form-label col-4" for="visitor_firm">Организация</label>
        <div class="col-6">
            <input id="visitor_firm" type="text" name="visitor_firm" placeholder="Организация" class="form-control capitalize">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="visitor_category">Категория</label>
        <div class="col-6">
            <!-- <input type="text" name="visitor_category" placeholder="Категория" class="form-control"> -->
            <select class="custom-select" name="visitor_category">
                <option value="visitor" selected>Посетитель</option>
                <option value="contractor">Подрядчик</option>
                <option value="businesstrip">Коммандированный</option>
                <option value="businesstrip">Курьер\Доставка</option>
                <option value="businesstrip">Собеседование</option>
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