<table class="table table-hover">
        <thead>
            <th scope="col">Фамилия</th>
            <th scope="col">Имя</th>
            <th scope="col">Номер авто</th>
            <th scope="col">Телефон</th>
            <th scope="col">Время входа</th>
            <th scope="col">
                <div class="row justify-content-between">
                    <span>Время выхода</span>
                    <span>Отправить</span>
                </div>
            </th>
            
        </thead>
        <tbody>
            <?php foreach($showCarArr as $arr) { ?>
            <tr>
                <td><?= $arr['surname'] ?></td>
                <td><?= $arr['name'] ?></td>
                <td><?= $arr['car_number'] ?></td>
                <td><?= $arr['phone'] ?></td>
                <td><?= $arr['time'] ?></td>             
                <td>
                    <form action="#" name="out_car_form">
                        <div class="row justify-content-between">
                            <input class="d-none" type="text" name="id" value="<?= $arr['id'] ?>">
                            <input type="time" name="out_time" placeholder="время выхода">
                            <button  class="btn btn-info col-4" type="submit">Вышел</button>
                        </div>  
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
</table>