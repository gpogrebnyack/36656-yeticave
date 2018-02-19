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

  <form class="form form--add-lot container <?=isset($errors) ? "form--invalid" : "";?>" action="add.php" method="post" enctype="multipart/form-data"> 
    <h2>Добавление лота</h2>
    <div class="form__container-two">
      
      <div class="form__item <?=isset($errors['name']) ? "form__item--invalid" : "";?>"> 
        <label for="lot-name">Наименование</label>
        <input id="lot-name" type="text" name="name" placeholder="Введите наименование лота" value="<?=isset($lot['name']) ? $lot['name'] : "";?>">
        <?php if (isset($errors['name'])): ?>
            <span class="form__error">Введите наименование лота</span>
        <?php endif; ?>
      </div>

      <div class="form__item <?=isset($errors['category']) ? "form__item--invalid" : "";?>">
        <label for="category">Категория</label>
        <select id="category" name="category">
            <option selected value="">Выберите категорию</option>
            <?php foreach ($cat as $category): ?>
            <option <?= (isset($lot['category']) && $category == $lot['category']) ? 'selected' : '';?> value="<?=$category;?>"><?=$category;?></option>
            <?php endforeach; ?>  
        </select>
        <?php if (isset($errors['category'])): ?>
            <span class="form__error">Выберите категорию</span>
        <?php endif; ?>
      </div>
    </div>
   
    <div class="form__item form__item--wide <?=isset($errors['message']) ? "form__item--invalid" : "";?>">
        <label for="message">Описание</label>
        <textarea id="message" name="message" placeholder="Напишите описание лота"><?=isset($lot['message']) ? $lot['message'] : "";?></textarea>
        <?php if (isset($errors['message'])): ?>
            <span class="form__error">Напишите описание лота</span>
        <?php endif; ?>
    </div>
    
    <div class="form__item form__item--file"> 
      <label>Изображение</label>
      <?php if (isset($lot['img']) and !isset($errors['img'])): ?>
      <div class="preview" style="display: block; position: relative;">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="<?="img/" . $lot['img'];?>" width="113" height="113" alt="Изображение лота">
        </div>
        <input class="visually-hidden" type="file" id="photo2" name="img">
      </div>
      <?php endif; ?>
      <?php if (isset($errors['img']) or empty($_FILES)): ?>
      <div class="form__input-file">
        <input class="visually-hidden" type="file" id="photo2" name="img">
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
      </div>
      <?php endif; ?>
      <?php if (isset($errors['img'])): ?>
          <span class="form__error" style="display: block;">Вы не загрузили файл</span>
       <?php endif; ?>
    </div>

    <div class="form__container-three">
      <div class="form__item form__item--small <?=isset($errors['price']) ? "form__item--invalid" : "";?>">
        <label for="price">Начальная цена</label>
        <input id="price" type="number" name="price" placeholder="0" value="<?=isset($lot['price']) ? $lot['price'] : "";?>">
        <?php if (isset($errors['price'])): ?>
            <span class="form__error">Введите начальную цену</span>
        <?php endif; ?>
      </div>

      <div class="form__item form__item--small <?=isset($errors['lot-step']) ? "form__item--invalid" : "";?>">
        <label for="lot-step">Шаг ставки</label>
        <input id="lot-step" type="number" name="lot-step" placeholder="0" value="<?=isset($lot['lot-step']) ? $lot['lot-step'] : "";?>">
        <?php if (isset($errors['lot-step'])): ?>
            <span class="form__error">Введите шаг ставки</span>
        <?php endif; ?>
      </div>

      <div class="form__item <?=isset($errors['lot-date']) ? "form__item--invalid" : "";?>">
        <label for="lot-date">Дата окончания торгов</label>
        <input class="form__input-date" id="lot-date" type="date" name="lot-date" value="<?=isset($lot['lot-date']) ? $lot['lot-date'] : "";?>">
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