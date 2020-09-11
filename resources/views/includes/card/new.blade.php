<form action="{{ route('card-add-form')}}" method="post">
    @csrf
    <div class="form-group row">
        <label class="col-form-label col-4" for="emploeyee">Сотудник</label>
        <div class="col-6">
            <input type="text" name="employee" placeholder="Сотудник" class="form-control">
        </div>
    </div>

    <div class="form-group row">        
        <label class="col-form-label col-4" for="employee_position">Должность сотрудника</label>
        <div class="col-6">
            <input type="text" name="employee_position" placeholder="Должность сотрудника" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="employee_boss">Руководитель</label>
        <div class="col-6">
            <input type="text" name="employee_boss" placeholder="Руководитель" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="employee_boss_position">Должность руководителя</label>
        <div class="col-6">
            <input type="tel" name="employee_boss_position" placeholder="Должность руководителя" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="card_number">Выдан пропуск №</label>
        <div class="col-6">
            <input type="text" name="card_number" placeholder="Выдан пропуск №" class="form-control">
        </div>
    </div>

    <button type="submit" class="btn btn-info">Отправить</button>
</form>