<?php

use meryemertrk\todo\bundles\TaskAsset;

TaskAsset::register($this);

?>

<div class="dropdown">
<!DOCTYPE html>
<html>
<head>
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<a id="dLabel" role="button" data-bs-toggle="dropdown" data-bs-target="#" href="#">
    <i class="bi-bell"></i>
</a>

</body>
</html>



<ul class="dropdown-menu task" aria-labelledby="dLabel">
    <li><a class="dropdown-item task-heading" href="#">Task<span class="float-end">View all<i class="bi bi-arrow-right"></i></span></a></li>
    <li><hr class="dropdown-divider"></li>


    <?php if (!empty($tasks)): ?>
        <?php foreach ($tasks as $task): ?>
            <li>
                <a class="dropdown-item content" href="#">
                    <div class="task-item">
                        <h4 class="item-title"><?= $task->title ?></h4>
                        <p class="item-info"><?= $task->description ?></p>
                    </div>
                </a>
            </li>
            <li><hr class="dropdown-divider"></li>
        <?php endforeach; ?>
    <?php else: ?>

    <?php endif; ?>


    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item task-footer" href="#">View all<span class="float-end"><i class="bi bi-arrow-right"></i></span></a></li>
</ul>
</div>

