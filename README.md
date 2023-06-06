# Підключення:

`composer require i-kostiuk/rozetka-parser `

- ##### laravel:
```php
use Rozetka\Rozetka;

$parser = new Rozetka('https://rozetka.com.ua/ua/fujifilm_16650467/p218036047/');
```
- ##### php:
```php
use Rozetka\Rozetka;

require __DIR__ . "/vendor/autoload.php";

$parser = new Rozetka('https://rozetka.com.ua/ua/fujifilm_16650467/p218036047/');
```

# Використання:

При створення екземпляру класу Rozetka, в конструктор передаємо лінк на сторінку. Зараз доступний парсинг сторінок:
- Картка товару
- (Незабаром будуть інші)

```php 
$parser = new Rozetka('https://rozetka.com.ua/ua/fujifilm_16650467/p218036047/');
```

Під капотом у конструкторі робляться деякі попередні перевірки та одразу доступні наступні методи:
- getStatusCode - повертає код відповіді. Успішною вважається 200
```php
$statusCode = $parser->getStatusCode(); // ex: 200
```

- getBody - повертає тіло відповіді. Зазвичай це html, json, xml.
```php
$body = $parser->getBody(); // ex: <!DOCTYPE html><html.......html>
```

- getHeaders - повертає заголовки відповіді
```php
$headers = $parser->getHeaders();
```

