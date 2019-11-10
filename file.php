<?
//задаём и получаем необходимые переменные
$key = "ключ";
$value = "значение";
$title = htmlspecialchars($_POST['title']) . '.txt';
$max_number = htmlspecialchars($_POST['max_number']);
$key_value  = $key . htmlspecialchars($_POST['key_value']);
$exp_line = '\x0A';
$exp_value = '\t';
//создание файла
if (!is_file($title)) {
    createFile($title, $max_number, $key, $value, $exp_line, $exp_value);
} else {
    echo "Этот файл уже существует<br>";
}
//вызов функции поиска
echo binarySearch($title, $key_value, $exp_line, $exp_value);
//функция создания файла
function createFile($title, $max_number, $key, $value, $exp_line, $exp_value) {
    $file = fopen($title, w);
    for ($i = 1; $i<$max_number+1; $i++) {
        $text = $key . $i . $exp_value . $value . $i . $exp_line;
        $write = fwrite($file, $text);
    }
    if ($write)
        echo 'Файл создан.<br>';
    else
        echo 'Ошибка при записи в файл.<br>';
    fclose($file);
}
//функция поиска
function binarySearch($title, $key_value, $exp_line, $exp_value) {
    $key_value = preg_replace('/[^0-9]/', '', $key_value);
    $file = fopen($title, r);
    while (!feof($file)) {
        $line = fgets($file);
        $arr = array_filter(explode($exp_line, $line));
        foreach ($arr as $key => $value) {
            $binary_arr[] = explode($exp_value, $value);
        }
        $start = 1;
        $end = count($binary_arr);
        while ($start <= $end) {
            $medium = floor(($start + $end) / 2);
            if ($key_value < $medium) {
                $end = $medium - 1;
            } elseif ($key_value > $medium) {
                $start = $medium + 1;
            } else {
                return 'Искомое значение: ' . $binary_arr[$medium-1][1];
            }
        }
    }
    return 'undef';
};
