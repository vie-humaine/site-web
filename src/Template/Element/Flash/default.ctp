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
<div data-alert class="alert-box <?= h($class) ?>">
  <?= h($message) ?>
  <a href="#" class="close">&times;</a>
</div>
