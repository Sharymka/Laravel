
<h1>Новости </h1>
<?php foreach ( $news as $n): ?>
            <h2>
                <div><?=$n["name"]?></div>
            </h2>
            <div><?=$n["description"]?></div>
            <div><?=$n["author"]?></div>
            <div><?=$n["created_at"]?></div>
            <a href = <?= route('showOne', [$n['id']])?>>Далее</a>
            <hr>
<?php endforeach; ?>

