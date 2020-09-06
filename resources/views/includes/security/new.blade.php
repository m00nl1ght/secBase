<form action="{{ route('security-add-form')}}" method="post">
    @csrf
    <div class="form-group row">
        <label class="col-form-label col-4" for="sec_main">Начальник смены</label>
        <div class="col-6">
            <input type="text" name="sec_main" placeholder="Начальник смены" class="form-control">
        </div>
    </div>

    <div class="form-group row">        
        <label class="col-form-label col-4" for="sec_writer">На пропусках</label>
        <div class="col-6">
            <input type="text" name="sec_writer" placeholder="На пропусках" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="sec_1">Сотрудник охраны 1</label>
        <div class="col-6">
            <input type="text" name="sec_1" placeholder="Сотрудник охраны 1" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="sec_2">Сотрудник охраны 2</label>
        <div class="col-6">
            <input type="text" name="sec_2" placeholder="Сотрудник охраны 2" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="sec_3">Сотрудник охраны 3</label>
        <div class="col-6">
            <input type="text" name="sec_3" placeholder="Сотрудник охраны 3" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-4" for="sec_4">Сотрудник охраны 4</label>
        <div class="col-6">
            <input type="text" name="sec_4" placeholder="Сотрудник охраны 4" class="form-control">
        </div>
    </div>

    <button type="submit" class="btn btn-info">Отправить</button>
</form>