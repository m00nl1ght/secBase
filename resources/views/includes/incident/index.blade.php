<table class="table table-hover">
        <thead>
            <th scope="col">Описание</th>
            <th scope="col">Принятые меры</th>
            <th scope="col">Время</th>
            <th scope="col">Подробнее</th>
            
        </thead>
        <tbody>
            <?php foreach($showIncidentArr as $arr) { ?>
            <tr>
                <td><?= $arr['description'] ?></td>
                <td><?= $arr['action'] ?></td>
                <td><?= $arr['time'] ?></td>             
                <td><a href="/incident/show/<?= $arr['id'] ?>">Подробнее</a></td>
            </tr>
            <?php } ?>
        </tbody>
</table>