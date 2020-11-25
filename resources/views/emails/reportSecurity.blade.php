  <a href="{{ route('security-report-post') }}">Ссылка на отчет</a>

    <h3 class="py-4">Дежурная сводка охраны за {{ $feedback['reportDay'] }} - {{ $feedback['reportDayTomorrow'] }} число</h3>

    <div class="row d-flex justify-content-end">
        <div class="col-3">
            <h5>Состав Смены</h5>

            <ul class="list-group list-group-flush">
                @foreach ($feedback['securityGuys'] as $arr)
                    <li class="list-group-item py-2">{{ $arr->name }}</li>
                @endforeach
            </ul>
        </div>
        
    </div>

    <div class="row mt-4">
        <h4>Нерешенные неисправности</h4>

        <table class="table table-hover">
            <thead class="table-info">
                <th scope="col">Система</th>
                <th scope="col">Название</th>
                <th scope="col">Место</th>
                <th scope="col">Дата возникновения</th>       
            </thead>
            <tbody>
                @foreach ($feedback['faults'] as $arr)
                    <tr>
                        <td>{{ $arr->system }}</td>
                        <td>{{ $arr->name }}</td>
                        <td>{{ $arr->place }}</td>
                        <td>{{ $arr->currentdate->currentdate }}</td>             
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="row mt-4">
        <h4>Проишествия</h4>

        <table class="table table-hover">
            <thead class="table-info">
                <th scope="col">Описание</th>
                <th scope="col">Принятые меры</th>
                <th scope="col">Время</th>  
            </thead>
            <tbody>
                @foreach ($feedback['incidents'] as $arr)
                    <tr>
                        <td>{{ $arr->description }}</td>
                        <td>{{ $arr->action }}</td>
                        <td>{{ $arr->in_time }}</td>          
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col">
            <h5>Автотранспорт</h5>
            <ul class="list-group">
            @foreach ($feedback['countCarArr'] as $array=>$key)            
                <li class="list-group-item">
                    <span>{{ $array }}</span>
                    <span>{{ $key }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col">
            <h5>Посетители</h5>
            <ul class="list-group">     
                @foreach ($feedback['countPeopleArr'] as $array=>$key)            
                <li class="list-group-item">
                    <span>{{ $array }}</span>
                    <span>{{ $key }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

