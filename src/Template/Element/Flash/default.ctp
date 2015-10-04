<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}

if ($params['class'] == "error")
{
    $class = ' alert';
}

?>
<div class="flash <?= h($class) ?>">
    <div class="left">
          <?= h($message) ?>
    </div>
    <div class="right">
          <a href="#">&times;</a>
    </div>
</div>