- parse - парсить сторінку та повертає результат
```php
$response = $parser->parse();

// Product

/*
Array
(
    [type] => Product
    [data] => Array
        (
            [title] => Фотоапарат Fujifilm X-T4 Body Black (16650467) Офіційна гарантія!
            [price] => 73759
            [currency] => UAH
            [availability] => http://schema.org/InStock
            [brand] => Fujifilm
            [rating] => Array
                (
                    [@type] => AggregateRating
                    [ratingValue] => 5
                    [ratingCount] => 2
                    [bestRating] => 5
                    [worstRating] => 1
                )

            [description] => &#1057;&#1074;&#1110;&#1090;&#1083;&#1080;&#1085;&#1072; &#1074; &#1088;&#1091;&#1089;&#1110;&#1057;&#1090;&#1074;&#1086;&#1088;&#1080;&#1090;&#1080; &#1082;&#1072;&#1084;&#1077;&#1088;&#1091;, &#1103;&#1082;&#1072; &#1086;&#1076;&#1085;&#1072;&#1082;&#1086;&#1074;&#1086; &#1076;&#1086;&#1073;&#1088;&#1077; &#1087;&#1110;&#1076;&#1110;&#1081;&#1076;&#1077; &#1076;&#1083;&#1103; &#1079;&#1072;&#1087;&#1080;&#1089;&#1091; &#1092;&#1086;&#1090;&#1086; &#1090;&#1072; &#1074;&#1110;&#1076;&#1077;&#1086;, &#8211; &#1085;&#1077;&#1087;&#1088;&#1086;&#1089;&#1090;&#1077; &#1079;&#1072;&#1074;&#1076;&#1072;&#1085;&#1085;&#1103;. X-T4 &#8211; &#1085;&#1072;&#1096;&#1072; &#1085;&#1072;&#1081;&#1087;&#1088;&#1086;&#1076;&#1091;&#1082;&#1090;&#1080;&#1074;&#1085;&#1110;&#1096;&#1072; &#1082;&#1072;&#1084;&#1077;&#1088;&#1072; &#1089;&#1077;&#1088;&#1110;&#1111; X, &#1103;&#1082;&#1072; &#1079;&#1072;&#1073;&#1077;&#1079;&#1087;&#1077;&#1095;&#1091;&#1108; &#1085;&#1072;&#1081;&#1074;&#1080;&#1097;&#1091; &#1103;&#1082;&#1110;&#1089;&#1090;&#1100; &#1089;&#1074;&#1110;&#1090;&#1083;&#1080;&#1085; &#1110; &#1074;&#1110;&#1076;&#1077;&#1086;. &#1052;&#1072;&#1090;&#1088;&#1080;&#1094;&#1103; &#1095;&#1077;&#1090;&#1074;&#1077;&#1088;&#1090;&#1086;&#1075;&#1086; &#1087;&#1086;&#1082;&#1086;&#1083;&#1110;&#1085;&#1085;&#1103; X-Trans CMOS 4, &#1087;&#1088;&#1086;&#1094;&#1077;&#1089;&#1086;&#1088; X-Processor 4, &#1085;&#1086;&#1074;&#1072; &#1082;&#1086;&#1084;&#1087;&#1072;&#1082;&#1090;&#1085;&#1072; &#1089;&#1080;&#1089;&#1090;&#1077;&#1084;&#1072; &#1089;&#1090;&#1072;&#1073;&#1110;&#1083;&#1110;&#1079;&#1072;&#1094;&#1110;&#1111; &#1079;&#1086;&#1073;&#1088;&#1072;&#1078;&#1077;&#1085;&#1085;&#1103; (IBIS), &#1074;&#1073;&#1091;&#1076;&#1086;&#1074;&#1072;&#1085;&#1072; &#1074; &#1082;&#1086;&#1088;&#1087;&#1091;&#1089;, &#1085;&#1086;&#1074;&#1080;&#1081; &#1088;&#1077;&#1078;&#1080;&#1084; &#1084;&#1086;&#1076;&#1077;&#1083;&#1102;&#1074;&#1072;&#1085;&#1085;&#1103; &#1087;&#1083;&#1110;&#1074;&#1082;&#1080; ETERNA Bleach Bypass &#1090;&#1072; &#1110;&#1085;&#1096;&#1110; &#1092;&#1091;&#1085;&#1082;&#1094;&#1110;&#1111;, &#1088;&#1086;&#1079;&#1088;&#1086;&#1073;&#1083;&#1077;&#1085;&#1110; &#1079; &#1091;&#1088;&#1072;&#1093;&#1091;&#1074;&#1072;&#1085;&#1085;&#1103;&#1084; &#1074;&#1110;&#1076;&#1075;&#1091;&#1082;&#1110;&#1074; &#1082;&#1086;&#1088;&#1080;&#1089;&#1090;&#1091;&#1074;&#1072;&#1095;&#1110;&#1074;, &#1074;&#1110;&#1076;&#1087;&#1086;&#1074;&#1110;&#1076;&#1072;&#1102;&#1090;&#1100; &#1085;&#1072;&#1081;&#1089;&#1091;&#1074;&#1086;&#1088;&#1110;&#1096;&#1080;&#1084; &#1087;&#1088;&#1086;&#1092;&#1077;&#1089;&#1110;&#1081;&#1085;&#1080;&#1084; &#1074;&#1080;&#1084;&#1086;&#1075;&#1072;&#1084;.&#1050;&#1086;&#1083;&#1100;&#1086;&#1088;&#1086;&#1087;&#1077;&#1088;&#1077;&#1076;&#1072;&#1095;&#1072; &#1054;&#1089;&#1100; &#1091;&#1078;&#1077; &#1087;&#1086;&#1085;&#1072;&#1076; 85 &#1088;&#1086;&#1082;&#1110;&#1074; &#1082;&#1086;&#1084;&#1087;&#1072;&#1085;&#1110;&#1103; FUJIFILM &#1073;&#1077;&#1079;&#1087;&#1077;&#1088;&#1077;&#1088;&#1074;&#1085;&#1086; &#1088;&#1086;&#1079;&#1074;&#1080;&#1074;&#1072;&#1108;&#1090;&#1100;&#1089;&#1103; &#1081; &#1088;&#1091;&#1093;&#1072;&#1108;&#1090;&#1100;&#1089;&#1103; &#1088;&#1072;&#1079;&#1086;&#1084; &#1079;&#1110; &#1079;&#1084;&#1110;&#1085;&#1072;&#1084;&#1080; &#1074; &#1090;&#1077;&#1093;&#1085;&#1086;&#1083;&#1086;&#1075;&#1110;&#1103;&#1093; &#1074;&#1110;&#1076; &#1072;&#1085;&#1072;&#1083;&#1086;&#1075;&#1086;&#1074;&#1080;&#1093; &#1076;&#1086; &#1094;&#1080;&#1092;&#1088;&#1086;&#1074;&#1080;&#1093;. &#1052;&#1080; &#1087;&#1086;&#1089;&#1090;&#1110;&#1081;&#1085;&#1086; &#1074;&#1080;&#1074;&#1095;&#1072;&#1108;&#1084;&#1086; &#1084;&#1086;&#1078;&#1083;&#1080;&#1074;&#1086;&#1089;&#1090;&#1110; &#1087;&#1077;&#1088;&#1077;&#1076;&#1072;&#1085;&#1085;&#1103; &#1082;&#1086;&#1083;&#1100;&#1086;&#1088;&#1091; &#1090;&#1072; &#1074;&#1110;&#1076;&#1082;&#1088;&#1080;&#1074;&#1072;&#1108;&#1084;&#1086; &#1085;&#1086;&#1074;&#1110; &#1096;&#1083;&#1103;&#1093;&#1080; &#1076;&#1083;&#1103; &#1074;&#1072;&#1096;&#1086;&#1111; &#1090;&#1074;&#1086;&#1088;&#1095;&#1086;&#1089;&#1090;&#1110;. &#1059; &#1082;&#1072;&#1084;&#1077;&#1088;&#1110; X-T4 &#1087;&#1088;&#1077;&#1076;&#1089;&#1090;&#1072;&#1074;&#1083;&#1077;&#1085;&#1080;&#1081; &#1085;&#1086;&#1074;&#1080;&#1081; &#1088;&#1077;&#1078;&#1080;&#1084; &#1084;&#1086;&#1076;&#1077;&#1083;&#1102;&#1074;&#1072;&#1085;&#1085;&#1103; &#1087;&#1083;&#1110;&#1074;&#1082;&#1080; ETERNA Bleach Bypass, &#1103;&#1082;&#1080;&#1081; &#1076;&#1072;&#1108; &#1079;&#1084;&#1086;&#1075;&#1091; &#1084;&#1072;&#1090;&#1080; &#1076;&#1091;&#1078;&#1077; &#1074;&#1080;&#1088;&#1072;&#1079;&#1085;&#1110; &#1082;&#1072;&#1076;&#1088;&#1080; &#1079; &#1085;&#1080;&#1079;&#1100;&#1082;&#1086;&#1102; &#1085;&#1072;&#1089;&#1080;&#1095;&#1077;&#1085;&#1110;&#1089;&#1090;&#1102; &#1090;&#1072; &#1074;&#1080;&#1089;&#1086;&#1082;&#1086;&#1102; &#1082;&#1086;&#1085;&#1090;&#1088;&#1072;&#1089;&#1090;&#1085;&#1110;&#1089;&#1090;&#1102;.&#1055;&#1088;&#1086;&#1076;&#1091;&#1082;&#1090;&#1080;&#1074;&#1085;&#1110;&#1089;&#1090;&#1100;&#1055;&#1088;&#1086;&#1092;&#1077;&#1089;&#1110;&#1081;&#1085;&#1072; &#1082;&#1072;&#1084;&#1077;&#1088;&#1072; &#1084;&#1072;&#1108; &#1073;&#1091;&#1090;&#1080; &#1079;&#1076;&#1072;&#1090;&#1085;&#1072; &#1089;&#1092;&#1086;&#1090;&#1086;&#1075;&#1088;&#1072;&#1092;&#1091;&#1074;&#1072;&#1090;&#1080; &#1072;&#1073;&#1086; &#1079;&#1072;&#1087;&#1080;&#1089;&#1072;&#1090;&#1080; &#1074;&#1110;&#1076;&#1077;&#1086; &#1074; &#1073;&#1091;&#1076;&#1100;-&#1103;&#1082;&#1080;&#1081; &#1084;&#1086;&#1084;&#1077;&#1085;&#1090;. &#1040;&#1074;&#1090;&#1086;&#1092;&#1086;&#1082;&#1091;&#1089; X-T4 &#1089;&#1087;&#1088;&#1072;&#1094;&#1100;&#1086;&#1074;&#1091;&#1108; &#1074;&#1089;&#1100;&#1086;&#1075;&#1086; &#1079;&#1072; 0,02 &#1089;&#1077;&#1082;&#1091;&#1085;&#1076;&#1080;, &#1072; &#1088;&#1077;&#1078;&#1080;&#1084; &#1089;&#1077;&#1088;&#1110;&#1081;&#1085;&#1086;&#1075;&#1086; &#1079;&#1072;&#1087;&#1080;&#1089;&#1091; &#1076;&#1086; 15 &#1082;&#1072;&#1076;&#1088;&#1110;&#1074; &#1079;&#1072; &#1089;&#1077;&#1082;&#1091;&#1085;&#1076;&#1091; &#1079; &#1084;&#1077;&#1093;&#1072;&#1085;&#1110;&#1095;&#1085;&#1080;&#1084; &#1079;&#1072;&#1090;&#1074;&#1086;&#1088;&#1086;&#1084;* &#1079;&#1072;&#1073;&#1077;&#1079;&#1087;&#1077;&#1095;&#1091;&#1108; &#1088;&#1077;&#1082;&#1086;&#1088;&#1076;&#1085;&#1091; &#1096;&#1074;&#1080;&#1076;&#1082;&#1110;&#1089;&#1090;&#1100; &#1110; &#1092;&#1091;&#1085;&#1082;&#1094;&#1110;&#1086;&#1085;&#1072;&#1083;&#1100;&#1085;&#1110;&#1089;&#1090;&#1100;, &#1076;&#1072;&#1102;&#1095;&#1080; &#1085;&#1072;&#1075;&#1086;&#1076;&#1091; &#1079;&#1086;&#1073;&#1088;&#1072;&#1079;&#1080;&#1090;&#1080; &#1082;&#1086;&#1078;&#1085;&#1091; &#1084;&#1080;&#1090;&#1100; &#1091; &#1084;&#1072;&#1082;&#1089;&#1080;&#1084;&#1072;&#1083;&#1100;&#1085;&#1086; &#1084;&#1086;&#1078;&#1083;&#1080;&#1074;&#1110;&#1081; &#1103;&#1082;&#1086;&#1089;&#1090;&#1110;.* &#1053;&#1072;&#1081;&#1074;&#1080;&#1097;&#1072; &#1096;&#1074;&#1080;&#1076;&#1082;&#1110;&#1089;&#1090;&#1100; &#1089;&#1077;&#1088;&#1110;&#1081;&#1085;&#1086;&#1075;&#1086; &#1079;&#1072;&#1087;&#1080;&#1089;&#1091; &#1079; &#1084;&#1077;&#1093;&#1072;&#1085;&#1110;&#1095;&#1085;&#1080;&#1084; &#1079;&#1072;&#1090;&#1074;&#1086;&#1088;&#1086;&#1084; &#1089;&#1077;&#1088;&#1077;&#1076; &#1073;&#1077;&#1079;&#1076;&#1079;&#1077;&#1088;&#1082;&#1072;&#1083;&#1100;&#1085;&#1080;&#1093; &#1082;&#1072;&#1084;&#1077;&#1088; &#1110;&#1079; &#1084;&#1072;&#1090;&#1088;&#1080;&#1094;&#1077;&#1102; APS-C (&#1089;&#1090;&#1072;&#1085;&#1086;&#1084; &#1085;&#1072; &#1083;&#1102;&#1090;&#1080;&#1081; 2020&#160;&#1088;)&#1053;&#1072;&#1076;&#1110;&#1081;&#1085;&#1110;&#1089;&#1090;&#1100;&#1053;&#1086;&#1074;&#1072; &#1074;&#1073;&#1091;&#1076;&#1086;&#1074;&#1072;&#1085;&#1072; 6.5-&#1089;&#1090;&#1091;&#1087;&#1077;&#1085;&#1077;&#1074;&#1072;* &#1089;&#1080;&#1089;&#1090;&#1077;&#1084;&#1072; &#1089;&#1090;&#1072;&#1073;&#1110;&#1083;&#1110;&#1079;&#1072;&#1094;&#1110;&#1111; &#1079;&#1086;&#1073;&#1088;&#1072;&#1078;&#1077;&#1085;&#1085;&#1103; &#1079;&#1072; &#1079;&#1072;&#1076;&#1072;&#1085;&#1080;&#1084; &#1086;&#1089;&#1103;&#1084; (IBIS) &#1110; &#1085;&#1086;&#1074;&#1080;&#1081; &#1072;&#1082;&#1091;&#1084;&#1091;&#1083;&#1103;&#1090;&#1086;&#1088; &#1087;&#1110;&#1076;&#1074;&#1080;&#1097;&#1077;&#1085;&#1086;&#1111; &#1108;&#1084;&#1085;&#1086;&#1089;&#1090;&#1110; X-T4 &#1079;&#1072;&#1073;&#1077;&#1079;&#1087;&#1077;&#1095;&#1091;&#1102;&#1090;&#1100; &#1090;&#1088;&#1080;&#1074;&#1072;&#1083;&#1080;&#1081; &#1095;&#1072;&#1089; &#1088;&#1086;&#1073;&#1086;&#1090;&#1080;. &#1042;&#1089;&#1110; &#1094;&#1110; &#1090;&#1077;&#1093;&#1085;&#1110;&#1095;&#1085;&#1110; &#1085;&#1086;&#1074;&#1080;&#1085;&#1082;&#1080; &#1074;&#1084;&#1110;&#1097;&#1072;&#1102;&#1090;&#1100;&#1089;&#1103; &#1074; &#1082;&#1086;&#1084;&#1087;&#1072;&#1082;&#1090;&#1085;&#1086;&#1084;&#1091; &#1082;&#1086;&#1088;&#1087;&#1091;&#1089;&#1110;, &#1089;&#1090;&#1110;&#1081;&#1082;&#1086;&#1084;&#1091; &#1076;&#1086; &#1087;&#1080;&#1083;&#1091;, &#1074;&#1086;&#1083;&#1086;&#1075;&#1080; &#1090;&#1072; &#1087;&#1086;&#1075;&#1086;&#1076;&#1085;&#1080;&#1093; &#1091;&#1084;&#1086;&#1074;, &#1079;&#1072;&#1074;&#1076;&#1103;&#1082;&#1080; &#1095;&#1086;&#1084;&#1091; &#1082;&#1072;&#1084;&#1077;&#1088;&#1091; &#1084;&#1086;&#1078;&#1085;&#1072; &#1074;&#1080;&#1082;&#1086;&#1088;&#1080;&#1089;&#1090;&#1086;&#1074;&#1091;&#1074;&#1072;&#1090;&#1080; &#1079;&#1072; &#1090;&#1077;&#1084;&#1087;&#1077;&#1088;&#1072;&#1090;&#1091;&#1088;&#1080; &#1076;&#1086; -10 &#1075;&#1088;&#1072;&#1076;&#1091;&#1089;&#1110;&#1074; &#1062;&#1077;&#1083;&#1100;&#1089;&#1110;&#1103;. &#1045;&#1088;&#1075;&#1086;&#1085;&#1086;&#1084;&#1110;&#1095;&#1085;&#1080;&#1081; &#1093;&#1074;&#1072;&#1090; &#1076;&#1072;&#1108; &#1079;&#1084;&#1086;&#1075;&#1091; &#1084;&#1110;&#1094;&#1085;&#1086; &#1090;&#1088;&#1080;&#1084;&#1072;&#1090;&#1080; &#1082;&#1072;&#1084;&#1077;&#1088;&#1091; &#1085;&#1072;&#1074;&#1110;&#1090;&#1100; &#1110;&#1079; &#1074;&#1077;&#1083;&#1080;&#1082;&#1080;&#1084;&#1080; &#1090;&#1077;&#1083;&#1077;&#1086;&#1073;'&#1108;&#1082;&#1090;&#1080;&#1074;&#1072;&#1084;&#1080;.* &#1047; 18 &#1084;&#1086;&#1076;&#1077;&#1083;&#1103;&#1084;&#1080; &#1086;&#1073;'&#1108;&#1082;&#1090;&#1080;&#1074;&#1110;&#1074; XF FUJINON.&#1042;&#1110;&#1076;&#1077;&#1086;&#1045;&#1074;&#1086;&#1083;&#1102;&#1094;&#1110;&#1103; X-T4 &#1085;&#1077; &#1086;&#1073;&#1084;&#1077;&#1078;&#1091;&#1108;&#1090;&#1100;&#1089;&#1103; &#1090;&#1110;&#1083;&#1100;&#1082;&#1080; &#1092;&#1086;&#1090;&#1086;&#1075;&#1088;&#1072;&#1092;&#1091;&#1074;&#1072;&#1085;&#1085;&#1103;&#1084;. &#1050;&#1088;&#1110;&#1084; &#1096;&#1074;&#1080;&#1076;&#1082;&#1110;&#1089;&#1085;&#1086;&#1075;&#1086; &#1088;&#1077;&#1078;&#1080;&#1084;&#1091; &#1079;&#1072;&#1087;&#1080;&#1089;&#1091; &#1074;&#1110;&#1076;&#1077;&#1086; Full HD 240P &#1079; &#1077;&#1092;&#1077;&#1082;&#1090;&#1086;&#1084; &#1091;&#1087;&#1086;&#1074;&#1110;&#1083;&#1100;&#1085;&#1077;&#1085;&#1085;&#1103; &#1076;&#1086; 10 &#1088;&#1072;&#1079;&#1110;&#1074;, &#1082;&#1072;&#1084;&#1077;&#1088;&#1072; X-T4 &#1084;&#1072;&#1108; &#1092;&#1091;&#1085;&#1082;&#1094;&#1110;&#1102; &#1077;&#1083;&#1077;&#1082;&#1090;&#1088;&#1086;&#1085;&#1085;&#1086;&#1111; &#1089;&#1090;&#1072;&#1073;&#1110;&#1083;&#1110;&#1079;&#1072;&#1094;&#1110;&#1111; &#1079;&#1086;&#1073;&#1088;&#1072;&#1078;&#1077;&#1085;&#1085;&#1103; (DIS) &#1110; &#1088;&#1077;&#1078;&#1080;&#1084; &#1092;&#1086;&#1088;&#1089;&#1086;&#1074;&#1072;&#1085;&#1086;&#1111; &#1089;&#1090;&#1072;&#1073;&#1110;&#1083;&#1110;&#1079;&#1072;&#1094;&#1110;&#1111; &#1079;&#1086;&#1073;&#1088;&#1072;&#1078;&#1077;&#1085;&#1085;&#1103; (IS). &#1056;&#1072;&#1079;&#1086;&#1084; &#1110;&#1079; &#1074;&#1073;&#1091;&#1076;&#1086;&#1074;&#1072;&#1085;&#1086;&#1102; &#1089;&#1080;&#1089;&#1090;&#1077;&#1084;&#1086;&#1102; &#1089;&#1090;&#1072;&#1073;&#1110;&#1083;&#1110;&#1079;&#1072;&#1094;&#1110;&#1111; IBIS, &#1094;&#1110; &#1076;&#1074;&#1072; &#1088;&#1077;&#1078;&#1080;&#1084;&#1080; &#1079;&#1072;&#1073;&#1077;&#1079;&#1087;&#1077;&#1095;&#1091;&#1102;&#1090;&#1100; &#1079;&#1072;&#1087;&#1080;&#1089; &#1103;&#1082;&#1110;&#1089;&#1085;&#1086; &#1085;&#1086;&#1074;&#1086;&#1075;&#1086; &#1088;&#1110;&#1074;&#1085;&#1103; &#1085;&#1072;&#1074;&#1110;&#1090;&#1100; &#1073;&#1077;&#1079; &#1079;&#1086;&#1074;&#1085;&#1110;&#1096;&#1085;&#1100;&#1086;&#1075;&#1086; &#1089;&#1090;&#1072;&#1073;&#1110;&#1083;&#1110;&#1079;&#1072;&#1090;&#1086;&#1088;&#1072; &#1090;&#1072; &#1110;&#1085;&#1096;&#1080;&#1093; &#1076;&#1086;&#1076;&#1072;&#1090;&#1082;&#1086;&#1074;&#1080;&#1093; &#1087;&#1088;&#1080;&#1089;&#1090;&#1086;&#1089;&#1091;&#1074;&#1072;&#1085;&#1100;.
            [image] => Array
                (
                    [0] => https://content2.rozetka.com.ua/goods/images/base_action/25192088.jpg
                    [1] => https://content2.rozetka.com.ua/goods/images/base_action/25192112.jpg
                    [2] => https://content1.rozetka.com.ua/goods/images/base_action/25192133.jpg
                    [3] => https://content.rozetka.com.ua/goods/images/base_action/25192157.jpg
                    [4] => https://content2.rozetka.com.ua/goods/images/base_action/25192175.jpg
                    [5] => https://content2.rozetka.com.ua/goods/images/base_action/25192210.jpg
                    [6] => https://content2.rozetka.com.ua/goods/images/base_action/25192229.jpg
                    [7] => https://content2.rozetka.com.ua/goods/images/base_action/25192246.jpg
                )

            [url] => https://rozetka.com.ua/ua/fujifilm_16650467/p218036047/
            [sku] => 218036047
        )

    [errors] => Array
        (
        )

)
*/
```

- getErrors - повертає всі помилки. Можна отримати на різних етапах (до та після парсингу)
```php
$parser = new Rozetka('https://rozetka.com.ua/ua/fujifilm_16650');
$response = $parser->parse();
$errors = $parser->getErrors();

Array
(
    [0] => response_code
)
```

- getErrorBySlug - Повертає текст помилки українському по слагу, який можна отримати із getErrors або parse

```php
$error = $parser->getErrorBySlug('response_code');

string(47) "Помилковий код відповіді."
```