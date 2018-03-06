INSERT INTO categories(name) VALUES ('Доски и лыжи'), ('Крепления'), ('Ботинки'), ('Одежда'), ('Инструменты'), ('Разное');

INSERT INTO users SET email = 'ignat.v@gmail.com', name = 'Игнат', password = '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka';
INSERT INTO users SET email = 'kitty_93@li.ru', name = 'Леночка', password = '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa';
INSERT INTO users SET email = 'warrior07@mail.ru', name = 'Руслан', password = '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW';

INSERT INTO lots SET date_create = '2018-03-03 19:00:00', name = '2014 Rossignol District Snowboard', img = 'lot-1.jpg', price_start = '10999', author_id = 1, category_id = 1;
INSERT INTO lots SET date_create = '2018-03-02 19:00:00', name = 'DC Ply Mens 2016/2017 Snowboard', img = 'lot-2.jpg', price_start = '159999', author_id = 2, category_id = 1;
INSERT INTO lots SET date_create = '2018-03-03 15:00:00', name = 'Крепления Union Contact Pro 2015 года размер L/XL', img = 'lot-3.jpg', price_start = '8000', author_id = 3, category_id = 2;
INSERT INTO lots SET date_create = '2018-03-02 19:30:00', name = 'Ботинки для сноуборда DC Mutiny Charocal', img = 'lot-4.jpg', price_start = '10999', author_id = 1, category_id = 3;
INSERT INTO lots SET date_create = '2018-02-02 19:30:00', name = 'Куртка для сноуборда DC Mutiny Charocal', img = 'lot-5.jpg', price_start = '7500', author_id = 2, category_id = 4;
INSERT INTO lots SET date_create = '2018-03-04 21:33:00', name = 'Маска Oakley Canopy', img = 'lot-6.jpg', price_start = '5400', author_id = 3, category_id = 6;

INSERT INTO rates SET rate_date = '2018-03-03 19:30:00', rate_price = '12000', lot_id = 3, user_id = 1;
INSERT INTO rates SET rate_date = '2018-03-03 19:30:00', rate_price = '13000', lot_id = 3, user_id = 2;
INSERT INTO rates SET rate_date = '2018-03-03 19:20:00', rate_price = '160000', lot_id = 2, user_id = 3;

-- получить все категории
SELECT name FROM categories;

-- получить самые новые, открытые лоты. Каждый лот должен включать название, стартовую цену, ссылку на изображение, цену, количество ставок, название категории
SELECT l.id, c.name, l.name, l.img, l.price_start, r.rate_price, COUNT(r.lot_id) 
FROM lots l 
JOIN rates r ON l.id = r.user_id 
JOIN categories c ON l.category_id = c.id
WHERE l.date_finish >= NOW()
GROUP BY r.lot_id, l.id 
ORDER BY l.date_create DESC;

-- показать лот по его id. Получите также название категории, к которой принадлежит лот
SELECT l.id, l.name, l.img, l.price_start FROM lots l JOIN categories c ON l.category_id = c.id WHERE l.id = 1;
-- обновить название лота по его идентификатору
UPDATE lots SET name = '2015 Rossignol District Snowboard' WHERE id = 1;
-- получить список самых свежих ставок для лота по его идентификатору
SELECT * FROM rates WHERE lot_id = 3 ORDER BY rate_date DESC;