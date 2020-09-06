<ul class="list-group list-group-flush">
    <?php
    foreach($securityGuys as $arr) {
        echo '<li class="list-group-item">' . $arr['name'] . '</li>';
    }
    ?>
</ul>