<form action="{{ route('card-store-employee')}}" method="post">
    @csrf

    <div class="form-group row">
        <label class="col-form-label col-4" for="employee_surname">Сотрудник "КЛААС"</label>
        <div class="col-2">
            <input id="employee_surname" class="form-control capitalize" type="text" name="employee_surname" placeholder="Фамилия" autocomplete="off" value="{{ old('employee_surname') }}">
        </div>
        <div class="col-2">
            <input id="employee_name" class="form-control capitalize" type="text" name="employee_name" placeholder="Имя" value="{{ old('employee_name') }}">
        </div>
        <div class="col-2">
            <input id="employee_patronymic" class="form-control capitalize" type="text" name="employee_patronymic" placeholder="Отчество" value="{{ old('employee_patronymic') }}">
        </div>
    </div>

    <div class="form-group row">        
        <label class="col-form-label col-4" for="employee_position">Должность сотрудника</label>
        <div class="col-6">
            <input id="employee_position"  class="form-control" type="text" name="employee_position" placeholder="Должность сотрудника">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="employee_boss_surname">Руководитель сотрудника11</label>
        <div class="col-2">
            <input id="employee_boss_surname" class="form-control capitalize" type="text" name="employee_boss_surname" placeholder="Фамилия" autocomplete="off" value="{{ old('employee_boss_surname') }}">
        </div>
        <div class="col-2">
            <input id="employee_boss_name" class="form-control capitalize" type="text" name="employee_boss_name" placeholder="Имя" value="{{ old('employee_boss_name') }}">
        </div>
        <div class="col-2">
            <input id="employee_boss_patronymic" class="form-control capitalize" type="text" name="employee_boss_patronymic" placeholder="Отчество" value="{{ old('employee_boss_patronymic') }}">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="employee_boss_position">Должность руководителя</label>
        <div class="col-6">
            <input id="employee_boss_position" class="form-control" type="tel" name="employee_boss_position" placeholder="Должность руководителя">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="card_number">Выдан пропуск №</label>
        <div class="col-6">
            <select id="card_number" class="custom-select" name="card_number" value="{{ old('card_number') }}">
                @foreach ($cards as $row)
                    <option value="{{ $row->id }}"
                        @if ($loop->first)
                            selected
                        @endif
                    >{{ $row->number }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <button type="submit" class="btn btn-info">Отправить</button>
</form>