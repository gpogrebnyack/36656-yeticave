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

  <form class="form form--add-lot container form--invalid" action="add.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
      <?php $classname = isset($errors['lot-name']) ? "form__item--invalid" : "";
      $value = isset($lot['lot-name']) ? $lot['lot-name'] : "";?>
      <div class="form__item <?=$classname;?>"> <!-- form__item--invalid -->
        <label for="lot-name">Наименование</label>
        <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<?=$value;?>">
        <?php if (isset($errors['lot-name'])): ?>
            <span class="form__error">Введите наименование лота</span>
        <?php endif; ?>
      </div>
      <?php $classname = isset($errors['category']) ? "form__item--invalid" : "";
      $value = isset($lot['category']) ? $lot['category'] : "";?>
      <div class="form__item <?=$classname;?>">
        <label for="category">Категория</label>
        <select id="category" name="category">
            <option selected>Выберите категорию</option>
            <?php foreach ($cat as $category): ?>
            <?php $selected = ($lot['category']) ? 'category' : "";?>
                <?php $selected = ($category == $value) ? "selected" : ""?>
                <option <?=$selected;?> value="<?=$category;?>"><?=$category;?></option>
            <?php endforeach; ?>  
        </select>
        <?php if (isset($errors['category'])): ?>
            <span class="form__error">Выберите категорию</span>
        <?php endif; ?>
      </div>
    </div>
    <?php $classname = isset($errors['message']) ? "form__item--invalid" : "";
    $value = isset($lot['message']) ? $lot['message'] : "";?>
    <div class="form__item form__item--wide <?=$classname;?>">
        <label for="message">Описание</label>
        <textarea id="message" name="message" placeholder="Напишите описание лота" ><?=$value;?></textarea>
        <?php if (isset($errors['message'])): ?>
            <span class="form__error">Напишите описание лота</span>
        <?php endif; ?>
    </div>
    
    <div class="form__item form__item--file"> <!-- form__item--uploaded -->
      <label>Изображение</label>
      <?php if (isset($lot['path'])): ?>
      <div class="preview" style="display: block;">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="<?=$lot['path'];?>" width="113" height="113" alt="Изображение лота">
        </div>
      </div>
      <?php endif; ?>
      <div class="form__input-file">
        <input class="visually-hidden" type="file" id="photo2" name="lot-img" value="">
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
      </div>
      <?php if (isset($errors['lot-img'])): ?>
          <span class="form__error">Вы не загрузили файл</span>
       <?php endif; ?>
    </div>

    <div class="form__container-three">
    <?php $classname = isset($errors['lot-rate']) ? "form__item--invalid" : "";
    $value = isset($lot['lot-rate']) ? $lot['lot-rate'] : "";?>
      <div class="form__item form__item--small <?=$classname;?>">
        <label for="lot-rate">Начальная цена</label>
        <input id="lot-rate" type="number" name="lot-rate" placeholder="0" value="<?=$value;?>">
        <?php if (isset($errors['lot-rate'])): ?>
            <span class="form__error">Введите начальную цену</span>
        <?php endif; ?>
      </div>
      <?php $classname = isset($errors['lot-step']) ? "form__item--invalid" : "";
      $value = isset($lot['lot-step']) ? $lot['lot-step'] : "";?>
      <div class="form__item form__item--small <?=$classname;?>">
        <label for="lot-step">Шаг ставки</label>
        <input id="lot-step" type="number" name="lot-step" placeholder="0" value="<?=$value;?>">
        <?php if (isset($errors['lot-step'])): ?>
            <span class="form__error">Введите шаг ставки</span>
        <?php endif; ?>
      </div>
      <?php $classname = isset($errors['lot-date']) ? "form__item--invalid" : "";
      $value = isset($lot['lot-date']) ? $lot['lot-date'] : "";?>
      <div class="form__item <?=$classname;?>">
        <label for="lot-date">Дата окончания торгов</label>
        <input class="form__input-date" id="lot-date" type="date" name="lot-date" value="<?=$value;?>">
        <?php if (isset($errors['lot-date'])): ?>
            <span class="form__error">Введите дату завершения торгов</span>
        <?php endif; ?>
      </div>
    </div>
    <?php if (isset($errors)): ?>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <?php endif; ?>
    <button type="submit" class="button">Добавить лот</button>
  </form>