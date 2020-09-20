<table class="table table-hover">
        <thead>
            <th scope="col">Система</th>
            <th scope="col">Название</th>
            <th scope="col">Место</th>
            <th scope="col">Дата</th>
            <th scope="col">
                <div class="row justify-content-between">
                    <span>Дата решения</span>
                    <span>Отправить</span>
                </div>
            </th>        
        </thead>
        <tbody>
            <?php foreach($faults as $arr) { ?>
                    <tr>
                        <td><?= $arr->system ?></td>
                        <td><?= $arr->name ?></td>
                        <td><?= $arr->place ?></td>
                        <td><?= $arr->currentdate->currentdate ?></td>             
                        <td>
                            <form action="/fault/update/<?= $arr->id ?>" name="out_car_form" method="POST">
                                @csrf
                                <div class="row justify-content-between">
                                    <input type="date" name="out_date" placeholder="время выхода">
                                    <button  class="btn btn-info col-4" type="submit">Решено</button>
                                </div>  
                            </form>
                        </td>
                    </tr>
                <?php } ?>
        </tbody>
</table>