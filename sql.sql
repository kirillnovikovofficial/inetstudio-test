/*В базе данных имеется таблица с товарами goods (id INTEGER, name TEXT), таблица с тегами tags (id INTEGER, name TEXT) и таблица связи товаров и тегов goods_tags (tag_id INTEGER, goods_id INTEGER, UNIQUE(tag_id, goods_id)).
Выведите id и названия всех товаров, которые имеют все возможные теги в этой базе. */
SELECT goods.name, goods_tags.goods_id FROM goods_tags LEFT JOIN goods ON goods.id = goods_tags.goods_id where goods_tags.tag_id IN (SELECT id FROM tags);

-- Выбрать без join-ов и подзапросов все департаменты, в которых есть мужчины, и все они (каждый) поставили высокую оценку (строго выше 5).
SELECT DISTINCT department_id FROM evaluations WHERE gender = true AND value > 5;