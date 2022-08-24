<?php

$array = [
	['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
	['id' => 2, 'date' => "02.05.2020", 'name' => "test2"],
	['id' => 4, 'date' => "08.03.2020", 'name' => "test4"],
	['id' => 1, 'date' => "22.01.2020", 'name' => "test1"],
	['id' => 2, 'date' => "11.11.2020", 'name' => "test4"],
	['id' => 3, 'date' => "06.06.2020", 'name' => "test3"],
];

// выделить уникальные записи (убрать дубли) в отдельный массив. в конечном массиве не должно быть элементов с одинаковым id.
$uniqueKeys = array_column($array, 'id', 'id');
$resultUnique = array_filter($array, function ($value) use (&$uniqueKeys) {
	$index = array_search($value['id'], $uniqueKeys, true);
	if ($index !== false) {
		unset($uniqueKeys[$index]);
		return true;
	}
	return false;
});
var_dump($resultUnique);

// отсортировать многомерный массив по ключу (любому)
$key = 'id';
$resultSort = $array;

usort($array, function($a,$b) use ($key){
	return $a[$key] > $b[$key] ? 1 : -1;
});
var_dump($resultSort);

// вернуть из массива только элементы, удовлетворяющие внешним условиям (например элементы с определенным id)
$id = 1;
$resultFilter = array_filter($array, function ($value) use ($id) {
	return isset($value['id']) && $value['id'] === $id;
});
var_dump($resultFilter);

// изменить в массиве значения и ключи (использовать name => id в качестве пары ключ => значение)
$resultFlip = [];
array_map(function (array $value) use (&$resultFlip) {
	$resultFlip[$value['name']] = $value['id'];
	return null;
}, $array);
var_dump($resultFlip);