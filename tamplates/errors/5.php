<h1>Ошибка</h1>
<h2>У вас нет прав администратора</h2>
<?php if (!empty($error)): ?>
    <div style="color: red;">Текст ошибки:<?= $error ?></div>
<?php endif; ?>
<br>
<br>
<div style=""><a href="/"> Перейти на главную</a>
</div>
