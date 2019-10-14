<nav class='navbar'>
    <ul class='nav <?= $class ?>'>
        <li class="nav-item active"><a class="nav-link" href='#'><?= $menu->title ?></a></li>
    <?php
        foreach ($menu->options as $option)
            echo "<li class='nav-item'><a class='nav-link' href='".$option['link']."'>".$option['show']."</a></li>";
    ?>
    </ul>
</nav>