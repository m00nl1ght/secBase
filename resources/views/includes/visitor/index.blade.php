<table class="table table-hover">
        <thead>
            <th scope="col">Фамилия</th>
            <th scope="col">Имя</th>
            <th scope="col">Время входа</th>
            <th scope="col">Телефон</th>
            <th scope="col">
                <div class="row justify-content-between">
                    <span>Время выхода</span>
                    <span>Отправить</span>
                </div>
            </th>
            
        </thead>
        <tbody>
            <?php foreach($visitorArr as $arr) { ?>
            <tr>
                <td><?= $arr->visitor['surname'] ?></td>
                <td><?= $arr->visitor['name'] ?></td>
                <td><?= $arr->in_time ?></td>
                <td><?= $arr->visitor['phone'] ?></td>
                <td>
                    <form action="#" name="out_visitor_form">
                        <div class="row justify-content-between">
                            <input class="d-none" type="text" name="id" value="<?= $arr->id ?>">
                            <input type="time" name="out_time" placeholder="время выхода">
                            <button  class="btn btn-info col-4" type="submit">Вышел</button>
                        </div>  
                    </form>
                </td>
               
            </tr>
            <?php } ?>
        </tbody>
</table>