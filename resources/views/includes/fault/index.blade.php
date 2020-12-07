<table class="table table-hover">
        <thead>
            <th scope="col">Система</th>
            <th scope="col">Название</th>
            <th scope="col">Место</th>
            <th scope="col">Дата</th>
            <th scope="col">Подробнее</th>        
        </thead>
        <tbody>
            <?php foreach($faults as $arr) { ?>
                    <tr>
                        <td><?= $arr->system ?></td>
                        <td><?= $arr->name ?></td>
                        <td><?= $arr->place ?></td>
                        <td><?= $arr->currentdate->currentdate ?></td>
                        <td><a href="/fault/edit/{{ $arr['id'] }}">Подробнее</a></td>             
                    </tr>
                <?php } ?>
        </tbody>
</table>