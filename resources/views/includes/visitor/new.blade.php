<form action="{{ route('visitor-add-form')}}" method="post">
    @csrf
    <div class="form-group row">
        <label class="col-form-label col-4" for="visitor_surname">Фамилия</label>
        <div class="col-6">
            <input type="text" name="visitor_surname" placeholder="Фамилия" class="form-control">
        </div>
    </div>

    <div class="form-group row">        
        <label class="col-form-label col-4" for="visitor_name">Имя</label>
        <div class="col-6">
            <input type="text" name="visitor_name" placeholder="Имя" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="visitor_patronymic">Отчество</label>
        <div class="col-6">
            <input type="text" name="visitor_patronymic" placeholder="Отчество" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="visitor_phone">Номер телефона</label>
        <div class="col-6">
            <input type="tel" name="visitor_phone" placeholder="Номер телефона" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="visitor_firm">Организация</label>
        <div class="col-6">
            <input type="text" name="visitor_firm" placeholder="Организация" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="visitor_category">Категория</label>
        <div class="col-6">
            <input type="text" name="visitor_category" placeholder="Категория" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="visitor_security">Сотрудник охраны</label>
        <div class="col-6">
            <input type="text" name="visitor_security" placeholder="Сотрудник охраны" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="visitor_employee">Сотрудник Клаас</label>
        <div class="col-6">
            <input type="text" name="visitor_employee" placeholder="Сотрудник Клаас" class="form-control">
        </div>
    </div>

    <button type="submit" class="btn btn-info">Отправить</button>
</form>