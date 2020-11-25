<div class="form-group row">
    <label class="col-form-label col-4" for="visitor_category">Категория</label>
    <div class="col-6">
        <select id="visitor_category" class="custom-select" name="visitor_category">
            @foreach ($category as $row)

                <option value="{{ $row->name }}"
                    @if ($loop->first)
                        selected
                    @endif
                >{{ $row->description }}</option>
            @endforeach
        </select>
    </div>
</div>