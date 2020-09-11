<table class="table table-hover">
        <thead>
            <th scope="col">Фамилия/Имя</th>
            <th scope="col">Номер пропуска</th>
            <th scope="col">Время входа</th>
            <th scope="col">
                <div class="row justify-content-between">
                    <span>Время выхода</span>
                    <span>Отправить</span>
                </div>
            </th>
            
        </thead>
        <tbody>
            <?php foreach($showCardArr as $arr) { ?>
            <tr>
                <td><?= $arr['employee'] ?></td>
                <td><?= $arr['card_number'] ?></td>
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