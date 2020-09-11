<form action="{{ route('incident-add-form')}}" method="post">
    @csrf
    <div class="form-group row">
        <label class="col-form-label col-4" for="descriptpon">Описание</label>
        <div class="col-6">
            <textarea id="descriptpon" class="form-control" name="descriptpon" placeholder="Описание"></textarea>
        </div>
    </div>

    <div class="form-group row">        
        <label class="col-form-label col-4" for="measure">Принятые меры</label>
        <div class="col-6">
            <textarea id="measure" class="form-control" name="measure" placeholder="Принятые меры"></textarea>
        </div>
    </div>

    <button type="submit" class="btn btn-info">Отправить</button>
</form>