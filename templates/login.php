<nav class="nav">
<ul class="nav__list container">
    <li class="nav__item">
    <a href="all-lots.html">Доски и лыжи</a>
    </li>
    <li class="nav__item">
    <a href="all-lots.html">Крепления</a>
    </li>
    <li class="nav__item">
    <a href="all-lots.html">Ботинки</a>
    </li>
    <li class="nav__item">
    <a href="all-lots.html">Одежда</a>
    </li>
    <li class="nav__item">
    <a href="all-lots.html">Инструменты</a>
    </li>
    <li class="nav__item">
    <a href="all-lots.html">Разное</a>
    </li>
</ul>
</nav>
<form class="form container <?=isset($errors) ? "form--invalid" : "";?>" action="login.php" method="post"> <!-- form--invalid -->
<h2>Вход</h2>
<div class="form__item <?=isset($errors['email']) ? "form__item--invalid" : "";?>"> <!-- form__item--invalid -->
    <label for="email">E-mail*</label>
    <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?=isset($form['email']) ? $form['email'] : "";?>">
    <?php if (isset($errors['email'])): ?>
        <span class="form__error"><?=$errors['email']?></span>
    <?php endif; ?>
</div>

<div class="form__item form__item--last <?=isset($errors['password']) ? "form__item--invalid" : "";?>">
    <label for="password">Пароль*</label>
    <input id="password" type="password" name="password" placeholder="Введите пароль">
    <?php if (isset($errors['password'])): ?>
        <span class="form__error"><?=$errors['password']?></span>
    <?php endif; ?>
</div>

<button type="submit" class="button">Войти</button>
</form>
