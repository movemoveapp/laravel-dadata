# <a href="https://movemoveapp.com" target="_blank"><img src="https://avatars2.githubusercontent.com/u/69967331?s=20&v=4" width="20"></a> DaData Laravel SDK Package
[![Build Status](https://app.travis-ci.com/movemoveapp/laravel-dadata.svg?branch=master)](https://app.travis-ci.com/movemoveapp/laravel-dadata)
[![Latest Stable Version](https://poser.pugx.org/movemoveapp/laravel-dadata/v)](//packagist.org/packages/movemoveapp/laravel-dadata)
[![Total Downloads](https://poser.pugx.org/movemoveapp/laravel-dadata/downloads)](//packagist.org/packages/movemoveapp/laravel-dadata)
[![License](https://poser.pugx.org/movemoveapp/laravel-dadata/license)](//packagist.org/packages/movemoveapp/laravel-dadata)

*DaData Laravel Package* - PHP SDK [Laravel](https://github.com/laravel/laravel) пакет для взаимодействия с API [DaData.ru](https://dadata.ru/) от [MoveMoveApp](https://movemoveapp.com/)

## Требования
- Версии PHP: 7.3, 7.4, 8.0, 8.1
- Версии Laravel: 7.x, 8.x, 9.x
- Версии Guzzle": 7.0, 7.2

## Установка
Вы можете установить пакет через composer:

```shell script
composer require movemoveapp/laravel-dadata
```

Если вы используете версию Laravel ниже **5.5**, то зарегистрируйте `DaDataServiceProvider` вручную, добавив в `config/app.php`в массиве `providers`:

```shell script
'providers' => [
  // ...
  MoveMoveIo\DaData\DaDataServiceProvider::class,
],

``` 

Публикация конфигурационного файла. Выполните `artisan` команду

```shell script
php artisan vendor:publish --provider="MoveMoveIo\DaData\DaDataServiceProvider"
```

Настройка проекта осществляется через `.env` вашего проекта. Вам необходимо указать три параметра
- `DADATA_TOKEN` - token для раоты с API DaData
- `DADATA_SECRET` - secret для работы с API DaData
- `DADATA_TIMEOUT` - максимальное время ожидания ответа от API сервисов DaData в секундах. По умолчанию это значение равно 10 секунд.

Пример `.env`

```php
DADATA_TOKEN="c32c33ebaf450067d64516fbe041d2a8a6d4211f"
DADATA_SECRET="adccd63ac28701442e26b7eef57eb5eb0a72143e"
DADATA_TIMEOUT=10
```

## Методы

- **Работа с адресами**
  - [Стандартизация адреса](https://github.com/movemoveapp/laravel-dadata#%D1%81%D1%82%D0%B0%D0%BD%D0%B4%D0%B0%D1%80%D1%82%D0%B8%D0%B7%D0%B0%D1%86%D0%B8%D1%8F-%D0%B0%D0%B4%D1%80%D0%B5%D1%81%D0%B0)
  - [Подсказки по адресам](https://github.com/movemoveapp/laravel-dadata#%D0%BF%D0%BE%D0%B4%D1%81%D0%BA%D0%B0%D0%B7%D0%BA%D0%B8-%D0%BF%D0%BE-%D0%B0%D0%B4%D1%80%D0%B5%D1%81%D0%B0%D0%BC)
  - [Определение адреса по координатам](https://github.com/movemoveapp/laravel-dadata#%D0%BE%D0%BF%D1%80%D0%B5%D0%B4%D0%B5%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5-%D0%B0%D0%B4%D1%80%D0%B5%D1%81%D0%B0-%D0%BF%D0%BE-%D0%BA%D0%BE%D0%BE%D1%80%D0%B4%D0%B8%D0%BD%D0%B0%D1%82%D0%B0%D0%BC)
  - [Определение адреса по IP](https://github.com/movemoveapp/laravel-dadata#%D0%BE%D0%BF%D1%80%D0%B5%D0%B4%D0%B5%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5-%D0%B0%D0%B4%D1%80%D0%B5%D1%81%D0%B0-%D0%BF%D0%BE-ip)
  - [Определение адреса по КЛАДР или ФИАС коду](https://github.com/movemoveapp/laravel-dadata#%D0%BE%D0%BF%D1%80%D0%B5%D0%B4%D0%B5%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5-%D0%B0%D0%B4%D1%80%D0%B5%D1%81%D0%B0-%D0%BF%D0%BE-%D0%BA%D0%BB%D0%B0%D0%B4%D1%80-%D0%B8%D0%BB%D0%B8-%D1%84%D0%B8%D0%B0%D1%81-%D0%BA%D0%BE%D0%B4%D1%83)
  - [Определение ближайшего отделения Почты России по адресу](https://github.com/movemoveapp/laravel-dadata#%D0%BE%D0%BF%D1%80%D0%B5%D0%B4%D0%B5%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5-%D0%B1%D0%BB%D0%B8%D0%B6%D0%B0%D0%B9%D1%88%D0%B5%D0%B3%D0%BE-%D0%BE%D1%82%D0%B4%D0%B5%D0%BB%D0%B5%D0%BD%D0%B8%D1%8F-%D0%BF%D0%BE%D1%87%D1%82%D1%8B-%D1%80%D0%BE%D1%81%D1%81%D0%B8%D0%B8-%D0%BF%D0%BE-%D0%B0%D0%B4%D1%80%D0%B5%D1%81%D1%83)
  - [Определение отделения Почты России почтовому индексу](https://github.com/movemoveapp/laravel-dadata#%D0%BE%D0%BF%D1%80%D0%B5%D0%B4%D0%B5%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5-%D0%BE%D1%82%D0%B4%D0%B5%D0%BB%D0%B5%D0%BD%D0%B8%D1%8F-%D0%BF%D0%BE%D1%87%D1%82%D1%8B-%D1%80%D0%BE%D1%81%D1%81%D0%B8%D0%B8-%D0%BF%D0%BE-%D0%BF%D0%BE%D1%87%D1%82%D0%BE%D0%B2%D0%BE%D0%BC%D1%83-%D0%B8%D0%BD%D0%B4%D0%B5%D0%BA%D1%81%D1%83)
  - [Определение отделения Почты России по координатам](https://github.com/movemoveapp/laravel-dadata#%D0%BE%D0%BF%D1%80%D0%B5%D0%B4%D0%B5%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5-%D0%BE%D1%82%D0%B4%D0%B5%D0%BB%D0%B5%D0%BD%D0%B8%D1%8F-%D0%BF%D0%BE%D1%87%D1%82%D1%8B-%D1%80%D0%BE%D1%81%D1%81%D0%B8%D0%B8-%D0%BF%D0%BE-%D0%BA%D0%BE%D0%BE%D1%80%D0%B4%D0%B8%D0%BD%D0%B0%D1%82%D0%B0%D0%BC)
  - [Определение идентификатора города в СДЭК, Boxberry и DPD](https://github.com/movemoveapp/laravel-dadata#%D0%BE%D0%BF%D1%80%D0%B5%D0%B4%D0%B5%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5-%D0%B8%D0%B4%D0%B5%D0%BD%D1%82%D0%B8%D1%84%D0%B8%D0%BA%D0%B0%D1%82%D0%BE%D1%80%D0%B0-%D0%B3%D0%BE%D1%80%D0%BE%D0%B4%D0%B0-%D0%B2-%D1%81%D0%B4%D1%8D%D0%BA-boxberry-%D0%B8-dpd)
  - [Адрес в ФИАС по идентификатору](https://github.com/movemoveapp/laravel-dadata#%D0%B0%D0%B4%D1%80%D0%B5%D1%81-%D0%B2-%D1%84%D0%B8%D0%B0%D1%81-%D0%BF%D0%BE-%D0%B8%D0%B4%D0%B5%D0%BD%D1%82%D0%B8%D1%84%D0%B8%D0%BA%D0%B0%D1%82%D0%BE%D1%80%D1%83)
- **Работа с именами**
  - [ФИО](https://github.com/movemoveapp/laravel-dadata#%D1%84%D0%B8%D0%BE)
  - [Автодополнение при вводе («подсказки»)](https://github.com/movemoveapp/laravel-dadata#%D0%B0%D0%B2%D1%82%D0%BE%D0%B4%D0%BE%D0%BF%D0%BE%D0%BB%D0%BD%D0%B5%D0%BD%D0%B8%D0%B5-%D0%BF%D1%80%D0%B8-%D0%B2%D0%B2%D0%BE%D0%B4%D0%B5-%D0%BF%D0%BE%D0%B4%D1%81%D0%BA%D0%B0%D0%B7%D0%BA%D0%B8)
- **Работа с электорнными (email) адресами**
  - [Email](https://github.com/movemoveapp/laravel-dadata#email)
  - [Подсказки по email](https://github.com/movemoveapp/laravel-dadata#%D0%BF%D0%BE%D0%B4%D1%81%D0%BA%D0%B0%D0%B7%D0%BE%D0%BA%D0%B8-%D0%BF%D0%BE-email)
- **Работа с телефонными номерами**
  - [Проверить телефон](https://github.com/movemoveapp/laravel-dadata#%D0%BF%D1%80%D0%BE%D0%B2%D0%B5%D1%80%D0%B8%D1%82%D1%8C-%D1%82%D0%B5%D0%BB%D0%B5%D1%84%D0%BE%D0%BD)
- **Работа с компаниями**
  - [Организация по ИНН](https://github.com/movemoveapp/laravel-dadata#%D0%BE%D1%80%D0%B3%D0%B0%D0%BD%D0%B8%D0%B7%D0%B0%D1%86%D0%B8%D1%8F-%D0%BF%D0%BE-%D0%B8%D0%BD%D0%BD)
  - [Автодополнение при вводе («подсказки»)](https://github.com/movemoveapp/laravel-dadata#%D0%B0%D0%B2%D1%82%D0%BE%D0%B4%D0%BE%D0%BF%D0%BE%D0%BB%D0%BD%D0%B5%D0%BD%D0%B8%D0%B5-%D0%BF%D1%80%D0%B8-%D0%B2%D0%B2%D0%BE%D0%B4%D0%B5-%D0%BF%D0%BE%D0%B4%D1%81%D0%BA%D0%B0%D0%B7%D0%BA%D0%B8-1)
  - [Поиск аффилированных компаний](https://github.com/movemoveapp/laravel-dadata#%D0%BF%D0%BE%D0%B8%D1%81%D0%BA-%D0%B0%D1%84%D1%84%D0%B8%D0%BB%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%BD%D1%8B%D1%85-%D0%BA%D0%BE%D0%BC%D0%BF%D0%B0%D0%BD%D0%B8%D0%B9)
- **Работа с банками**
  - [Банк по БИК, SWIFT, ИНН или регистрационному номеру](https://github.com/movemoveapp/laravel-dadata#%D0%B1%D0%B0%D0%BD%D0%BA-%D0%BF%D0%BE-%D0%B1%D0%B8%D0%BA-swift-%D0%B8%D0%BD%D0%BD-%D0%B8%D0%BB%D0%B8-%D1%80%D0%B5%D0%B3%D0%B8%D1%81%D1%82%D1%80%D0%B0%D1%86%D0%B8%D0%BE%D0%BD%D0%BD%D0%BE%D0%BC%D1%83-%D0%BD%D0%BE%D0%BC%D0%B5%D1%80%D1%83)
  - [API подсказок по банкам](https://github.com/movemoveapp/laravel-dadata#api-%D0%BF%D0%BE%D0%B4%D1%81%D0%BA%D0%B0%D0%B7%D0%BE%D0%BA-%D0%BF%D0%BE-%D0%B1%D0%B0%D0%BD%D0%BA%D0%B0%D0%BC)
- **Работа с паспортами**
  - [Проверка по реестру МВД](https://github.com/movemoveapp/laravel-dadata#%D0%BF%D1%80%D0%BE%D0%B2%D0%B5%D1%80%D0%BA%D0%B0-%D0%BF%D0%BE-%D1%80%D0%B5%D0%B5%D1%81%D1%82%D1%80%D1%83-%D0%BC%D0%B2%D0%B4)
  - [Кем выдан паспорт](https://github.com/movemoveapp/laravel-dadata#%D0%BA%D0%B5%D0%BC-%D0%B2%D1%8B%D0%B4%D0%B0%D0%BD-%D0%BF%D0%B0%D1%81%D0%BF%D0%BE%D1%80%D1%82)  



## Работа с адресами
### Стандартизация адреса
`DaDataAddress::standardization(string $address)` - разбивает адрес из строки по отдельным полям (регион, город, улица, дом, квартира) согласно КЛАДР/ФИАС. Определяет почтовый индекс, часовой пояс, ближайшее метро, координаты, стоимость квартиры и другую информацию об адресе.

Основные кейсы:

- Разбивает адрес по отдельным полям (регион, город, улица, дом, квартира).
- Рассчитывает корректный индекс по данным Почты России.
- Определяет координаты.
- Показывает округ и район города, ближайшее метро, площадь и стоимость квартиры.
- Достает коды КЛАДР, ФИАС, ОКАТО, ОКТМО и ИФНС. 

Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataAddress;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData standardization example
    *
    * @return void
    */
    public function standardizationExample() : void
    {
        $dadata = DaDataAddress::standardization('мск сухонска 11/-89');

        dd($dadata);    
    }

}

```

Пример ответа

```php
array:1 [
  0 => array:80 [
    "source" => "мск сухонска 11/-89"
    "result" => "г Москва, ул Сухонская, д 11, кв 89"
    "postal_code" => "127642"
    "country" => "Россия"
    "country_iso_code" => "RU"
    "federal_district" => "Центральный"
    "region_fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5"
    "region_kladr_id" => "7700000000000"
    "region_iso_code" => "RU-MOW"
    "region_with_type" => "г Москва"
    "region_type" => "г"
    "region_type_full" => "город"
    "region" => "Москва"
    "area_fias_id" => null
    "area_kladr_id" => null
    "area_with_type" => null
    "area_type" => null
    "area_type_full" => null
    "area" => null
    "city_fias_id" => null
    "city_kladr_id" => null
    "city_with_type" => null
    "city_type" => null
    "city_type_full" => null
    "city" => null
    "city_area" => "Северо-восточный"
    "city_district_fias_id" => null
    "city_district_kladr_id" => null
    "city_district_with_type" => "р-н Северное Медведково"
    "city_district_type" => "р-н"
    "city_district_type_full" => "район"
    "city_district" => "Северное Медведково"
    "settlement_fias_id" => null
    "settlement_kladr_id" => null
    "settlement_with_type" => null
    "settlement_type" => null
    "settlement_type_full" => null
    "settlement" => null
    "street_fias_id" => "95dbf7fb-0dd4-4a04-8100-4f6c847564b5"
    "street_kladr_id" => "77000000000283600"
    "street_with_type" => "ул Сухонская"
    "street_type" => "ул"
    "street_type_full" => "улица"
    "street" => "Сухонская"
    "house_fias_id" => "5ee84ac0-eb9a-4b42-b814-2f5f7c27c255"
    "house_kladr_id" => "7700000000028360004"
    "house_type" => "д"
    "house_type_full" => "дом"
    "house" => "11"
    "block_type" => null
    "block_type_full" => null
    "block" => null
    "flat_type" => "кв"
    "flat_type_full" => "квартира"
    "flat" => "89"
    "flat_area" => "34.6"
    "square_meter_price" => "198113"
    "flat_price" => "6854710"
    "postal_box" => null
    "fias_id" => "5ee84ac0-eb9a-4b42-b814-2f5f7c27c255"
    "fias_code" => "77000000000000028360004"
    "fias_level" => "8"
    "fias_actuality_state" => "0"
    "kladr_id" => "7700000000028360004"
    "capital_marker" => "0"
    "okato" => "45280583000"
    "oktmo" => "45362000"
    "tax_office" => "7715"
    "tax_office_legal" => "7715"
    "timezone" => "UTC+3"
    "geo_lat" => "55.8782557"
    "geo_lon" => "37.65372"
    "beltway_hit" => "IN_MKAD"
    "beltway_distance" => null
    "qc_geo" => 0
    "qc_complete" => 0
    "qc_house" => 2
    "qc" => 0
    "unparsed_parts" => null
    "metro" => array:3 [
      0 => array:3 [
        "distance" => 1.1
        "line" => "Калужско-Рижская"
        "name" => "Бабушкинская"
      ]
      1 => array:3 [
        "distance" => 1.2
        "line" => "Калужско-Рижская"
        "name" => "Медведково"
      ]
      2 => array:3 [
        "distance" => 2.5
        "line" => "Калужско-Рижская"
        "name" => "Свиблово"
      ]
    ]
  ]
]
```

Описани ответа

|       **Название**        |   **Длина**  |                       **Описание**                             |
|:--------------------------|-------------:|:---------------------------------------------------------------|
| `source`                  | 250 | Исходный адрес одной строкой                                            |
| `result`                  | 500 | Стандартизованный адрес одной строкой                                   |
| `postal_code`             | 6   | Индекс                                                                  |
| `country`                 | 120 | Страна                                                                  |
| `country_iso_code`        | 2   | ISO-код страны                                                          |
| `federal_district`        | 20  | Федеральный округ                                                       |
| `region_fias_id`          | 36  | ФИАС-код региона                                                        |
| `region_kladr_id`         | 19  | КЛАДР-код региона                                                       |
| `region_iso_code`         | 6   | ISO-код региона                                                         |
| `region_with_type`        | 131 | Регион с типом                                                          |
| `region_type`             | 10  | Тип региона (сокращенный)                                               |
| `region_type_full`        | 50  | Тип региона                                                             |
| `region`                  | 120 | Регион                                                                  |
| `area_fias_id`            | 36  | ФИАС-код района                                                         |
| `area_kladr_id`           | 19  | КЛАДР-код района                                                        |
| `area_with_type`          | 131 | Район в регионе с типом                                                 |
| `area_type`               | 10  | Тип района в регионе (сокращенный)                                      |
| `area_type_full`          | 50  | Тип района в регионе                                                    |
| `area`                    | 120 | Район в регионе                                                         |
| `city_fias_id`            | 36  | ФИАС-код города                                                         |
| `city_kladr_id`           | 19  | КЛАДР-код города                                                        |
| `city_with_type`          | 131 | Город с типом                                                           |
| `city_type`               | 10  | Тип города (сокращенный)                                                |
| `city_type_full`          | 50  | Тип города                                                              |
| `city`                    | 120 | Город                                                                   |
| `city_area`               | 120 | Административный округ (только для Москвы)                              |
| `city_district_fias_id`   | 36  | ФИАС-код района города (заполняется, только если район есть в ФИАС)     |
| `city_district_kladr_id`  | 19  | КЛАДР-код района города (не заполняется)                                |
| `city_district_with_type` | 131 | Район города с типом                                                    |
| `city_district_type`      | 10  | Тип района города (сокращенный)                                         |
| `city_district_type_full` | 50  | Тип района города                                                       |
| `city_district`           | 120 | Район города                                                            |
| `settlement_fias_id`      | 36  | ФИАС-код населенного пункта                                             |
| `settlement_kladr_id`     | 19  | КЛАДР-код населенного пункта                                            |
| `settlement_with_type`    | 131 | Населенный пункт с типом                                                |
| `settlement_type`         | 10  | Тип населенного пункта (сокращенный)                                    |
| `settlement_type_full`    | 50  | Тип населенного пункта                                                  |
| `settlement`              | 120 | Населенный пункт                                                        |
| `street_fias_id`          | 36  | ФИАС-код улицы                                                          |
| `street_kladr_id`         | 19  | КЛАДР-код улицы                                                         |
| `street_with_type`        | 131 | Улица с типом                                                           |
| `street_type`             | 10  | Тип улицы (сокращенный)                                                 |
| `street_type_full`        | 50  | Тип улицы                                                               |
| `street`                  | 120 | Улица                                                                   |
| `house_fias_id`           | 36  | ФИАС-код дома                                                           |
| `house_kladr_id`          | 19  | КЛАДР-код дома                                                          |
| `house_type`              | 10  | Тип дома (сокращенный)                                                  |
| `house_type_full`         | 50  | Тип дома                                                                |
| `house`                   | 50  | Дом                                                                     |
| `block_type`              | 10  | Тип корпуса/строения (сокращенный)                                      |
| `block_type_full`         | 50  | Тип корпуса/строения                                                    |
| `block`                   | 50  | Корпус/строение                                                         |
| `flat_type`               | 10  | Тип квартиры (сокращенный)                                              |
| `flat_type_full`          | 50  | Тип квартиры                                                            |
| `flat`                    | 50  | Квартира                                                                |
| `flat_area`               | 50  | Площадь квартиры                                                        |
| `square_meter_price`      | 50  | Рыночная стоимость м²                                                   |
| `flat_price`              | 50  | Рыночная стоимость квартиры                                             |
| `postal_box`              | 50  | Абонентский ящик                                                        |
| `fias_id`                 | 36  | ФИАС-код адреса (идентификатор ФИАС)                                    |
|                           |     | `HOUSE.HOUSEGUID — если дом найден в ФИАС`                              |
|                           |     | `ADDROBJ.AOGUID — в противном случае`                                   |
| `fias_code`               |     | Иерархический код адреса в ФИАС (СС+РРР+ГГГ+ППП+СССС+УУУУ+ДДДД)         |
| `fias_level`              | 2   | Уровень детализации, до которого адрес найден в ФИАС                    |
| `fias_actuality_state`    |     | Признак актуальности адреса в ФИАС                                      |
| `kladr_id`                | 19  | КЛАДР-код адреса                                                        |
| `capital_marker`          | 1   | Признак центра района или региона                                       |
| `okato`                   | 11  | Код ОКАТО                                                               |
| `oktmo`                   | 11  | Код ОКТМО                                                               |
| `tax_office`              | 4   | Код ИФНС для физических лиц                                             |
| `tax_office_legal`        | 4   | Код ИФНС для организаций                                                |
| `timezone`                | 50  | Часовой пояс города для России, часовой пояс страны — для иностранных адресов. Если у страны несколько поясов, вернёт минимальный и максимальный через слеш: UTC+5/UTC+6 |
| `geo_lat`                 | 12  | Координаты: широта                                                      |
| `geo_lon`                 | 12  | Координаты: долгота                                                     |
| `beltway_hit`             | 8   | Внутри кольцевой?                                                       |
| `beltway_distance`        | 3   | Расстояние от кольцевой в км. Заполнено, только если beltway_hit = OUT_MKAD или OUT_KAD, иначе пустое |
| `qc_geo`                  | 5   | Код точности координат                                                  |
| `qc_complete`             | 5   | Код пригодности к рассылке                                              |
| `qc_house`                | 5   | Признак наличия дома в ФИАС                                             |
| `qc`                      | 5   | Код проверки адреса                                                     |
| `unparsed_parts`          | 250 | Нераспознанная часть адреса. Для адреса «Москва, Митинская улица, 40, вход с торца» вернет «ВХОД, С, ТОРЦА» |
| `metro`                   |     | Список ближайших станций метро (до трёх штук)                           |

Координаты есть у 97% домов в Москве, 91% в Санкт-Петербурге, 69% в других городах-миллиониках и 47% по остальной России. Площадь и стоимость есть у 70% квартир в России.

**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ или секретный ключ или в запросе указан несуществующий ключ  |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

Пример получения сообщения исключения

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataAddress;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData standardization example
    *
    * @return void
    */
    public function standardizationExample() : void
    {
        try {
            $dadata = DaDataAddress::standardization('мск сухонска 11/-89');

            dd($dadata);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

}

```

### Подсказки по адресам
`DaDataAddress::prompt(string $query, int $count, int $language, array $locations, array $locations_geo, array $locations_boost, array $from_bound, array $to_bound)` Ищет адреса по любой части адреса от региона до дома («тверская нижний 12» → «Нижегородская обл, г Нижний Новгород, ул Тверская, д 12»). Также ищет почтовому индексу («105568» → «г Москва, ул Магнитогорская»).

Основные кейсы:
- Работает по всем странам мира (по России до дома, по остальным странам — до города). Ищет и показывает результаты как на русском языке («Самара, пр-кт Металлургов»), так и на английском («Russia, gorod Samara, prospekt Metallurgov»).
- Находит актуальные адреса по историческим названиям (Свердловск → Екатеринбург) и синонимам (Питер → Санкт-Петербург).
- Ищет по частичному совпадению («москва болот» → «г Москва, Болотная наб»), но только в последнем слове запроса («мос болот» не найдет).
- Исправляет опечатки («самара авиционная») и запросы в неправильной раскладке («vjcrdf» → «москва»).
-️ Раскладывает выбранный адрес на гранулярные части (от региона до квартиры).
-️ Поддерживает гранулярные подсказки по отдельным частям адреса (регионы, города, улицы, дома).
-️ Подсказывает адреса в конкретных регионах, районах, городах и населенных пунктах. Понимает названия («Петергоф»), коды КЛАДР («7800000800000») и ФИАС («8f238984-812b-4bb1-850b-49749fb5c56d»).
-️ Учитывает, где вы находитесь (в связке с методом город по IP-адресу).

Важно знать, что использовать данный метод не рекомендуется если вы 
- Хотите автоматически, без участия человека, обработать адреса из базы или файла.
- Транслитерировать строки, например `moskva suhonskaja 11 → 127642` в `г Москва, ул Сухонская, д 11`.

Подсказки не подходят для автоматической обработки адресов. Они предлагают варианты, но не гарантируют, что угадали правильно. Поэтому окончательное решение всегда должен принимать человек.

Для автоматической обработки и транслитерации используйте `DaDataAddress::standardization(string $address)` метод.


Параметры вызова

| **Название**      | **Тип**  | **Optional** | **Default value** |  **Описание**                               |
|:------------------|:--------:|:------------:|:-----------------:|:--------------------------------------------|
| `query`           | `string` | `false`      |                   | Текст запроса                               |
| `count`           | `int`    | `true`       | 10                | Колличество результатов. Максимум 20        |
| `language`        | `int`    | `true`       | 1                 | Язык ответа. Он может быть **русский** значение `language = 1` или **английским**, значение `language = 2`. Мы призываем использовать константы `Language::RU` или `Language::EN` |
| `locations`       | `array`  | `true`       | []                | [Ограничение по родителю](https://confluence.hflabs.ru/pages/viewpage.action?pageId=204669108) (страна, регион, район, город, улица) |
| `locations_geo`   | `array`  | `true`       | []                | [Ограничение по радиусу окружности](https://confluence.hflabs.ru/pages/viewpage.action?pageId=990871806) | 
| `locations_boost` | `array`  | `true`       | []                | [Приоритет города при ранжировании](https://confluence.hflabs.ru/pages/viewpage.action?pageId=285343795) |
| `from_bound`      | `array`  | `true`       | []                | [Гранулярные подсказки по адресу](https://confluence.hflabs.ru/pages/viewpage.action?pageId=222888017) |
| `to_bound`        | `array`  | `true`       | []                | [Гранулярные подсказки по адресу](https://confluence.hflabs.ru/pages/viewpage.action?pageId=222888017) |


Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Enums\Language;
use MoveMoveIo\DaData\Facades\DaDataAddress;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData prompt example
    *
    * @return void
    */
    public function promptExample() : void
    {
        $dadata = DaDataAddress::prompt('москва хабар', 2, Language::RU);

        dd($dadata);    
    }

}

```

Пример ответа

```php
array:1 [
  "suggestions" => array:2 [
    0 => array:3 [
      "value" => "г Москва, ул Хабаровская"
      "unrestricted_value" => "г Москва, ул Хабаровская"
      "data" => array:81 [
        "postal_code" => null
        "country" => "Россия"
        "country_iso_code" => "RU"
        "federal_district" => null
        "region_fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5"
        "region_kladr_id" => "7700000000000"
        "region_iso_code" => "RU-MOW"
        "region_with_type" => "г Москва"
        "region_type" => "г"
        "region_type_full" => "город"
        "region" => "Москва"
        "area_fias_id" => null
        "area_kladr_id" => null
        "area_with_type" => null
        "area_type" => null
        "area_type_full" => null
        "area" => null
        "city_fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5"
        "city_kladr_id" => "7700000000000"
        "city_with_type" => "г Москва"
        "city_type" => "г"
        "city_type_full" => "город"
        "city" => "Москва"
        "city_area" => null
        "city_district_fias_id" => null
        "city_district_kladr_id" => null
        "city_district_with_type" => null
        "city_district_type" => null
        "city_district_type_full" => null
        "city_district" => null
        "settlement_fias_id" => null
        "settlement_kladr_id" => null
        "settlement_with_type" => null
        "settlement_type" => null
        "settlement_type_full" => null
        "settlement" => null
        "street_fias_id" => "32fcb102-2a50-44c9-a00e-806420f448ea"
        "street_kladr_id" => "77000000000713400"
        "street_with_type" => "ул Хабаровская"
        "street_type" => "ул"
        "street_type_full" => "улица"
        "street" => "Хабаровская"
        "house_fias_id" => null
        "house_kladr_id" => null
        "house_type" => null
        "house_type_full" => null
        "house" => null
        "block_type" => null
        "block_type_full" => null
        "block" => null
        "flat_type" => null
        "flat_type_full" => null
        "flat" => null
        "flat_area" => null
        "square_meter_price" => null
        "flat_price" => null
        "postal_box" => null
        "fias_id" => "32fcb102-2a50-44c9-a00e-806420f448ea"
        "fias_code" => "7700000000000007134"
        "fias_level" => "7"
        "fias_actuality_state" => "0"
        "kladr_id" => "77000000000713400"
        "geoname_id" => "524894"
        "capital_marker" => "0"
        "okato" => "45263564000"
        "oktmo" => "45305000"
        "tax_office" => "7718"
        "tax_office_legal" => "7718"
        "timezone" => null
        "geo_lat" => "55.821168"
        "geo_lon" => "37.82608"
        "beltway_hit" => null
        "beltway_distance" => null
        "metro" => null
        "qc_geo" => "2"
        "qc_complete" => null
        "qc_house" => null
        "history_values" => array:1 [
          0 => "ул Черненко"
        ]
        "unparsed_parts" => null
        "source" => null
        "qc" => null
      ]
    ]
    1 => array:3 [
      "value" => "г Москва, поселение Московский, г Московский, ул Хабарова"
      "unrestricted_value" => "г Москва, поселение Московский, г Московский, ул Хабарова"
      "data" => array:81 [
        "postal_code" => null
        "country" => "Россия"
        "country_iso_code" => "RU"
        "federal_district" => null
        "region_fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5"
        "region_kladr_id" => "7700000000000"
        "region_iso_code" => "RU-MOW"
        "region_with_type" => "г Москва"
        "region_type" => "г"
        "region_type_full" => "город"
        "region" => "Москва"
        "area_fias_id" => "762758bb-18b9-440f-bc61-8e1e77ff3fd8"
        "area_kladr_id" => "7701100000000"
        "area_with_type" => "поселение Московский"
        "area_type" => "п"
        "area_type_full" => "поселение"
        "area" => "Московский"
        "city_fias_id" => "fbcf1fff-1d7c-445e-ad92-b71c08b8aba3"
        "city_kladr_id" => "7701100200000"
        "city_with_type" => "г Московский"
        "city_type" => "г"
        "city_type_full" => "город"
        "city" => "Московский"
        "city_area" => null
        "city_district_fias_id" => null
        "city_district_kladr_id" => null
        "city_district_with_type" => null
        "city_district_type" => null
        "city_district_type_full" => null
        "city_district" => null
        "settlement_fias_id" => null
        "settlement_kladr_id" => null
        "settlement_with_type" => null
        "settlement_type" => null
        "settlement_type_full" => null
        "settlement" => null
        "street_fias_id" => "4d70a35d-9246-4d9c-bcf1-90812ad056a3"
        "street_kladr_id" => "77011002000003700"
        "street_with_type" => "ул Хабарова"
        "street_type" => "ул"
        "street_type_full" => "улица"
        "street" => "Хабарова"
        "house_fias_id" => null
        "house_kladr_id" => null
        "house_type" => null
        "house_type_full" => null
        "house" => null
        "block_type" => null
        "block_type_full" => null
        "block" => null
        "flat_type" => null
        "flat_type_full" => null
        "flat" => null
        "flat_area" => null
        "square_meter_price" => null
        "flat_price" => null
        "postal_box" => null
        "fias_id" => "4d70a35d-9246-4d9c-bcf1-90812ad056a3"
        "fias_code" => "7701100200000000037"
        "fias_level" => "7"
        "fias_actuality_state" => "0"
        "kladr_id" => "77011002000003700"
        "geoname_id" => "857690"
        "capital_marker" => "0"
        "okato" => "45297565001"
        "oktmo" => "45952000"
        "tax_office" => "7751"
        "tax_office_legal" => "7751"
        "timezone" => null
        "geo_lat" => "55.59483"
        "geo_lon" => "37.35963"
        "beltway_hit" => null
        "beltway_distance" => null
        "metro" => null
        "qc_geo" => "2"
        "qc_complete" => null
        "qc_house" => null
        "history_values" => null
        "unparsed_parts" => null
        "source" => null
        "qc" => null
      ]
    ]
  ]
]

```

Описание ответа

|       **Название**        |                       **Описание**                                                                            |
|:--------------------------|:--------------------------------------------------------------------------------------------------------------|
| `value`                   | Адрес одной строкой (как показывается в списке подсказок)                                                     |
| `unrestricted_value`      | Адрес одной строкой (полный, с индексом)                                                                      |
| `data`                    | Вложенный массив данных аналагичный структуре выдачи метода `DaDataAddress::standardization(string $address)` |

**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ                                                              |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `413`                | Слишком большая длина запроса или слишком много условий                                     |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

Пример получения сообщения исключения

```php
<?php

namespace App;

use MoveMoveIo\DaData\Enums\Language;
use MoveMoveIo\DaData\Facades\DaDataAddress;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData prompt example
    *
    * @return void
    */
    public function promptExample() : void
    {
        try {
            $dadata = DaDataAddress::prompt('москва хабар', 2, Language::RU);

            dd($dadata);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

}

```

### Определение адреса по координатам
`DaDataAddress::geolocate(float $lat, float $lon, int $count, int $radius_meters, int $language)` Находит ближайшие адреса (дома, улицы, города) по географическим координатам. Только для России.
                                                                                                  
Параметры вызова

| **Название**      | **Тип**  | **Optional** | **Default value** |  **Описание**                               |
|:------------------|:--------:|:------------:|:-----------------:|:--------------------------------------------|
| `lat`           | `float`    | `false`      |                   | Географическая широта                       |
| `lon`           | `float`    | `false`      |                   | Географическая долгота                      |
| `count`         | `int`      | `true`       | 10                | Количество результатов (максимум — 20)      |
| `radius_meters` | `int`      | `true`       | 100               | Радиус поиска в метрах (максимум – 1000)    |
| `language`      | `int`      | `true`       | 1                 | Язык ответа. Он может быть **русский** значение `language = 1` или **английским**, значение `language = 2`. Мы призываем использовать константы `Language::RU` или `Language::EN` | 

Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataAddress;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData geolocate example
    *
    * @return void
    */
    public function geolocateExample() : void
    {
        $dadata = DaDataAddress::geolocate('55.878', '37.653', 2);

        dd($dadata);    
    }

}

```

Пример ответа

```php
array:1 [
  "suggestions" => array:2 [
    0 => array:3 [
      "value" => "г Москва, ул Сухонская, д 11"
      "unrestricted_value" => "127642, г Москва, ул Сухонская, д 11"
      "data" => array:81 [
        "postal_code" => "127642"
        "country" => "Россия"
        "country_iso_code" => "RU"
        "federal_district" => null
        "region_fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5"
        "region_kladr_id" => "7700000000000"
        "region_iso_code" => "RU-MOW"
        "region_with_type" => "г Москва"
        "region_type" => "г"
        "region_type_full" => "город"
        "region" => "Москва"
        "area_fias_id" => null
        "area_kladr_id" => null
        "area_with_type" => null
        "area_type" => null
        "area_type_full" => null
        "area" => null
        "city_fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5"
        "city_kladr_id" => "7700000000000"
        "city_with_type" => "г Москва"
        "city_type" => "г"
        "city_type_full" => "город"
        "city" => "Москва"
        "city_area" => null
        "city_district_fias_id" => null
        "city_district_kladr_id" => null
        "city_district_with_type" => null
        "city_district_type" => null
        "city_district_type_full" => null
        "city_district" => null
        "settlement_fias_id" => null
        "settlement_kladr_id" => null
        "settlement_with_type" => null
        "settlement_type" => null
        "settlement_type_full" => null
        "settlement" => null
        "street_fias_id" => "95dbf7fb-0dd4-4a04-8100-4f6c847564b5"
        "street_kladr_id" => "77000000000283600"
        "street_with_type" => "ул Сухонская"
        "street_type" => "ул"
        "street_type_full" => "улица"
        "street" => "Сухонская"
        "house_fias_id" => "5ee84ac0-eb9a-4b42-b814-2f5f7c27c255"
        "house_kladr_id" => "7700000000028360004"
        "house_type" => "д"
        "house_type_full" => "дом"
        "house" => "11"
        "block_type" => null
        "block_type_full" => null
        "block" => null
        "flat_type" => null
        "flat_type_full" => null
        "flat" => null
        "flat_area" => null
        "square_meter_price" => null
        "flat_price" => null
        "postal_box" => null
        "fias_id" => "5ee84ac0-eb9a-4b42-b814-2f5f7c27c255"
        "fias_code" => "77000000000000028360004"
        "fias_level" => "8"
        "fias_actuality_state" => "0"
        "kladr_id" => "7700000000028360004"
        "geoname_id" => "524894"
        "capital_marker" => "0"
        "okato" => "45280583000"
        "oktmo" => "45362000"
        "tax_office" => "7715"
        "tax_office_legal" => "7715"
        "timezone" => null
        "geo_lat" => "55.878315"
        "geo_lon" => "37.65372"
        "beltway_hit" => null
        "beltway_distance" => null
        "metro" => null
        "qc_geo" => "0"
        "qc_complete" => null
        "qc_house" => null
        "history_values" => null
        "unparsed_parts" => null
        "source" => null
        "qc" => null
      ]
    ]
    1 => array:3 [
      "value" => "г Москва, ул Сухонская, д 11А"
      "unrestricted_value" => "127642, г Москва, ул Сухонская, д 11А"
      "data" => array:81 [
        "postal_code" => "127642"
        "country" => "Россия"
        "country_iso_code" => "RU"
        "federal_district" => null
        "region_fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5"
        "region_kladr_id" => "7700000000000"
        "region_iso_code" => "RU-MOW"
        "region_with_type" => "г Москва"
        "region_type" => "г"
        "region_type_full" => "город"
        "region" => "Москва"
        "area_fias_id" => null
        "area_kladr_id" => null
        "area_with_type" => null
        "area_type" => null
        "area_type_full" => null
        "area" => null
        "city_fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5"
        "city_kladr_id" => "7700000000000"
        "city_with_type" => "г Москва"
        "city_type" => "г"
        "city_type_full" => "город"
        "city" => "Москва"
        "city_area" => null
        "city_district_fias_id" => null
        "city_district_kladr_id" => null
        "city_district_with_type" => null
        "city_district_type" => null
        "city_district_type_full" => null
        "city_district" => null
        "settlement_fias_id" => null
        "settlement_kladr_id" => null
        "settlement_with_type" => null
        "settlement_type" => null
        "settlement_type_full" => null
        "settlement" => null
        "street_fias_id" => "95dbf7fb-0dd4-4a04-8100-4f6c847564b5"
        "street_kladr_id" => "77000000000283600"
        "street_with_type" => "ул Сухонская"
        "street_type" => "ул"
        "street_type_full" => "улица"
        "street" => "Сухонская"
        "house_fias_id" => "abc31736-35c1-4443-a061-b67c183b590a"
        "house_kladr_id" => "7700000000028360005"
        "house_type" => "д"
        "house_type_full" => "дом"
        "house" => "11А"
        "block_type" => null
        "block_type_full" => null
        "block" => null
        "flat_type" => null
        "flat_type_full" => null
        "flat" => null
        "flat_area" => null
        "square_meter_price" => null
        "flat_price" => null
        "postal_box" => null
        "fias_id" => "abc31736-35c1-4443-a061-b67c183b590a"
        "fias_code" => "77000000000000028360005"
        "fias_level" => "8"
        "fias_actuality_state" => "0"
        "kladr_id" => "7700000000028360005"
        "geoname_id" => "524894"
        "capital_marker" => "0"
        "okato" => "45280583000"
        "oktmo" => "45362000"
        "tax_office" => "7715"
        "tax_office_legal" => "7715"
        "timezone" => null
        "geo_lat" => "55.878212"
        "geo_lon" => "37.652016"
        "beltway_hit" => null
        "beltway_distance" => null
        "metro" => null
        "qc_geo" => "0"
        "qc_complete" => null
        "qc_house" => null
        "history_values" => null
        "unparsed_parts" => null
        "source" => null
        "qc" => null
      ]
    ]
  ]
]

```

Описание ответа

|       **Название**        |                       **Описание**                                                                            |
|:--------------------------|:--------------------------------------------------------------------------------------------------------------|
| `value`                   | Адрес одной строкой (как показывается в списке подсказок)                                                     |
| `unrestricted_value`      | Адрес одной строкой (полный, с индексом)                                                                      |
| `data`                    | Вложенный массив данных аналагичный структуре выдачи метода `DaDataAddress::standardization(string $address)` |

**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ                                                              |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `413`                | Слишком большая длина запроса или слишком много условий                                     |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

Пример получения сообщения исключения

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataAddress;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData geolocate example
    *
    * @return void
    */
    public function geolocateExample() : void
    {
        try {
            $dadata = DaDataAddress::geolocate('55.878', '37.653', 2);

            dd($dadata);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

}

```

### Определение адреса по IP
`DaDataAddress::iplocate(string $ip, int $count, int $language)` определяет город по IP адресу.

Основные кейсы:
- Поддерживает как IPv4, так и IPv6 адреса
- Возвращает детальную информацию о городе, в том числе почтовый индекс.
- "Я тебя по айпи вычислю!"
                                                                                                  
Параметры вызова

| **Название**      | **Тип**     | **Optional** | **Default value** |  **Описание**                               |
|:------------------|:-----------:|:------------:|:-----------------:|:--------------------------------------------|
| `ip`              | `string`    | `false`      |                   | IPv4 или IPv6                               |
| `count`           | `int`       | `true`       | 10                | Количество результатов (максимум — 20)      |
| `language`        | `int`       | `true`       | 1                 | Язык ответа. Он может быть **русский** значение `language = 1` или **английским**, значение `language = 2`. Мы призываем использовать константы `Language::RU` или `Language::EN` | 

Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataAddress;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData iplocate example
    *
    * @return void
    */
    public function iplocateExample() : void
    {
        $dadata = DaDataAddress::iplocate('46.226.227.20', 2);

        dd($dadata);    
    }

}

```

Пример ответа

```php
array:1 [
  "location" => array:3 [
    "value" => "г Краснодар"
    "unrestricted_value" => "350000, Краснодарский край, г Краснодар"
    "data" => array:81 [
      "postal_code" => "350000"
      "country" => "Россия"
      "country_iso_code" => "RU"
      "federal_district" => "Южный"
      "region_fias_id" => "d00e1013-16bd-4c09-b3d5-3cb09fc54bd8"
      "region_kladr_id" => "2300000000000"
      "region_iso_code" => "RU-KDA"
      "region_with_type" => "Краснодарский край"
      "region_type" => "край"
      "region_type_full" => "край"
      "region" => "Краснодарский"
      "area_fias_id" => null
      "area_kladr_id" => null
      "area_with_type" => null
      "area_type" => null
      "area_type_full" => null
      "area" => null
      "city_fias_id" => "7dfa745e-aa19-4688-b121-b655c11e482f"
      "city_kladr_id" => "2300000100000"
      "city_with_type" => "г Краснодар"
      "city_type" => "г"
      "city_type_full" => "город"
      "city" => "Краснодар"
      "city_area" => null
      "city_district_fias_id" => null
      "city_district_kladr_id" => null
      "city_district_with_type" => null
      "city_district_type" => null
      "city_district_type_full" => null
      "city_district" => null
      "settlement_fias_id" => null
      "settlement_kladr_id" => null
      "settlement_with_type" => null
      "settlement_type" => null
      "settlement_type_full" => null
      "settlement" => null
      "street_fias_id" => null
      "street_kladr_id" => null
      "street_with_type" => null
      "street_type" => null
      "street_type_full" => null
      "street" => null
      "house_fias_id" => null
      "house_kladr_id" => null
      "house_type" => null
      "house_type_full" => null
      "house" => null
      "block_type" => null
      "block_type_full" => null
      "block" => null
      "flat_type" => null
      "flat_type_full" => null
      "flat" => null
      "flat_area" => null
      "square_meter_price" => null
      "flat_price" => null
      "postal_box" => null
      "fias_id" => "7dfa745e-aa19-4688-b121-b655c11e482f"
      "fias_code" => "23000001000000000000000"
      "fias_level" => "4"
      "fias_actuality_state" => "0"
      "kladr_id" => "2300000100000"
      "geoname_id" => "542420"
      "capital_marker" => "2"
      "okato" => "03401000000"
      "oktmo" => "03701000001"
      "tax_office" => "2300"
      "tax_office_legal" => "2300"
      "timezone" => null
      "geo_lat" => "45.0401604"
      "geo_lon" => "38.9759647"
      "beltway_hit" => null
      "beltway_distance" => null
      "metro" => null
      "qc_geo" => "4"
      "qc_complete" => null
      "qc_house" => null
      "history_values" => null
      "unparsed_parts" => null
      "source" => null
      "qc" => null
    ]
  ]
]

```

Описание ответа

|       **Название**        |                       **Описание**                                                                            |
|:--------------------------|:--------------------------------------------------------------------------------------------------------------|
| `value`                   | Адрес одной строкой (как показывается в списке подсказок)                                                     |
| `unrestricted_value`      | Адрес одной строкой (полный, с индексом)                                                                      |
| `data`                    | Вложенный массив данных аналагичный структуре выдачи метода `DaDataAddress::standardization(string $address)` |

**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ                                                              |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `413`                | Слишком большая длина запроса или слишком много условий                                     |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

Пример получения сообщения исключения

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataAddress;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData geolocate example
    *
    * @return void
    */
    public function geolocateExample() : void
    {
        try {
            $dadata = DaDataAddress::iplocate('46.226.227.20', 2);

            dd($dadata);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

}

```

### Определение адреса по КЛАДР или ФИАС коду
`DaDataAddress::id(string $ip, int $count, int $language)` определяет адреса по КЛАДР или ФИАС коду.

Основные кейсы:
- Поиск по КЛАДР-код, только для России;
- ФИАС-код, только для России;
- Идентификатор OpenStreetMap, только для Белоруссии;
- Идентификатор GeoNames, для всех остальных стран.
                                                                                                  
Параметры вызова

| **Название**      | **Тип**     | **Optional** | **Default value** |  **Описание**                               |
|:------------------|:-----------:|:------------:|:-----------------:|:--------------------------------------------|
| `id`              | `string`    | `false`      |                   | Текст запроса                               |
| `count`           | `int`       | `true`       | 10                | Количество результатов (максимум — 20)      |
| `language`        | `int`       | `true`       | 1                 | Язык ответа. Он может быть **русский** значение `language = 1` или **английским**, значение `language = 2`. Мы призываем использовать константы `Language::RU` или `Language::EN` | 

Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Enums\Language;
use MoveMoveIo\DaData\Facades\DaDataAddress;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData ID example
    *
    * @return void
    */
    public function idExample() : void
    {
        $dadata = DaDataAddress::id('9120b43f-2fae-4838-a144-85e43c2bfb29', 2, Language::RU);

        dd($dadata);    
    }

}

```

Пример ответа

```php
array:1 [
  "suggestions" => array:1 [
    0 => array:3 [
      "value" => "г Москва, ул Снежная"
      "unrestricted_value" => "129323, г Москва, р-н Свиблово, ул Снежная"
      "data" => array:81 [
        "postal_code" => "129323"
        "country" => "Россия"
        "country_iso_code" => "RU"
        "federal_district" => "Центральный"
        "region_fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5"
        "region_kladr_id" => "7700000000000"
        "region_iso_code" => "RU-MOW"
        "region_with_type" => "г Москва"
        "region_type" => "г"
        "region_type_full" => "город"
        "region" => "Москва"
        "area_fias_id" => null
        "area_kladr_id" => null
        "area_with_type" => null
        "area_type" => null
        "area_type_full" => null
        "area" => null
        "city_fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5"
        "city_kladr_id" => "7700000000000"
        "city_with_type" => "г Москва"
        "city_type" => "г"
        "city_type_full" => "город"
        "city" => "Москва"
        "city_area" => "Северо-восточный"
        "city_district_fias_id" => null
        "city_district_kladr_id" => null
        "city_district_with_type" => "р-н Свиблово"
        "city_district_type" => "р-н"
        "city_district_type_full" => "район"
        "city_district" => "Свиблово"
        "settlement_fias_id" => null
        "settlement_kladr_id" => null
        "settlement_with_type" => null
        "settlement_type" => null
        "settlement_type_full" => null
        "settlement" => null
        "street_fias_id" => "9120b43f-2fae-4838-a144-85e43c2bfb29"
        "street_kladr_id" => "77000000000268400"
        "street_with_type" => "ул Снежная"
        "street_type" => "ул"
        "street_type_full" => "улица"
        "street" => "Снежная"
        "house_fias_id" => null
        "house_kladr_id" => null
        "house_type" => null
        "house_type_full" => null
        "house" => null
        "block_type" => null
        "block_type_full" => null
        "block" => null
        "flat_type" => null
        "flat_type_full" => null
        "flat" => null
        "flat_area" => null
        "square_meter_price" => null
        "flat_price" => null
        "postal_box" => null
        "fias_id" => "9120b43f-2fae-4838-a144-85e43c2bfb29"
        "fias_code" => "77000000000000026840000"
        "fias_level" => "7"
        "fias_actuality_state" => "0"
        "kladr_id" => "77000000000268400"
        "geoname_id" => "524901"
        "capital_marker" => "0"
        "okato" => "45280580000"
        "oktmo" => "45361000"
        "tax_office" => "7716"
        "tax_office_legal" => "7716"
        "timezone" => null
        "geo_lat" => "55.8523466"
        "geo_lon" => "37.6469376"
        "beltway_hit" => null
        "beltway_distance" => null
        "metro" => null
        "qc_geo" => "2"
        "qc_complete" => null
        "qc_house" => null
        "history_values" => null
        "unparsed_parts" => null
        "source" => null
        "qc" => null
      ]
    ]
  ]
]


```

Описание ответа

|       **Название**        |                       **Описание**                                                                            |
|:--------------------------|:--------------------------------------------------------------------------------------------------------------|
| `value`                   | Адрес одной строкой (как показывается в списке подсказок)                                                     |
| `unrestricted_value`      | Адрес одной строкой (полный, с индексом)                                                                      |
| `data`                    | Вложенный массив данных аналагичный структуре выдачи метода `DaDataAddress::standardization(string $address)` |

**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ                                                              |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `413`                | Слишком большая длина запроса или слишком много условий                                     |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

Пример получения сообщения исключения

```php
<?php

namespace App;

use MoveMoveIo\DaData\Enums\Language;
use MoveMoveIo\DaData\Facades\DaDataAddress;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData geolocate example
    *
    * @return void
    */
    public function geolocateExample() : void
    {
        try {
            $dadata = DaDataAddress::id('9120b43f-2fae-4838-a144-85e43c2bfb29', 2, Language::RU);

            dd($dadata);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

}

```

### Определение ближайшего отделения Почты России по адресу
`DaDataAddress::postalUnitByAddress(string $address, int $count, int $language)` определяет ближайшее почтовые отделения по адресу

Если интернет-магазин доставляет покупки почтой по России, хорошо бы подсказать человеку, где и когда он может забрать посылку. В этом поможет справочник почтовых отделений — в нём есть точный адрес, координаты и часы работы отделения, а ещё отметка, если оно временно закрыто.
                                                                                                  
Параметры вызова

| **Название**      | **Тип**     | **Optional** | **Default value** |  **Описание**                               |
|:------------------|:-----------:|:------------:|:-----------------:|:--------------------------------------------|
| `address`         | `string`    | `false`      |                   | Адресс                                      |
| `count`           | `int`       | `true`       | 10                | Количество результатов (максимум — 20)      |
| `language`        | `int`       | `true`       | 1                 | Язык ответа. Он может быть **русский** значение `language = 1` или **английским**, значение `language = 2`. Мы призываем использовать константы `Language::RU` или `Language::EN` | 

Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Enums\Language;
use MoveMoveIo\DaData\Facades\DaDataAddress;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData fine postal unit by address example
    *
    * @return void
    */
    public function postalUnitByAddressExample() : void
    {
        $dadata = DaDataAddress::postalUnitByAddress('дежнева 2а', 2, Language::RU);

        dd($dadata);    
    }

}

```

Пример ответа

```php
array:1 [
  "suggestions" => array:1 [
    0 => array:3 [
      "value" => "127642"
      "unrestricted_value" => "г Москва, проезд Дежнёва, д 2А"
      "data" => array:15 [
        "postal_code" => "127642"
        "is_closed" => false
        "type_code" => "ГОПС"
        "address_str" => "г Москва, проезд Дежнёва, д 2А"
        "address_kladr_id" => "7700000000000"
        "address_qc" => "0"
        "geo_lat" => 55.872127
        "geo_lon" => 37.651223
        "schedule_mon" => "08:00-20:00"
        "schedule_tue" => "08:00-20:00"
        "schedule_wed" => "08:00-20:00"
        "schedule_thu" => "08:00-20:00"
        "schedule_fri" => "08:00-20:00"
        "schedule_sat" => "09:00-18:00"
        "schedule_sun" => "09:00-18:00"
      ]
    ]
  ]
]


```

Описание ответа

|       **Название**        |                       **Описание**                                                                            |
|:--------------------------|:--------------------------------------------------------------------------------------------------------------|
| `value`                   | Адрес одной строкой (как показывается в списке подсказок)                                                     |
| `unrestricted_value`      | Адрес одной строкой (полный, с индексом)                                                                      |
| `data`                    | Вложенный массив рассмотренный ниже                                                                           |

Описание вложенного массива `data`

|       **Название**        |                       **Описание**                                                                            |
|:--------------------------|:--------------------------------------------------------------------------------------------------------------|
| `value`                   | Адрес одной строкой (как показывается в списке подсказок)                                                     |
| `postal_code`             | Индекс                                                                                                        |
| `is_closed`               | `true`, если отделение закрыто, иначе `false`                                                                 |
| `type_code`               | Тип отделения                                                                                                 |
| `address_str`             | Адрес одной строкой                                                                                           |
| `address_kladr_id`        | КЛАДР-код населённого пункта                                                                                  |
| `address_qc`              | Код проверки адреса                                                                                           |
| `geo_lat`                 | Широта                                                                                                        |
| `geo_lon`                 | Долгота                                                                                                       |
| `schedule_mon`            | Режим работы в понедельник                                                                                    |
| `schedule_tue`            | Режим работы во вторник                                                                                       |
| `schedule_wed`            | Режим работы в среду                                                                                          |
| `schedule_thu`            | Режим работы в четверг                                                                                        |
| `schedule_fri`            | Режим работы в пятницу                                                                                        |
| `schedule_sat`            | Режим работы в субботу                                                                                        |
| `schedule_sun`            | Режим работы в воскресенье                                                                                    |


**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ                                                              |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `413`                | Слишком большая длина запроса или слишком много условий                                     |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

### Определение отделения Почты России почтовому индексу
`DaDataAddress::postalUnitById(int $code, int $count, int $language)` определяет адреса почтовых отделений почтовому коду
                                                                                                  
Параметры вызова

| **Название**      | **Тип**     | **Optional** | **Default value** |  **Описание**                               |
|:------------------|:-----------:|:------------:|:-----------------:|:--------------------------------------------|
| `code`            | `int`       | `false`      |                   | Индекс                                      |
| `count`           | `int`       | `true`       | 10                | Количество результатов (максимум — 20)      |
| `language`        | `int`       | `true`       | 1                 | Язык ответа. Он может быть **русский** значение `language = 1` или **английским**, значение `language = 2`. Мы призываем использовать константы `Language::RU` или `Language::EN` | 

Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Enums\Language;
use MoveMoveIo\DaData\Facades\DaDataAddress;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData fine postal unit by zip example
    *
    * @return void
    */
    public function postalUnitByIdExample() : void
    {
        $dadata = DaDataAddress::postalUnitById(127642, 2, Language::RU);

        dd($dadata);    
    }

}

```

Пример ответа

```php
array:1 [
  "suggestions" => array:1 [
    0 => array:3 [
      "value" => "127642"
      "unrestricted_value" => "г Москва, проезд Дежнёва, д 2А"
      "data" => array:15 [
        "postal_code" => "127642"
        "is_closed" => false
        "type_code" => "ГОПС"
        "address_str" => "г Москва, проезд Дежнёва, д 2А"
        "address_kladr_id" => "7700000000000"
        "address_qc" => "0"
        "geo_lat" => 55.872127
        "geo_lon" => 37.651223
        "schedule_mon" => "08:00-20:00"
        "schedule_tue" => "08:00-20:00"
        "schedule_wed" => "08:00-20:00"
        "schedule_thu" => "08:00-20:00"
        "schedule_fri" => "08:00-20:00"
        "schedule_sat" => "09:00-18:00"
        "schedule_sun" => "09:00-18:00"
      ]
    ]
  ]
]


```

Описание ответа

|       **Название**        |                       **Описание**                                                                            |
|:--------------------------|:--------------------------------------------------------------------------------------------------------------|
| `value`                   | Адрес одной строкой (как показывается в списке подсказок)                                                     |
| `unrestricted_value`      | Адрес одной строкой (полный, с индексом)                                                                      |
| `data`                    | Вложенный массив рассмотренный ниже                                                                           |

Описание вложенного массива `data`

|       **Название**        |                       **Описание**                                                                            |
|:--------------------------|:--------------------------------------------------------------------------------------------------------------|
| `value`                   | Адрес одной строкой (как показывается в списке подсказок)                                                     |
| `postal_code`             | Индекс                                                                                                        |
| `is_closed`               | `true`, если отделение закрыто, иначе `false`                                                                 |
| `type_code`               | Тип отделения                                                                                                 |
| `address_str`             | Адрес одной строкой                                                                                           |
| `address_kladr_id`        | КЛАДР-код населённого пункта                                                                                  |
| `address_qc`              | Код проверки адреса                                                                                           |
| `geo_lat`                 | Широта                                                                                                        |
| `geo_lon`                 | Долгота                                                                                                       |
| `schedule_mon`            | Режим работы в понедельник                                                                                    |
| `schedule_tue`            | Режим работы во вторник                                                                                       |
| `schedule_wed`            | Режим работы в среду                                                                                          |
| `schedule_thu`            | Режим работы в четверг                                                                                        |
| `schedule_fri`            | Режим работы в пятницу                                                                                        |
| `schedule_sat`            | Режим работы в субботу                                                                                        |
| `schedule_sun`            | Режим работы в воскресенье                                                                                    |


**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ                                                              |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `413`                | Слишком большая длина запроса или слишком много условий                                     |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

### Определение отделения Почты России по координатам
`DaDataAddress::postalUnitByGeoLocate(float $lat, float $lon, int $radius_meters, int $count, int $language)` определяет адреса почтовых отделений по координатам
                                                                                                  
Параметры вызова

| **Название**      | **Тип**     | **Optional** | **Default value** |  **Описание**                               |
|:------------------|:-----------:|:------------:|:-----------------:|:--------------------------------------------|
| `lat`             | `int`       | `false`      |                   | Широта                                      |
| `lon`             | `int`       | `false`      |                   | Долгота                                     |
| `radius_meters`   | `int`       | `false`      | 1000              | Радиус поиска в метрах. Максимум 1000       |
| `count`           | `int`       | `true`       | 10                | Количество результатов (максимум — 20)      |
| `language`        | `int`       | `true`       | 1                 | Язык ответа. Он может быть **русский** значение `language = 1` или **английским**, значение `language = 2`. Мы призываем использовать константы `Language::RU` или `Language::EN` | 

Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Enums\Language;
use MoveMoveIo\DaData\Facades\DaDataAddress;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData fine postal unit by GEO
    *
    * @return void
    */
    public function postalUnitByGeoLocateExample() : void
    {
        $dadata = DaDataAddress::postalUnitByGeoLocate('55.878', '37.653', 1000, 2, Language::RU);

        dd($dadata);    
    }

}

```

Пример ответа

```php
array:1 [
  "suggestions" => array:2 [
    0 => array:3 [
      "value" => "127642"
      "unrestricted_value" => "г Москва, проезд Дежнёва, д 2А"
      "data" => array:15 [
        "postal_code" => "127642"
        "is_closed" => false
        "type_code" => "ГОПС"
        "address_str" => "г Москва, проезд Дежнёва, д 2А"
        "address_kladr_id" => "7700000000000"
        "address_qc" => "0"
        "geo_lat" => 55.872127
        "geo_lon" => 37.651223
        "schedule_mon" => "08:00-20:00"
        "schedule_tue" => "08:00-20:00"
        "schedule_wed" => "08:00-20:00"
        "schedule_thu" => "08:00-20:00"
        "schedule_fri" => "08:00-20:00"
        "schedule_sat" => "09:00-18:00"
        "schedule_sun" => "09:00-18:00"
      ]
    ]
    1 => array:3 [
      "value" => "127221"
      "unrestricted_value" => "г Москва, ул Полярная, д 16 к 1"
      "data" => array:15 [
        "postal_code" => "127221"
        "is_closed" => false
        "type_code" => "ГОПС"
        "address_str" => "г Москва, ул Полярная, д 16 к 1"
        "address_kladr_id" => "7700000000000"
        "address_qc" => "0"
        "geo_lat" => 55.876607
        "geo_lon" => 37.637308
        "schedule_mon" => "08:00-20:00"
        "schedule_tue" => "08:00-20:00"
        "schedule_wed" => "08:00-20:00"
        "schedule_thu" => "08:00-20:00"
        "schedule_fri" => "08:00-20:00"
        "schedule_sat" => "09:00-18:00"
        "schedule_sun" => "09:00-18:00"
      ]
    ]
  ]
]

```

Описание ответа

|       **Название**        |                       **Описание**                                                                            |
|:--------------------------|:--------------------------------------------------------------------------------------------------------------|
| `value`                   | Адрес одной строкой (как показывается в списке подсказок)                                                     |
| `unrestricted_value`      | Адрес одной строкой (полный, с индексом)                                                                      |
| `data`                    | Вложенный массив рассмотренный ниже                                                                           |

Описание вложенного массива `data`

|       **Название**        |                       **Описание**                                                                            |
|:--------------------------|:--------------------------------------------------------------------------------------------------------------|
| `value`                   | Адрес одной строкой (как показывается в списке подсказок)                                                     |
| `postal_code`             | Индекс                                                                                                        |
| `is_closed`               | `true`, если отделение закрыто, иначе `false`                                                                 |
| `type_code`               | Тип отделения                                                                                                 |
| `address_str`             | Адрес одной строкой                                                                                           |
| `address_kladr_id`        | КЛАДР-код населённого пункта                                                                                  |
| `address_qc`              | Код проверки адреса                                                                                           |
| `geo_lat`                 | Широта                                                                                                        |
| `geo_lon`                 | Долгота                                                                                                       |
| `schedule_mon`            | Режим работы в понедельник                                                                                    |
| `schedule_tue`            | Режим работы во вторник                                                                                       |
| `schedule_wed`            | Режим работы в среду                                                                                          |
| `schedule_thu`            | Режим работы в четверг                                                                                        |
| `schedule_fri`            | Режим работы в пятницу                                                                                        |
| `schedule_sat`            | Режим работы в субботу                                                                                        |
| `schedule_sun`            | Режим работы в воскресенье                                                                                    |


**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ                                                              |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `413`                | Слишком большая длина запроса или слишком много условий                                     |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

### Определение идентификатора города в СДЭК, Boxberry и DPD
`DaDataAddress::delivery(string $code)` помогает решить сзадачу определения идентификатора города в СДЭК, Boxberry и DPD

Службы доставки часто используют собственные идентификаторы городов, и требуют от магазина указывать их в заказе.

Метод `DaDataAddress::delivery(string $code)` определяет идентификатор города в службе доставке на основании КЛАДР-кода города. 
                                                                                                  
Параметры вызова

| **Название**      | **Тип**     | **Optional** | **Default value** |  **Описание**                               |
|:------------------|:-----------:|:------------:|:-----------------:|:--------------------------------------------|
| `code`            | `string`    | `false`      |                   | Код                                         |

Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataAddress;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData define city code by delivery code
    *
    * @return void
    */
    public function deliveryExample() : void
    {
        $dadata = DaDataAddress::delivery('3100400100000');

        dd($dadata);    
    }

}

```

Пример ответа

```php
array:1 [
  "suggestions" => array:1 [
    0 => array:3 [
      "value" => "3100400100000"
      "unrestricted_value" => "fe7eea4a-875a-4235-aa61-81c2a37a0440"
      "data" => array:5 [
        "kladr_id" => "3100400100000"
        "fias_id" => "fe7eea4a-875a-4235-aa61-81c2a37a0440"
        "boxberry_id" => "01929"
        "cdek_id" => "344"
        "dpd_id" => "196006461"
      ]
    ]
  ]
]

```

Описание ответа

|       **Название**        |                       **Описание**                                                                            |
|:--------------------------|:--------------------------------------------------------------------------------------------------------------|
| `value`                   | Адрес одной строкой (как показывается в списке подсказок)                                                     |
| `unrestricted_value`      | Адрес одной строкой (полный, с индексом)                                                                      |
| `data`                    | Вложенный массив рассмотренный ниже                                                                           |

Описание вложенного массива `data`

|       **Название**        |                       **Описание**                                                                            |
|:--------------------------|:--------------------------------------------------------------------------------------------------------------|
| `kladr_id`                | КЛАДР-код города                                                                                              |
| `fias_id`                 | ФИАС-код города                                                                                               |
| `boxberry_id`             | Идентификатор города по справочнику Boxberry                                                                  |
| `cdek_id`                 | Идентификатор города по справочнику СДЭК                                                                      |
| `dpd_id`                  | Идентификатор города по справочнику DPD                                                                       |

**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ                                                              |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `413`                | Слишком большая длина запроса или слишком много условий                                     |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

### Адрес в ФИАС по идентификатору
`DaDataAddress::fias(string $code)` Находит адрес в справочнике ФИАС по коду КЛАДР или ФИАС.

ФИАС-коды домов иногда меняются, а метод ищет только по актуальным кодам. Поэтому рекомендуем помимо ФИАС-кода дома сохранять адрес одной строкой — иначе не получится восстановить адрес, когда ФИАС-код изменится.

По КЛАДР-коду метод ищет только до улицы, потому что в ФИАС нет КЛАДР-кодов домов.


Параметры вызова

| **Название**      | **Тип**  | **Optional** | **Default value** |  **Описание**                               |
|:------------------|:--------:|:------------:|:-----------------:|:--------------------------------------------|
| `code`            | `string` | `false`      |                   | ФИАС код                                    |

Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataAddress;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData get city by FIAS code
    *
    * @return void
    */
    public function fiasExample() : void
    {
        $dadata = DaDataAddress::fias('9120b43f-2fae-4838-a144-85e43c2bfb29');

        dd($dadata);    
    }

}

```

Пример ответа

```php
array:1 [
  "suggestions" => array:1 [
    0 => array:3 [
      "value" => "г Москва, ул Снежная"
      "unrestricted_value" => "129323, г Москва, ул Снежная"
      "data" => array:64 [
        "postal_code" => "129323"
        "region_fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5"
        "region_kladr_id" => "7700000000000"
        "region_with_type" => "г Москва"
        "region_type" => "г"
        "region_type_full" => "город"
        "region" => "Москва"
        "area_fias_id" => null
        "area_kladr_id" => null
        "area_with_type" => null
        "area_type" => null
        "area_type_full" => null
        "area" => null
        "city_fias_id" => null
        "city_kladr_id" => null
        "city_with_type" => null
        "city_type" => null
        "city_type_full" => null
        "city" => null
        "city_district_fias_id" => null
        "city_district_kladr_id" => null
        "city_district_with_type" => null
        "city_district_type" => null
        "city_district_type_full" => null
        "city_district" => null
        "settlement_fias_id" => null
        "settlement_kladr_id" => null
        "settlement_with_type" => null
        "settlement_type" => null
        "settlement_type_full" => null
        "settlement" => null
        "planning_structure_fias_id" => null
        "planning_structure_kladr_id" => null
        "planning_structure_with_type" => null
        "planning_structure_type" => null
        "planning_structure_type_full" => null
        "planning_structure" => null
        "street_fias_id" => "9120b43f-2fae-4838-a144-85e43c2bfb29"
        "street_kladr_id" => "77000000000268400"
        "street_with_type" => "ул Снежная"
        "street_type" => "ул"
        "street_type_full" => "улица"
        "street" => "Снежная"
        "house_fias_id" => null
        "house_kladr_id" => null
        "house_type" => null
        "house" => null
        "block" => null
        "building_type" => null
        "building" => null
        "fias_id" => "9120b43f-2fae-4838-a144-85e43c2bfb29"
        "fias_code" => "7700000000000002684"
        "fias_level" => "7"
        "fias_actuality_state" => "0"
        "kladr_id" => "77000000000268400"
        "capital_marker" => "0"
        "okato" => "45280580000"
        "oktmo" => "45361000"
        "cadastral_number" => null
        "tax_office" => "7716"
        "tax_office_legal" => "7716"
        "history_values" => null
        "source" => null
        "qc" => null
      ]
    ]
  ]
]


```

Описание ответа

|       **Название**        |                       **Описание**                                                                            |
|:--------------------------|:--------------------------------------------------------------------------------------------------------------|
| `value`                   | Адрес одной строкой (как показывается в списке подсказок)                                                     |
| `unrestricted_value`      | Адрес одной строкой (полный, с индексом)                                                                      |
| `data`                    | Вложенный массив данных аналагичный структуре выдачи метода `DaDataAddress::standardization(string $address)` |

**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ                                                              |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `413`                | Слишком большая длина запроса или слишком много условий                                     |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

Пример получения сообщения исключения

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataAddress;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData define city by FIAS code
    *
    * @return void
    */
    public function fiasExample() : void
    {
        try {
            $dadata = DaDataAddress::fias('9120b43f-2fae-4838-a144-85e43c2bfb29');

            dd($dadata);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

}

```

## Работа с именами
### ФИО
`DaDataName::fias(string $name)` Разбивает ФИО из строки по отдельным полям (фамилия, имя, отчество). Определяет пол и склоняет по падежам.

Основные кейсы
- Исправляет опечатки и транслитерирует.
- Проставляет пол.
- Склоняет по падежам (кого? кому? кем?).

Параметры вызова

| **Название**      | **Тип**  | **Optional** | **Default value** |  **Описание**                               |
|:------------------|:--------:|:------------:|:-----------------:|:--------------------------------------------|
| `name`            | `string` | `false`      |                   | ФИО                                         |

Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataName;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData name standardization
    *
    * @return void
    */
    public function nameExample() : void
    {
        $dadata = DaDataName::standardization('Срегей владимерович иванов');

        dd($dadata);    
    }

}

```

Пример ответа

```php
array:1 [
  0 => array:10 [
    "source" => "Срегей владимерович иванов"
    "result" => "Иванов Сергей Владимирович"
    "result_genitive" => "Иванова Сергея Владимировича"
    "result_dative" => "Иванову Сергею Владимировичу"
    "result_ablative" => "Ивановым Сергеем Владимировичем"
    "surname" => "Иванов"
    "name" => "Сергей"
    "patronymic" => "Владимирович"
    "gender" => "М"
    "qc" => 1
  ]
]

```

Описание ответа

|       **Название**        |                       **Описание**                                                                            |
|:--------------------------|:--------------------------------------------------------------------------------------------------------------|
| `source`                  | Исходное ФИО одной строкой                                                                                    |
| `result`                  | Стандартизованное ФИО одной строкой                                                                           |
| `result_genitive`         | ФИО в родительном падеже (кого?)                                                                              |
| `result_dative`           | ФИО в дательном падеже (кому?)                                                                                |
| `result_ablative`         | ФИО в творительном падеже (кем?)                                                                              |
| `surname`                 | Фамилия                                                                                                       |
| `name`                    | Имя                                                                                                           |
| `patronymic`              | Отчество                                                                                                      |
| `gender`                  | Пол. `М` - мужской (male), `Ж` - женский (female), `НД` - не удалось однозначно определить                    | 
| `qc`                      | Код проверки. Таблица кодов проверка ниже                                                                     |

Коды проверки (параметр ответа `qc`)

| `qc`  | **Нужна ручная проверка?** |              **Описание**                                                                            |
|:-----:|:---------------------------|:-----------------------------------------------------------------------------------------------------|
| **0** | нет                        | Исходное значение распознано уверенно                                                                |
| **2** | нет                        | Исходное значение пустое или заведомо «мусорное»                                                     |
| **1** | да                         | Исходное значение распознано с допущениями или не распознано                                         |

**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ                                                              |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `413`                | Слишком большая длина запроса или слишком много условий                                     |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

Пример получения сообщения исключения

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataName;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData define city by FIAS code
    *
    * @return void
    */
    public function nameExample() : void
    {
        try {
            $dadata = DaDataName::standardization('Срегей владимерович иванов');

            dd($dadata);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

}

```

### Автодополнение при вводе («подсказки»)
`DaDataName::prompt(string $name, int $count, int $gender, array $parts)` Помогает человеку быстро ввести ФИО на веб-форме или в приложении.

Основные кейсы
- Подсказывает ФИО одной строкой или отдельно фамилию, имя, отчество.
- Исправляет клавиатурную раскладку («fynjy» → «Антон»).
- Определяет пол.

Метод не предназначен для выполнения следующих задач
- Автоматически (без участия человека) обработать ФИО из базы или файла.
- Транслитерировать (Juliia Somova → Юлия Сомова).
- Склонять по падежам (кого? кому? кем?).

Подсказки не подходят для автоматической обработки ФИО. Они предлагают варианты, но не гарантируют, что угадали правильно. Поэтому окончательное решение всегда должен принимать человек.

Для автоматической обработки, транслитерации и склонения по падежам используйте `DaDataName::fias(string $name)` метод [ФИО](https://github.com/movemoveapp/laravel-dadata#%D1%84%D0%B8%D0%BE), описание которого вы найдете выше. 

Параметры вызова

| **Название**      | **Тип**   | **Optional** | **Default value** |  **Описание**                               |
|:------------------|:---------:|:------------:|:-----------------:|:--------------------------------------------|
| `query`           | `string`  | `false`      |                   | Текст запроса                               |
| `count`           | `int`     | `true`       | 10                | Количество результатов. Максимум 20         |
| `gender`          | `int`     | `true`       | 0                 | Пол. Для управления пола, мы советуем использовать константы класса `Gender`, Неизвестный пол `Gender::UNKNOWN`, `Gender::MALE` - мужской, `Gender::FEMALE` - женский |
| `parts`           | `array`   | `true`       | []                | Подсказки по фасти ФИО                      |

Формирования массива подсказок по фасти ФИО `parts`
Для формирования, воспользуйтесь набором констант классаа `Parts`. 

Только имена:

```php
use MoveMoveIo\DaData\Enums\Gender;
use MoveMoveIo\DaData\Enums\Parts;
...
$data = DaDataName::prompt('Викто', 2, Gender::UNKNOWN, [Parts::NAME]);
```

Имена и отчества:

```php
use MoveMoveIo\DaData\Enums\Gender;
use MoveMoveIo\DaData\Enums\Parts;
...
$data = DaDataName::prompt('Викто', 2, Gender::UNKNOWN, [Parts::NAME, Parts::PATRONYMIC);
```

Имена и фамилии:

```php
use MoveMoveIo\DaData\Enums\Gender;
use MoveMoveIo\DaData\Enums\Parts;
...
$data = DaDataName::prompt('Викто', 2, Gender::UNKNOWN, [Parts::NAME, Parts::SURNAME]);
```
 

Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Enums\Gender;
use MoveMoveIo\DaData\Enums\Parts;
use MoveMoveIo\DaData\Facades\DaDataName;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData name prompt
    *
    * @return void
    */
    public function nameExample() : void
    {
        $dadata = DaDataName::prompt('Викто', 2, Gender::UNKNOWN, [Parts::NAME]);

        dd($dadata);    
    }

}

```

Пример ответа

```php
array:1 [
  "suggestions" => array:2 [
    0 => array:3 [
      "value" => "Виктор"
      "unrestricted_value" => "Виктор"
      "data" => array:6 [
        "surname" => null
        "name" => "Виктор"
        "patronymic" => null
        "gender" => "MALE"
        "source" => null
        "qc" => "0"
      ]
    ]
    1 => array:3 [
      "value" => "Виктория"
      "unrestricted_value" => "Виктория"
      "data" => array:6 [
        "surname" => null
        "name" => "Виктория"
        "patronymic" => null
        "gender" => "FEMALE"
        "source" => null
        "qc" => "0"
      ]
    ]
  ]
]
```

Описание ответа

|       **Название**        |                       **Описание**                                                                            |
|:--------------------------|:--------------------------------------------------------------------------------------------------------------|
| `value`                   | Исходное ФИО одной строкой                                                                                    |
| `unrestricted_value`      | Стандартизованное ФИО одной строкой                                                                           |
| `data['surname']`         | Фамилия                                                                                                       |
| `data['name']`            | Имя                                                                                                           |
| `data['patronymic']`      | Отчество                                                                                                      |
| `data['gender']`          | Пол. `MALE` - мужской (male), `FEMALE` - женский (female), `UNKNOWN` - не удалось однозначно определить       |
| `data['source']`          | Не используется                                                                                               | 
| `date['qc']`              | Код проверки. `0` - все части ФИО известны, `1` - в ФИО есть неизвестная часть                                |

**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ                                                              |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `413`                | Слишком большая длина запроса или слишком много условий                                     |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

Пример получения сообщения исключения

```php
<?php

namespace App;

use MoveMoveIo\DaData\Enums\Gender;
use MoveMoveIo\DaData\Enums\Parts;
use MoveMoveIo\DaData\Facades\DaDataName;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData name prompt
    *
    * @return void
    */
    public function nameExample() : void
    {
        try {
            $dadata = DaDataName::prompt('Викто', 2, Gender::UNKNOWN, [Parts::NAME]);

            dd($dadata);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

}

```

## Работа с электронными (email) адресами
### Email
`DaDataName::email(string $email)` Исправляет опечатки и проверяет на одноразовый адрес. Классифицирует адреса на личные, корпоративные и «ролевые».

Основные кейсы
- Проверяет формат адреса.
- Исправляет распространённые опечатки.
- Проверяет, не «одноразовый» ли адрес.
- Классифицирует адреса на личные (`@mail.ru`, `@yandex.ru`), корпоративные (`@myshop.ru`) и «ролевые» (`info@`, `support@`).

Параметры вызова

| **Название**      | **Тип**  | **Optional** | **Default value** |  **Описание**                               |
|:------------------|:--------:|:------------:|:-----------------:|:--------------------------------------------|
| `email`           | `string` | `false`      |                   | Email                                       |

Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataEmail;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData email
    *
    * @return void
    */
    public function emailExample() : void
    {
        $dadata = DaDataEmail::standardization('serega@yandex/ru');

        dd($dadata);    
    }

}

```

Пример ответа

```php
array:1 [
  0 => array:6 [
    "source" => "serega@yandex/ru"
    "email" => "serega@yandex.ru"
    "local" => "serega"
    "domain" => "yandex.ru"
    "type" => "PERSONAL"
    "qc" => 4
  ]
]


```

Описание ответа

|       **Название**        |                       **Описание**                                                                            |
|:--------------------------|:--------------------------------------------------------------------------------------------------------------|
| `source`                  | Исходный email                                                                                                |
| `email`                   | Стандартизованный email                                                                                       |
| `local`                   | Локальная часть адреса (то, что до `@`)                                                                       |
| `domain`                  | Домен (то, что послу `@`)                                                                                     |
| `type`                    | Тип адреса. `PERSONAL` — личный (@mail.ru, @yandex.ru). `CORPORATE` — корпоративный (@myshop.ru). `ROLE` — «ролевой» (info@, support@). `DISPOSABLE` — одноразовый (@temp-mail.ru) |
| `qc`                      | Код проверки                                                                                                  |

Коды проверки (параметр ответа `qc`)

| `qc`  | **Нужна ручная проверка?** |              **Описание**                                                                              |
|:-----:|:---------------------------|:-------------------------------------------------------------------------------------------------------|
| **0** | нет                        | Корректное значение. Соответствует общепринятым правилам, реальное существование адреса не проверяется |
| **2** | нет                        | Пустое или заведомо «мусорное» значение                                                                |
| **3** | нет                        | «Одноразовый» адрес. Домены 10minutemail.com, getairmail.com, temp-mail.ru и аналогичные               |
| **1** | да                         | Некорректное значение. Не соответствует общепринятым правилам                                          |
| **4** | да                         | Исправлены опечатки                                                                                    |

**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ                                                              |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `413`                | Слишком большая длина запроса или слишком много условий                                     |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

Пример получения сообщения исключения

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataEmail;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

    /**
    * DaData email
    *
    * @return void
    */
    public function nameExample() : void
    {
        try {
            $dadata = DaDataEmail::standardization('serega@yandex/ru');

            dd($dadata);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

}

```

### Подсказки по email
`DaDataEmail::prompt(string $email, int $count)` Помогает человеку быстро ввести адрес электоронной почты на веб-форме или в приложении.

Основные кейсы
- Подсказывает локальную (до «собачки») и доменную (после «собачки») части эл. почты.
- Исправляет опечатки (yadex.ru → yandex.ru).

Метод не предназначен для выполнения следующих задач
- Автоматически (без участия человека) проверить адреса из базы или файла.
- Классифицировать адреса на личные (@mail.ru, @yandex.ru), корпоративные (@myshop.ru) и «ролевые» (info@, support@).
- Склонять по падежам (кого? кому? кем?).

Подсказки не подходят для автоматической обработки email. Они предлагают варианты, но не гарантируют, что угадали правильно. Поэтому окончательное решение всегда должен принимать человек.

Для автоматической обработки и классификации адресов используйте `DaDataName::email(string $email)`

Параметры вызова

| **Название**      | **Тип**   | **Optional** | **Default value** |  **Описание**                               |
|:------------------|:---------:|:------------:|:-----------------:|:--------------------------------------------|
| `email`           | `string`  | `false`      |                   | Текст запроса                               |
| `count`           | `int`     | `true`       | 10                | Количество результатов. Максимум 20         |


Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataEmail;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData name prompt
    *
    * @return void
    */
    public function nameExample() : void
    {
        $dadata = DaDataEmail::prompt('anton@', 2);

        dd($dadata);    
    }

}

```

Пример ответа

```php
array:1 [
  "suggestions" => array:2 [
    0 => array:3 [
      "value" => "anton@mail.ru"
      "unrestricted_value" => "anton@mail.ru"
      "data" => array:5 [
        "local" => "anton"
        "domain" => "mail.ru"
        "type" => null
        "source" => null
        "qc" => null
      ]
    ]
    1 => array:3 [
      "value" => "anton@gmail.com"
      "unrestricted_value" => "anton@gmail.com"
      "data" => array:5 [
        "local" => "anton"
        "domain" => "gmail.com"
        "type" => null
        "source" => null
        "qc" => null
      ]
    ]
  ]
]

```

Описание ответа

|       **Название**        |                       **Описание**                                                                            |
|:--------------------------|:--------------------------------------------------------------------------------------------------------------|
| `value`                   | Email одной строкой                                                                                           |
| `unrestricted_value`      | Равно полю `value`                                                                                            |
| `data['local']`           | Локальная часть адреса (то, что до `@`)                                                                       |
| `data['domain']`          | Домен (то, что послу `@`)                                                                                     |
| `data['type']`            | Зарезервированы для автоматической обработки адресов через `DaDataName::email(string $email)` метод           |
| `data['source']`          | Зарезервированы для автоматической обработки адресов через `DaDataName::email(string $email)` метод           |
| `data['qc']`              | Зарезервированы для автоматической обработки адресов через `DaDataName::email(string $email)` метод           |


**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ                                                              |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `413`                | Слишком большая длина запроса или слишком много условий                                     |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

Пример получения сообщения исключения

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataEmail;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

    /**
    * DaData email prompt
    *
    * @return void
    */
    public function nameExample() : void
    {
        try {
            $dadata = DaDataEmail::prompt('anton@', 2);

            dd($dadata);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

}

```

## Работа с телефонными номерами
### Проверить телефон
`DaDataPhone::standardization(string $phone);` Проверяет телефон по справочнику Россвязи, определяет оператора с учётом переноса номеров, заполняет страну, город и часовой пояс.

Основные кейсы
- Проверяет телефон.
- Проставляет актуальный код города / DEF-код.
- Восстанавливает оператора. Учитывает переносы номера между операторами.
- Определяет страну, регион, город и часовой пояс.

Параметры вызова

| **Название**      | **Тип**   | **Optional** | **Default value** |  **Описание**                               |
|:------------------|:---------:|:------------:|:-----------------:|:--------------------------------------------|
| `phone`           | `string`  | `false`      |                   | Текст запроса                               |



Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataPhone;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData phone exmaple
    *
    * @return void
    */
    public function phoneExample() : void
    {
        $dadata = DaDataPhone::standardization('раб 846)231.60.14 *139');

        dd($dadata);    
    }

}

```

Пример ответа

```php
array:1 [
  0 => array:14 [
    "source" => "раб 846)231.60.14 *139"
    "type" => "Стационарный"
    "phone" => "+7 846 231-60-14 доб. 139"
    "country_code" => "7"
    "city_code" => "846"
    "number" => "2316014"
    "extension" => "139"
    "provider" => "ООО "СИПАУТНЭТ""
    "country" => "Россия"
    "region" => "Самарская область"
    "city" => "Самара"
    "timezone" => "UTC+4"
    "qc_conflict" => 0
    "qc" => 0
  ]
]

```

Описание ответа

|       **Название**        |                       **Описание**                                                                            |
|:--------------------------|:--------------------------------------------------------------------------------------------------------------|
| `source`                  | Строка запроса
| `type`                    | Тип телефона, может возвращать: `Мобильный`, `Стационарный`, `Прямой мобильный`, `Колл-центр`, `Неизвестный`. __Примечание от автора [movemoveapp/laravel-dadata](https://github.com/movemoveapp/laravel-dadata):__ **Ребята из DaData, ну вот как можно типы в таком виде отдавать? Ну можно было кодами их отдавать или `cell`, `phone`, `call-center`?** |           
| `phone`                   | Стандартизованный телефон одной строкой                                                                       |
| `country_code`            | Код страны                                                                                                    |
| `city_code`               | Код города / DEF-код                                                                                          |
| `number`                  | Локальный номер телефона                                                                                      |
| `extension`               | Добавочный номер                                                                                              |
| `provider`                | Оператор связи (только для России)                                                                            |
| `country`                 | Страна                                                                                                        |
| `region`                  | Регион (только для России)                                                                                    |
| `city`                    | Город (только для стационарных телефонов)                                                                     |
| `timezone`                | Часовой пояс города для России, часовой пояс страны — для иностранных телефонов. Если у страны несколько поясов, вернёт минимальный и максимальный через слеш: UTC+5/UTC+6 |
| `qc_conflict`             | Признак конфликта телефона с адресом. `0` - Телефон соответствует адресу, `2` - Города адреса и телефона отличаются, `3` - Регионы адреса и телефона отличаются |
| `qc`                      | Код проверки                                                                                                  |

Коды проверки `qc`
 
| **Код** | **Треубется ручная проверка?**  | **Описание**                                                                                  |
|:-------:|:-------------------------------:|:----------------------------------------------------------------------------------------------|
| `0`     | Нет                             | Российский телефон, распознан уверенно                                                        |
| `7`     | Нет                             | Иностранный телефон, распознан уверенно                                                       |
| `2`     | Нет                             | Телефон пустой или заведомо «мусорный»                                                        |
| `1`     | Да                              | Телефон распознан с допущениями или не распознан                                              |
| `3`     | Да                              | Обнаружено несколько телефонов, распознан первый	                                            |

**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ                                                              |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `413`                | Слишком большая длина запроса или слишком много условий                                     |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

Пример получения сообщения исключения

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataPhone;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

    /**
    * DaData phone exmaple
    *
    * @return void
    */
    public function nameExample() : void
    {
        try {
            $dadata = DaDataPhone::standardization('раб 846)231.60.14 *139');

            dd($dadata);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

}

```


## Работа с компаниями
### Организация по ИНН
`DaDataCompany::id(string $id', int $count, string $kpp, int $branch_type, int $type)` - Находит компанию или индивидуального предпринимателя по ИНН, КПП, ОГРН. Возвращает реквизиты компании, учредителей, руководителей, сведения о налоговой, ПФР и ФСС, финансы, лицензии, реестр МСП и другую информацию о компании.

Находит компанию или ИП по ИНН или ОГРН. Возвращает все доступные сведения о компании, в отличие от метода suggest, который возвращает только базовые поля.

Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Enums\BranchType;
use MoveMoveIo\DaData\Enums\CompanyType;
use MoveMoveIo\DaData\Facades\DaDataCompany;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData find organization by FIAS or OGRN ID example
    *
    * @return void
    */
    public function idExample() : void
    {
        $dadata = DaDataCompany::id('7707083893', 1, null, BranchType::MAIN, CompanyType::LEGAL);

        dd($dadata);    
    }

}

```

Параметры вызова

| **Название**      | **Тип**   | **Optional** | **Default value** |  **Описание**                               |
|:------------------|:---------:|:------------:|:-----------------:|:--------------------------------------------|
| `id`              | `string`  | `false`      |                   | Текст запроса                               |
| `count`           | `int`     | `true`       | 10                | Количество результатов. Максимум 20         |
| `kpp`             | `int`     | `true`       | null              | КПП для поиска по филиалам, см.``           |
| `branch_type`     | `int`     | `true`       | 1                 | Головная организация `BranchType::MAIN` или филиал `BranchType::BRANCH` |
| `type`            | `int`     | `true`       | 1                 | Юрлицо `CompanyType::LEGAL` или индивидуальный предприниматель `CompanyType::INDIVIDUAL` |

Пример ответа

```php
array:1 [
  "suggestions" => array:1 [
    0 => array:3 [
      "value" => "ПАО СБЕРБАНК"
      "unrestricted_value" => "ПАО СБЕРБАНК"
      "data" => array:33 [
        "kpp" => "773601001"
        "capital" => null
        "management" => array:3 [
          "name" => "Греф Герман Оскарович"
          "post" => "ПРЕЗИДЕНТ, ПРЕДСЕДАТЕЛЬ ПРАВЛЕНИЯ"
          "disqualified" => null
        ]
        "founders" => null
        "managers" => null
        "branch_type" => "MAIN"
        "branch_count" => 88
        "source" => null
        "qc" => null
        "hid" => "588a141bc5e17cbc976ec2d0d54149af49d5a4ca16e26ed2effafdf06841d645"
        "type" => "LEGAL"
        "state" => array:4 [
          "status" => "ACTIVE"
          "actuality_date" => 1601942400000
          "registration_date" => 677376000000
          "liquidation_date" => null
        ]
        "opf" => array:4 [
          "type" => "2014"
          "code" => "12247"
          "full" => "Публичное акционерное общество"
          "short" => "ПАО"
        ]
        "name" => array:5 [
          "full_with_opf" => "ПУБЛИЧНОЕ АКЦИОНЕРНОЕ ОБЩЕСТВО "СБЕРБАНК РОССИИ""
          "short_with_opf" => "ПАО СБЕРБАНК"
          "latin" => null
          "full" => "СБЕРБАНК РОССИИ"
          "short" => "СБЕРБАНК"
        ]
        "inn" => "7707083893"
        "ogrn" => "1027700132195"
        "okpo" => "00032537"
        "okato" => "45293554000"
        "oktmo" => "45397000000"
        "okogu" => "4100104"
        "okfs" => "41"
        "okved" => "64.19"
        "okveds" => null
        "authorities" => null
        "documents" => null
        "licenses" => null
        "finance" => null
        "address" => array:3 [
          "value" => "г Москва, ул Вавилова, д 19"
          "unrestricted_value" => "117312, г Москва, Академический р-н, ул Вавилова, д 19"
          "data" => array:81 [
            "postal_code" => "117312"
            "country" => "Россия"
            "country_iso_code" => "RU"
            "federal_district" => "Центральный"
            "region_fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5"
            "region_kladr_id" => "7700000000000"
            "region_iso_code" => "RU-MOW"
            "region_with_type" => "г Москва"
            "region_type" => "г"
            "region_type_full" => "город"
            "region" => "Москва"
            "area_fias_id" => null
            "area_kladr_id" => null
            "area_with_type" => null
            "area_type" => null
            "area_type_full" => null
            "area" => null
            "city_fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5"
            "city_kladr_id" => "7700000000000"
            "city_with_type" => "г Москва"
            "city_type" => "г"
            "city_type_full" => "город"
            "city" => "Москва"
            "city_area" => "Юго-западный"
            "city_district_fias_id" => null
            "city_district_kladr_id" => null
            "city_district_with_type" => "Академический р-н"
            "city_district_type" => "р-н"
            "city_district_type_full" => "район"
            "city_district" => "Академический"
            "settlement_fias_id" => null
            "settlement_kladr_id" => null
            "settlement_with_type" => null
            "settlement_type" => null
            "settlement_type_full" => null
            "settlement" => null
            "street_fias_id" => "25f8f29b-b110-40ab-a48e-9c72f5fb4331"
            "street_kladr_id" => "77000000000092400"
            "street_with_type" => "ул Вавилова"
            "street_type" => "ул"
            "street_type_full" => "улица"
            "street" => "Вавилова"
            "house_fias_id" => "93409d8c-d8d4-4491-838f-f9aa1678b5e6"
            "house_kladr_id" => "7700000000009240170"
            "house_type" => "д"
            "house_type_full" => "дом"
            "house" => "19"
            "block_type" => null
            "block_type_full" => null
            "block" => null
            "flat_type" => null
            "flat_type_full" => null
            "flat" => null
            "flat_area" => null
            "square_meter_price" => null
            "flat_price" => null
            "postal_box" => null
            "fias_id" => "93409d8c-d8d4-4491-838f-f9aa1678b5e6"
            "fias_code" => "77000000000000009240170"
            "fias_level" => "8"
            "fias_actuality_state" => "0"
            "kladr_id" => "7700000000009240170"
            "geoname_id" => "524901"
            "capital_marker" => "0"
            "okato" => "45293554000"
            "oktmo" => "45397000"
            "tax_office" => "7736"
            "tax_office_legal" => "7736"
            "timezone" => "UTC+3"
            "geo_lat" => "55.7001865"
            "geo_lon" => "37.5802234"
            "beltway_hit" => "IN_MKAD"
            "beltway_distance" => null
            "metro" => array:3 [
              0 => array:3 [
                "name" => "Ленинский проспект"
                "line" => "Калужско-Рижская"
                "distance" => 0.8
              ]
              1 => array:3 [
                "name" => "Площадь Гагарина"
                "line" => "МЦК"
                "distance" => 0.8
              ]
              2 => array:3 [
                "name" => "Академическая"
                "line" => "Калужско-Рижская"
                "distance" => 1.5
              ]
            ]
            "qc_geo" => "0"
            "qc_complete" => null
            "qc_house" => null
            "history_values" => null
            "unparsed_parts" => null
            "source" => "117997, ГОРОД МОСКВА, УЛИЦА ВАВИЛОВА, 19"
            "qc" => "0"
          ]
        ]
        "phones" => null
        "emails" => null
        "ogrn_date" => 1029456000000
        "okved_type" => "2014"
        "employee_count" => null
      ]
    ]
  ]
]

```

Описание ответа

Таблицу описания полного ответа вы можете получить на старнице [Организация по ИНН или ОГРН](https://dadata.ru/api/find-party/) в разделе **"Что в ответе"**.

Описани ответа `data['address']`

|       **Название**        |   **Длина**  |                       **Описание**                             |
|:--------------------------|-------------:|:---------------------------------------------------------------|
| `source`                  | 250 | Исходный адрес одной строкой                                            |
| `result`                  | 500 | Стандартизованный адрес одной строкой                                   |
| `postal_code`             | 6   | Индекс                                                                  |
| `country`                 | 120 | Страна                                                                  |
| `country_iso_code`        | 2   | ISO-код страны                                                          |
| `federal_district`        | 20  | Федеральный округ                                                       |
| `region_fias_id`          | 36  | ФИАС-код региона                                                        |
| `region_kladr_id`         | 19  | КЛАДР-код региона                                                       |
| `region_iso_code`         | 6   | ISO-код региона                                                         |
| `region_with_type`        | 131 | Регион с типом                                                          |
| `region_type`             | 10  | Тип региона (сокращенный)                                               |
| `region_type_full`        | 50  | Тип региона                                                             |
| `region`                  | 120 | Регион                                                                  |
| `area_fias_id`            | 36  | ФИАС-код района                                                         |
| `area_kladr_id`           | 19  | КЛАДР-код района                                                        |
| `area_with_type`          | 131 | Район в регионе с типом                                                 |
| `area_type`               | 10  | Тип района в регионе (сокращенный)                                      |
| `area_type_full`          | 50  | Тип района в регионе                                                    |
| `area`                    | 120 | Район в регионе                                                         |
| `city_fias_id`            | 36  | ФИАС-код города                                                         |
| `city_kladr_id`           | 19  | КЛАДР-код города                                                        |
| `city_with_type`          | 131 | Город с типом                                                           |
| `city_type`               | 10  | Тип города (сокращенный)                                                |
| `city_type_full`          | 50  | Тип города                                                              |
| `city`                    | 120 | Город                                                                   |
| `city_area`               | 120 | Административный округ (только для Москвы)                              |
| `city_district_fias_id`   | 36  | ФИАС-код района города (заполняется, только если район есть в ФИАС)     |
| `city_district_kladr_id`  | 19  | КЛАДР-код района города (не заполняется)                                |
| `city_district_with_type` | 131 | Район города с типом                                                    |
| `city_district_type`      | 10  | Тип района города (сокращенный)                                         |
| `city_district_type_full` | 50  | Тип района города                                                       |
| `city_district`           | 120 | Район города                                                            |
| `settlement_fias_id`      | 36  | ФИАС-код населенного пункта                                             |
| `settlement_kladr_id`     | 19  | КЛАДР-код населенного пункта                                            |
| `settlement_with_type`    | 131 | Населенный пункт с типом                                                |
| `settlement_type`         | 10  | Тип населенного пункта (сокращенный)                                    |
| `settlement_type_full`    | 50  | Тип населенного пункта                                                  |
| `settlement`              | 120 | Населенный пункт                                                        |
| `street_fias_id`          | 36  | ФИАС-код улицы                                                          |
| `street_kladr_id`         | 19  | КЛАДР-код улицы                                                         |
| `street_with_type`        | 131 | Улица с типом                                                           |
| `street_type`             | 10  | Тип улицы (сокращенный)                                                 |
| `street_type_full`        | 50  | Тип улицы                                                               |
| `street`                  | 120 | Улица                                                                   |
| `house_fias_id`           | 36  | ФИАС-код дома                                                           |
| `house_kladr_id`          | 19  | КЛАДР-код дома                                                          |
| `house_type`              | 10  | Тип дома (сокращенный)                                                  |
| `house_type_full`         | 50  | Тип дома                                                                |
| `house`                   | 50  | Дом                                                                     |
| `block_type`              | 10  | Тип корпуса/строения (сокращенный)                                      |
| `block_type_full`         | 50  | Тип корпуса/строения                                                    |
| `block`                   | 50  | Корпус/строение                                                         |
| `flat_type`               | 10  | Тип квартиры (сокращенный)                                              |
| `flat_type_full`          | 50  | Тип квартиры                                                            |
| `flat`                    | 50  | Квартира                                                                |
| `flat_area`               | 50  | Площадь квартиры                                                        |
| `square_meter_price`      | 50  | Рыночная стоимость м²                                                   |
| `flat_price`              | 50  | Рыночная стоимость квартиры                                             |
| `postal_box`              | 50  | Абонентский ящик                                                        |
| `fias_id`                 | 36  | ФИАС-код адреса (идентификатор ФИАС)                                    |
|                           |     | `HOUSE.HOUSEGUID — если дом найден в ФИАС`                              |
|                           |     | `ADDROBJ.AOGUID — в противном случае`                                   |
| `fias_code`               |     | Иерархический код адреса в ФИАС (СС+РРР+ГГГ+ППП+СССС+УУУУ+ДДДД)         |
| `fias_level`              | 2   | Уровень детализации, до которого адрес найден в ФИАС                    |
| `fias_actuality_state`    |     | Признак актуальности адреса в ФИАС                                      |
| `kladr_id`                | 19  | КЛАДР-код адреса                                                        |
| `capital_marker`          | 1   | Признак центра района или региона                                       |
| `okato`                   | 11  | Код ОКАТО                                                               |
| `oktmo`                   | 11  | Код ОКТМО                                                               |
| `tax_office`              | 4   | Код ИФНС для физических лиц                                             |
| `tax_office_legal`        | 4   | Код ИФНС для организаций                                                |
| `timezone`                | 50  | Часовой пояс города для России, часовой пояс страны — для иностранных адресов. Если у страны несколько поясов, вернёт минимальный и максимальный через слеш: UTC+5/UTC+6 |
| `geo_lat`                 | 12  | Координаты: широта                                                      |
| `geo_lon`                 | 12  | Координаты: долгота                                                     |
| `beltway_hit`             | 8   | Внутри кольцевой?                                                       |
| `beltway_distance`        | 3   | Расстояние от кольцевой в км. Заполнено, только если beltway_hit = OUT_MKAD или OUT_KAD, иначе пустое |
| `qc_geo`                  | 5   | Код точности координат                                                  |
| `qc_complete`             | 5   | Код пригодности к рассылке                                              |
| `qc_house`                | 5   | Признак наличия дома в ФИАС                                             |
| `qc`                      | 5   | Код проверки адреса                                                     |
| `unparsed_parts`          | 250 | Нераспознанная часть адреса. Для адреса «Москва, Митинская улица, 40, вход с торца» вернет «ВХОД, С, ТОРЦА» |
| `metro`                   |     | Список ближайших станций метро (до трёх штук)                           |

Координаты есть у 97% домов в Москве, 91% в Санкт-Петербурге, 69% в других городах-миллиониках и 47% по остальной России. Площадь и стоимость есть у 70% квартир в России.

**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ или секретный ключ или в запросе указан несуществующий ключ  |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

Пример получения сообщения исключения

```php
<?php

namespace App;

use MoveMoveIo\DaData\Enums\BranchType;
use MoveMoveIo\DaData\Enums\CompanyType;
use MoveMoveIo\DaData\Facades\DaDataCompany;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData find organization by FIAS or OGRN ID example
    *
    * @return void
    */
    public function idExample() : void
    {
        try {
            $dadata = DaDataCompany::id('7707083893', 1, null, BranchType::MAIN, CompanyType::LEGAL);

            dd($dadata);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }    
    }

}

```

### Автодополнение при вводе («подсказки»)
`DaDataCompany::prompt(string $company, int $count, array $status, int $type, string $locations, string $locations_boost);` Помогает человеку быстро ввести реквизиты организации на веб-форме или в приложении.

Ищет компании и индивидуальных предпринимателей:
- По ИНН, ОГРН и КПП;
- Названию (полному и краткому);
- ФИО (для индивидуальных предпринимателей);
- ФИО руководителя компании;
- Адресу до улицы;

Основные кейсы:
- Ищет по комбинации ИНН, названия и адреса в одном запросе («7736050003 Газ» → «ПАО Газпром», «вавилова сбер» → «ПАО Сбербанк»).
- Находит конкретный филиал, если указать в запросе КПП («сбербанк 540602001» → «Сибирский банк ПАО Сбербанк»).
- Понимает слитное и раздельное написание («альфабанк» = «Альфа-Банк»).
- Ищет по частичному совпадению в ИНН / ОГРН («77094209» → «ООО Акварель») и названиях («росне» → «ПАО «НК «Роснефть»).
- Подсказывает только организации или только ИП, или и тех и других. Умеет искать только в действующих или ликвидированных компаниях. Может ограничить подсказки конкретным регионом России.
- Учитывает, где вы находитесь (в связке с методом [Определение адреса по IP](https://github.com/movemoveapp/laravel-dadata#%D0%BE%D0%BF%D1%80%D0%B5%D0%B4%D0%B5%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5-%D0%B0%D0%B4%D1%80%D0%B5%D1%81%D0%B0-%D0%BF%D0%BE-ip)).
- Возвращает основные реквизиты компании из ЕГРЮЛ: краткое и полное название, ОПФ, адрес, ОГРН, ИНН, КПП, ОКВЭД, статус организации, ФИО и должность руководителя.
- В связке с методом [Организация по ИНН](https://github.com/movemoveapp/laravel-dadata#) возвращает вагон дополнительной информации: количество сотрудников, все коды ОКВЭД, сведения о налоговой, ПФР и ФСС, документы и лицензии, учредители и руководители, финансовые показатели, реестр малого и среднего бизнеса.

Данный метод не прдназначен:
- ля 50% компаний налоговая служба пока не сообщает КПП филиалов. Такие филиалы можно найти по ИНН, городу и улице филиала. Например, «7724261610 москва мясницкая» → «Филиал ФГУП "Почта России" (г Москва)».

Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Enums\CompanyStatus;
use MoveMoveIo\DaData\Enums\CompanyType;
use MoveMoveIo\DaData\Facades\DaDataCompany;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData prompt organization by string
    *
    * @return void
    */
    public function promptExample() : void
    {
        $dadata = DaDataCompany::prompt('сбербанк', 1, [CompanyStatus::ACTIVE], CompanyType::LEGAL);

        dd($dadata);    
    }

}

```

Параметры вызова

| **Название**      | **Тип**   | **Optional** | **Default value** |  **Описание**                               |
|:------------------|:---------:|:------------:|:-----------------:|:--------------------------------------------|
| `company`         | `string`  | `false`      |                   | Текст запроса                               |
| `count`           | `int`     | `true`       | 10                | Количество результатов. Максимум 20         |
| `status`          | `int`     | `true`       | null              | Ограничение по статусу организации.         |
| `type`            | `int`     | `true`       | 1                 | Ограничение по типу организации.            |
| `locations`       | `string`  | `true`       | null              | Ограничение по региону или городу. Двухзначные коды необходимо передавать строкой через `,` запятую. [Список кодов](https://confluence.hflabs.ru/pages/viewpage.action?pageId=204669123#id-%D0%A4%D0%B8%D0%BB%D1%8C%D1%82%D1%80%D0%BF%D0%BE%D1%80%D0%B5%D0%B3%D0%B8%D0%BE%D0%BD%D1%83%D0%BE%D1%80%D0%B3%D0%B0%D0%BD%D0%B8%D0%B7%D0%B0%D1%86%D0%B8%D0%B8(API)-%D0%9A%D0%BE%D0%B4%D1%8B%D1%80%D0%B5%D0%B3%D0%B8%D0%BE%D0%BD%D0%BE%D0%B2) |
| `locations_boost` | `string`  | `true`       | null              | Приоритет города при ранжировании. |

**Формирование `status` - ограничение по статусу организации**
Чтобы искать только действующие компании, сформироуйте массив status как
 
```php
...
use MoveMoveIo\DaData\Enums\CompanyStatus;
...
$status = [
    CompanyStatus::ACTIVE
];
```

Поиск только среди ликвидируемых и ликвидированных компаний:
```php
...
use MoveMoveIo\DaData\Enums\CompanyStatus;
...
$status = [
    CompanyStatus::LIQUIDATING,
    CompanyStatus::LIQUIDATED,
];
```

**Формирование `type` - Ограничение по типу организации.**

Тип поиска только по юридическим лицам
```php
...
use MoveMoveIo\DaData\Enums\CompanyStatus;
...
$type = CompanyStatus::LEGAL;
```

Тип поиска только по индивидуальным предпринимателям
```php
...
use MoveMoveIo\DaData\Enums\CompanyStatus;
...
$type = CompanyStatus::INDIVIDUAL;
```

Пример ответа

```php
array:1 [
  "suggestions" => array:1 [
    0 => array:3 [
      "value" => "ПАО СБЕРБАНК"
      "unrestricted_value" => "ПАО СБЕРБАНК"
      "data" => array:33 [
        "kpp" => "773601001"
        "capital" => null
        "management" => array:3 [
          "name" => "Греф Герман Оскарович"
          "post" => "ПРЕЗИДЕНТ, ПРЕДСЕДАТЕЛЬ ПРАВЛЕНИЯ"
          "disqualified" => null
        ]
        "founders" => null
        "managers" => null
        "branch_type" => "MAIN"
        "branch_count" => 88
        "source" => null
        "qc" => null
        "hid" => "588a141bc5e17cbc976ec2d0d54149af49d5a4ca16e26ed2effafdf06841d645"
        "type" => "LEGAL"
        "state" => array:4 [
          "status" => "ACTIVE"
          "actuality_date" => 1601942400000
          "registration_date" => 677376000000
          "liquidation_date" => null
        ]
        "opf" => array:4 [
          "type" => "2014"
          "code" => "12247"
          "full" => "Публичное акционерное общество"
          "short" => "ПАО"
        ]
        "name" => array:5 [
          "full_with_opf" => "ПУБЛИЧНОЕ АКЦИОНЕРНОЕ ОБЩЕСТВО "СБЕРБАНК РОССИИ""
          "short_with_opf" => "ПАО СБЕРБАНК"
          "latin" => null
          "full" => "СБЕРБАНК РОССИИ"
          "short" => "СБЕРБАНК"
        ]
        "inn" => "7707083893"
        "ogrn" => "1027700132195"
        "okpo" => "00032537"
        "okato" => "45293554000"
        "oktmo" => "45397000000"
        "okogu" => "4100104"
        "okfs" => "41"
        "okved" => "64.19"
        "okveds" => null
        "authorities" => null
        "documents" => null
        "licenses" => null
        "finance" => null
        "address" => array:3 [
          "value" => "г Москва, ул Вавилова, д 19"
          "unrestricted_value" => "117312, г Москва, Академический р-н, ул Вавилова, д 19"
          "data" => array:81 [
            "postal_code" => "117312"
            "country" => "Россия"
            "country_iso_code" => "RU"
            "federal_district" => "Центральный"
            "region_fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5"
            "region_kladr_id" => "7700000000000"
            "region_iso_code" => "RU-MOW"
            "region_with_type" => "г Москва"
            "region_type" => "г"
            "region_type_full" => "город"
            "region" => "Москва"
            "area_fias_id" => null
            "area_kladr_id" => null
            "area_with_type" => null
            "area_type" => null
            "area_type_full" => null
            "area" => null
            "city_fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5"
            "city_kladr_id" => "7700000000000"
            "city_with_type" => "г Москва"
            "city_type" => "г"
            "city_type_full" => "город"
            "city" => "Москва"
            "city_area" => "Юго-западный"
            "city_district_fias_id" => null
            "city_district_kladr_id" => null
            "city_district_with_type" => "Академический р-н"
            "city_district_type" => "р-н"
            "city_district_type_full" => "район"
            "city_district" => "Академический"
            "settlement_fias_id" => null
            "settlement_kladr_id" => null
            "settlement_with_type" => null
            "settlement_type" => null
            "settlement_type_full" => null
            "settlement" => null
            "street_fias_id" => "25f8f29b-b110-40ab-a48e-9c72f5fb4331"
            "street_kladr_id" => "77000000000092400"
            "street_with_type" => "ул Вавилова"
            "street_type" => "ул"
            "street_type_full" => "улица"
            "street" => "Вавилова"
            "house_fias_id" => "93409d8c-d8d4-4491-838f-f9aa1678b5e6"
            "house_kladr_id" => "7700000000009240170"
            "house_type" => "д"
            "house_type_full" => "дом"
            "house" => "19"
            "block_type" => null
            "block_type_full" => null
            "block" => null
            "flat_type" => null
            "flat_type_full" => null
            "flat" => null
            "flat_area" => null
            "square_meter_price" => null
            "flat_price" => null
            "postal_box" => null
            "fias_id" => "93409d8c-d8d4-4491-838f-f9aa1678b5e6"
            "fias_code" => "77000000000000009240170"
            "fias_level" => "8"
            "fias_actuality_state" => "0"
            "kladr_id" => "7700000000009240170"
            "geoname_id" => "524901"
            "capital_marker" => "0"
            "okato" => "45293554000"
            "oktmo" => "45397000"
            "tax_office" => "7736"
            "tax_office_legal" => "7736"
            "timezone" => "UTC+3"
            "geo_lat" => "55.7001865"
            "geo_lon" => "37.5802234"
            "beltway_hit" => "IN_MKAD"
            "beltway_distance" => null
            "metro" => array:3 [
              0 => array:3 [
                "name" => "Ленинский проспект"
                "line" => "Калужско-Рижская"
                "distance" => 0.8
              ]
              1 => array:3 [
                "name" => "Площадь Гагарина"
                "line" => "МЦК"
                "distance" => 0.8
              ]
              2 => array:3 [
                "name" => "Академическая"
                "line" => "Калужско-Рижская"
                "distance" => 1.5
              ]
            ]
            "qc_geo" => "0"
            "qc_complete" => null
            "qc_house" => null
            "history_values" => null
            "unparsed_parts" => null
            "source" => "117997, ГОРОД МОСКВА, УЛИЦА ВАВИЛОВА, 19"
            "qc" => "0"
          ]
        ]
        "phones" => null
        "emails" => null
        "ogrn_date" => 1029456000000
        "okved_type" => "2014"
        "employee_count" => null
      ]
    ]
  ]
]

```

Описание ответа

Таблицу описания полного ответа вы можете получить на старнице [API подсказок по организациям](https://dadata.ru/api/suggest/party/) в разделе **"Что в ответе"**.

**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ или секретный ключ или в запросе указан несуществующий ключ  |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

Пример получения сообщения исключения

```php
<?php

namespace App;

use MoveMoveIo\DaData\Enums\CompanyStatus;
use MoveMoveIo\DaData\Enums\CompanyType;
use MoveMoveIo\DaData\Facades\DaDataCompany;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
   * DaData prompt organization by string
   *
   * @return void
   */
   public function promptExample() : void
    {
        try {
            $dadata = DaDataCompany::prompt('сбербанк', 1, [CompanyStatus::ACTIVE], CompanyType::LEGAL);

            dd($dadata);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }    
    }

}

```

### Поиск аффилированных компаний
`DaDataCompany::affiliated(string $code, int $count, array $scope)` Находит организации по ИНН учредителей и руководителей. Работает для физлиц и юрлиц.

Часто учредитель или директор не ограничивается участием в одном юрлице, а фигурирует в нескольких. Порой — в десятках разных компаний. Знать об этом полезно как для оценки надёжности контрагента, так и для более эффективного маркетинга и продаж. Чтобы облегчить поиск аффилированных компаний, «Дадата» находит организации по ИНН учредителей и руководителей.

Ищет по ИНН физлиц и юрлиц.

Данный метод не удается протестировать из-за того, что все получаем `403`,  `Operation party/findAffiliated is not permitted`

Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Enums\CompanyScope;
use MoveMoveIo\DaData\Facades\DaDataCompany;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData find affiliated organization exmaple
    *
    * @return void
    */
    public function affiliatedExample() : void
    {
        $dadata = DaDataCompany::affiliated('7736207543', 1, [CompanyScope::MANAGERS]);
        
        dd($dadata);
    }

}

```

Параметры вызова

| **Название**      | **Тип**   | **Optional** | **Default value** |  **Описание**                               |
|:------------------|:---------:|:------------:|:-----------------:|:--------------------------------------------|
| `code`            | `string`  | `false`      |                   | Текст запроса                               |
| `count`           | `int`     | `true`       | 10                | Количество результатов. Максимум 20         |
| `scope`           | `array`   | `true`       | []                | КПП для поиска по филиалам                  |

**Формирование `scope` - **

Описание ответа

Таблицу описания полного ответа вы можете получить на старнице [Поиск аффилированных компаний](https://dadata.ru/api/find-affiliated/) в разделе **"Что в ответе"**.

**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ или секретный ключ или в запросе указан несуществующий ключ  |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

Пример получения сообщения исключения

```php
<?php

namespace App;

use MoveMoveIo\DaData\Enums\CompanyScope;
use MoveMoveIo\DaData\Facades\DaDataCompany;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
    * DaData find affiliated organization exmaple
    *
    * @return void
    */
    public function affiliatedExample() : void
    {
        try {
            $dadata = DaDataCompany::affiliated('7736207543', 1, [CompanyScope::MANAGERS]);

            dd($dadata);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }    
    }

}

```

## Работа с банками
### Банк по БИК, SWIFT, ИНН или регистрационному номеру
`DaDataBank::id(string $bank);` Находит банк по любому из идентификаторов: БИК, SWIFT, ИНН, ИНН + КПП (для филиалов), рег. номеру, присвоенному Банком России. Возвращает реквизиты банка, корр. счёт, адрес и статус (действующий / на ликвидации).

Ищет кредитные организации по:
- БИК;
- SWIFT;
- ИНН;
- ИНН плюс КПП;
- Названию;

Ищет только по точному совпадению, для частичного совпадения используйте метод `DaDataBank::prompt(string $bank, int $count, array $status, array $type, string $locations, string $locations_boost)`

Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataBank;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
   * DaData prompt bank by string
   *
   * @return void
   */
   public function promptExample() : void
    {
        $dadata = DaDataBank::id('044525225');
        
        dd($dadata);    
    }

}

```

Параметры вызова

| **Название**      | **Тип**   | **Optional** | **Default value** |  **Описание**                               |
|:------------------|:---------:|:------------:|:-----------------:|:--------------------------------------------|
| `bank`            | `string`  | `false`      |                   | Текст запроса                               |

Пример ответа

```php
array:1 [
  "suggestions" => array:1 [
    0 => array:3 [
      "value" => "ПАО Сбербанк"
      "unrestricted_value" => "ПАО Сбербанк"
      "data" => array:14 [
        "opf" => array:3 [
          "type" => "BANK"
          "full" => null
          "short" => null
        ]
        "name" => array:3 [
          "payment" => "ПАО СБЕРБАНК"
          "full" => null
          "short" => "ПАО Сбербанк"
        ]
        "bic" => "044525225"
        "swift" => "SABRRUMM"
        "inn" => "7707083893"
        "kpp" => "773601001"
        "okpo" => null
        "correspondent_account" => "30101810400000000225"
        "registration_number" => "1481"
        "payment_city" => "г Москва"
        "state" => array:4 [
          "status" => "ACTIVE"
          "actuality_date" => 1602547200000
          "registration_date" => 677376000000
          "liquidation_date" => null
        ]
        "rkc" => null
        "address" => array:3 [
          "value" => "г Москва, ул Вавилова, д 19"
          "unrestricted_value" => "117312, г Москва, Академический р-н, ул Вавилова, д 19"
          "data" => array:81 [
            "postal_code" => "117312"
            "country" => "Россия"
            "country_iso_code" => "RU"
            "federal_district" => "Центральный"
            "region_fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5"
            "region_kladr_id" => "7700000000000"
            "region_iso_code" => "RU-MOW"
            "region_with_type" => "г Москва"
            "region_type" => "г"
            "region_type_full" => "город"
            "region" => "Москва"
            "area_fias_id" => null
            "area_kladr_id" => null
            "area_with_type" => null
            "area_type" => null
            "area_type_full" => null
            "area" => null
            "city_fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5"
            "city_kladr_id" => "7700000000000"
            "city_with_type" => "г Москва"
            "city_type" => "г"
            "city_type_full" => "город"
            "city" => "Москва"
            "city_area" => "Юго-западный"
            "city_district_fias_id" => null
            "city_district_kladr_id" => null
            "city_district_with_type" => "Академический р-н"
            "city_district_type" => "р-н"
            "city_district_type_full" => "район"
            "city_district" => "Академический"
            "settlement_fias_id" => null
            "settlement_kladr_id" => null
            "settlement_with_type" => null
            "settlement_type" => null
            "settlement_type_full" => null
            "settlement" => null
            "street_fias_id" => "25f8f29b-b110-40ab-a48e-9c72f5fb4331"
            "street_kladr_id" => "77000000000092400"
            "street_with_type" => "ул Вавилова"
            "street_type" => "ул"
            "street_type_full" => "улица"
            "street" => "Вавилова"
            "house_fias_id" => "93409d8c-d8d4-4491-838f-f9aa1678b5e6"
            "house_kladr_id" => "7700000000009240170"
            "house_type" => "д"
            "house_type_full" => "дом"
            "house" => "19"
            "block_type" => null
            "block_type_full" => null
            "block" => null
            "flat_type" => null
            "flat_type_full" => null
            "flat" => null
            "flat_area" => null
            "square_meter_price" => null
            "flat_price" => null
            "postal_box" => null
            "fias_id" => "93409d8c-d8d4-4491-838f-f9aa1678b5e6"
            "fias_code" => "77000000000000009240170"
            "fias_level" => "8"
            "fias_actuality_state" => "0"
            "kladr_id" => "7700000000009240170"
            "geoname_id" => "524901"
            "capital_marker" => "0"
            "okato" => "45293554000"
            "oktmo" => "45397000"
            "tax_office" => "7736"
            "tax_office_legal" => "7736"
            "timezone" => "UTC+3"
            "geo_lat" => "55.7001865"
            "geo_lon" => "37.5802234"
            "beltway_hit" => "IN_MKAD"
            "beltway_distance" => null
            "metro" => array:3 [
              0 => array:3 [
                "name" => "Ленинский проспект"
                "line" => "Калужско-Рижская"
                "distance" => 0.8
              ]
              1 => array:3 [
                "name" => "Площадь Гагарина"
                "line" => "МЦК"
                "distance" => 0.8
              ]
              2 => array:3 [
                "name" => "Академическая"
                "line" => "Калужско-Рижская"
                "distance" => 1.5
              ]
            ]
            "qc_geo" => "0"
            "qc_complete" => "5"
            "qc_house" => "2"
            "history_values" => null
            "unparsed_parts" => null
            "source" => "117997, г Москва, ул Вавилова, 19"
            "qc" => "0"
          ]
        ]
        "phones" => null
      ]
    ]
  ]
]

```

Описание ответа

Таблицу описания полного ответа вы можете получить на старнице [Банк по БИК, SWIFT, ИНН или регистрационному номеру](https://dadata.ru/api/find-bank/) в разделе **"Что в ответе"**.

**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ или секретный ключ или в запросе указан несуществующий ключ  |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

Пример получения сообщения исключения

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataBank;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
   * DaData prompt bank by string
   *
   * @return void
   */
   public function promptExample() : void
    {
        try {
            $dadata = DaDataBank::id('044525225');

            dd($dadata);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }    
    }

}

```

### API подсказок по банкам
`DaDataBank::prompt(string $bank, int $count, array $status, array $type, string $locations, string $locations_boost)` Помогает человеку быстро ввести реквизиты банка на веб-форме или в приложении.

Ищет кредитные организации по:
- БИК;
- SWIFT;
- ИНН;
- ИНН плюс КПП;
- Названию;

Основные кейсы:
- Фильтрует по типу: банки, НКО и филиалы, а также РКЦ и другие организации;
- Умеет искать как действующие банки, так и банки на ликвидации;
- Учитывает, где вы находитесь (геолокация до города);

Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Enums\BankStatus;
use MoveMoveIo\DaData\Enums\BankType;
use MoveMoveIo\DaData\Facades\DaDataBank;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
   * DaData prompt bank by string
   *
   * @return void
   */
   public function promptExample() : void
    {
        $dadata = DaDataBank::prompt('сбербанк', 1, [BankStatus::ACTIVE], [BankType::BANK]);
        
        dd($dadata);    
    }

}

```

Параметры вызова

| **Название**      | **Тип**   | **Optional** | **Default value** |  **Описание**                               |
|:------------------|:---------:|:------------:|:-----------------:|:--------------------------------------------|
| `bank`            | `string`  | `false`      |                   | Текст запроса                               |
| `count`           | `int`     | `true`       | 10                | Количество результатов. Максимум 20         |
| `status`          | `array`   | `true`       | null              | Ограничение по статусу банка                |
| `type`            | `array`   | `true`       | 1                 | Ограничение по типу банка                   |
| `locations`       | `string`  | `true`       | null              | Ограничение по региону или городу. Двухзначные коды необходимо передавать строкой через `,` запятую. [Список кодов](https://confluence.hflabs.ru/pages/viewpage.action?pageId=204669123#id-%D0%A4%D0%B8%D0%BB%D1%8C%D1%82%D1%80%D0%BF%D0%BE%D1%80%D0%B5%D0%B3%D0%B8%D0%BE%D0%BD%D1%83%D0%BE%D1%80%D0%B3%D0%B0%D0%BD%D0%B8%D0%B7%D0%B0%D1%86%D0%B8%D0%B8(API)-%D0%9A%D0%BE%D0%B4%D1%8B%D1%80%D0%B5%D0%B3%D0%B8%D0%BE%D0%BD%D0%BE%D0%B2) |
| `locations_boost` | `string`  | `true`       | null              | Приоритет города при ранжировании. |

**Формирование `status` - ограничение по статусу организации**
Чтобы искать только действующие банки, сформироуйте массив status как
 
```php
...
use MoveMoveIo\DaData\Enums\BankStatus;
...
$status = [
    BankStatus::ACTIVE
];
```

Поиск только среди ликвидируемых и ликвидированных банков:
```php
...
use MoveMoveIo\DaData\Enums\BankStatus;
...
$status = [
    BankStatus::LIQUIDATING,
    BankStatus::LIQUIDATED,
];
```

**Формирование `type` - Ограничение по типу банка.**
Доступные типы организаций в классе `MoveMoveIo\DaData\Enums\BankType`

| **Тип**                 | **Тип организации**                               |
|:------------------------|:--------------------------------------------------|
| `BankType::BANK`        | Банк                                              |
| `BankType::BANK_BRANCH` | Филиал банка                                      |
| `BankType::NKO`         | Небанковская кредитная организация                |
| `BankType::NKO_BRANCH`  | Филиал небанковской кредитной организации         |
| `BankType::OTHER`       | Другое                                            |
| `BankType::RKC`         | РКЦ / ГРКЦ                                        |

Тип поиска только по банкам и филиалам банков
                 
```php
...
use MoveMoveIo\DaData\Enums\BankType;
...
$type = [BankType::BANK, BankType::BANK_BRANCH]
```

Тип поиска только по РКЦ/ГРКЦ 
```php
...
use MoveMoveIo\DaData\Enums\BankType;
...
$type = [BankType::BANK, BankType::RKC]
```

Пример ответа

```php
array:1 [
  "suggestions" => array:1 [
    0 => array:3 [
      "value" => "ПАО Сбербанк"
      "unrestricted_value" => "ПАО Сбербанк"
      "data" => array:14 [
        "opf" => array:3 [
          "type" => "BANK"
          "full" => null
          "short" => null
        ]
        "name" => array:3 [
          "payment" => "ПАО СБЕРБАНК"
          "full" => null
          "short" => "ПАО Сбербанк"
        ]
        "bic" => "044525225"
        "swift" => "SABRRUMM"
        "inn" => "7707083893"
        "kpp" => "773601001"
        "okpo" => null
        "correspondent_account" => "30101810400000000225"
        "registration_number" => "1481"
        "payment_city" => "г Москва"
        "state" => array:4 [
          "status" => "ACTIVE"
          "actuality_date" => 1602547200000
          "registration_date" => 677376000000
          "liquidation_date" => null
        ]
        "rkc" => null
        "address" => array:3 [
          "value" => "г Москва, ул Вавилова, д 19"
          "unrestricted_value" => "117312, г Москва, Академический р-н, ул Вавилова, д 19"
          "data" => array:81 [
            "postal_code" => "117312"
            "country" => "Россия"
            "country_iso_code" => "RU"
            "federal_district" => "Центральный"
            "region_fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5"
            "region_kladr_id" => "7700000000000"
            "region_iso_code" => "RU-MOW"
            "region_with_type" => "г Москва"
            "region_type" => "г"
            "region_type_full" => "город"
            "region" => "Москва"
            "area_fias_id" => null
            "area_kladr_id" => null
            "area_with_type" => null
            "area_type" => null
            "area_type_full" => null
            "area" => null
            "city_fias_id" => "0c5b2444-70a0-4932-980c-b4dc0d3f02b5"
            "city_kladr_id" => "7700000000000"
            "city_with_type" => "г Москва"
            "city_type" => "г"
            "city_type_full" => "город"
            "city" => "Москва"
            "city_area" => "Юго-западный"
            "city_district_fias_id" => null
            "city_district_kladr_id" => null
            "city_district_with_type" => "Академический р-н"
            "city_district_type" => "р-н"
            "city_district_type_full" => "район"
            "city_district" => "Академический"
            "settlement_fias_id" => null
            "settlement_kladr_id" => null
            "settlement_with_type" => null
            "settlement_type" => null
            "settlement_type_full" => null
            "settlement" => null
            "street_fias_id" => "25f8f29b-b110-40ab-a48e-9c72f5fb4331"
            "street_kladr_id" => "77000000000092400"
            "street_with_type" => "ул Вавилова"
            "street_type" => "ул"
            "street_type_full" => "улица"
            "street" => "Вавилова"
            "house_fias_id" => "93409d8c-d8d4-4491-838f-f9aa1678b5e6"
            "house_kladr_id" => "7700000000009240170"
            "house_type" => "д"
            "house_type_full" => "дом"
            "house" => "19"
            "block_type" => null
            "block_type_full" => null
            "block" => null
            "flat_type" => null
            "flat_type_full" => null
            "flat" => null
            "flat_area" => null
            "square_meter_price" => null
            "flat_price" => null
            "postal_box" => null
            "fias_id" => "93409d8c-d8d4-4491-838f-f9aa1678b5e6"
            "fias_code" => "77000000000000009240170"
            "fias_level" => "8"
            "fias_actuality_state" => "0"
            "kladr_id" => "7700000000009240170"
            "geoname_id" => "524901"
            "capital_marker" => "0"
            "okato" => "45293554000"
            "oktmo" => "45397000"
            "tax_office" => "7736"
            "tax_office_legal" => "7736"
            "timezone" => "UTC+3"
            "geo_lat" => "55.7001865"
            "geo_lon" => "37.5802234"
            "beltway_hit" => "IN_MKAD"
            "beltway_distance" => null
            "metro" => array:3 [
              0 => array:3 [
                "name" => "Ленинский проспект"
                "line" => "Калужско-Рижская"
                "distance" => 0.8
              ]
              1 => array:3 [
                "name" => "Площадь Гагарина"
                "line" => "МЦК"
                "distance" => 0.8
              ]
              2 => array:3 [
                "name" => "Академическая"
                "line" => "Калужско-Рижская"
                "distance" => 1.5
              ]
            ]
            "qc_geo" => "0"
            "qc_complete" => "5"
            "qc_house" => "2"
            "history_values" => null
            "unparsed_parts" => null
            "source" => "117997, г Москва, ул Вавилова, 19"
            "qc" => "0"
          ]
        ]
        "phones" => null
      ]
    ]
  ]
]

```

Описание ответа

Таблицу описания полного ответа вы можете получить на старнице [API подсказок по банкамм](https://dadata.ru/api/suggest/bank/) в разделе **"Что в ответе"**.

**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ или секретный ключ или в запросе указан несуществующий ключ  |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

Пример получения сообщения исключения

```php
<?php

namespace App;

use MoveMoveIo\DaData\Enums\BankStatus;
use MoveMoveIo\DaData\Enums\BankType;
use MoveMoveIo\DaData\Facades\DaDataBank;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
   * DaData prompt bank by string
   *
   * @return void
   */
   public function promptExample() : void
    {
        try {
            $dadata = DaDataBank::prompt('сбербанк', 1, [BankStatus::ACTIVE], BankType::BANK);

            dd($dadata);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }    
    }

}

```

## Работа с паспортами
### Проверка по реестру МВД
`DaDataPassport::standardization(string $id)` Проверяет паспорт по справочнику недействительных паспортов МВД.

Основные кейсы:
- Проверяет формат серии и номера;
- Проверяет паспорт по справочнику недействительных паспортов МВД;

Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataPassport;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
   * DaData passport
   *
   * @return void
   */
   public function passportExample() : void
    {
        $dadata = DaDataPassport::standardization('4509 235857');
        
        dd($dadata);
    }

}

```

Параметры вызова

| **Название**      | **Тип**   | **Optional** | **Default value** |  **Описание**                               |
|:------------------|:---------:|:------------:|:-----------------:|:--------------------------------------------|
| `id`              | `string`  | `false`      |                   | Текст запроса                               |

Пример ответа

```php
array:1 [
  0 => array:4 [
    "source" => "4509 235857"
    "series" => "45 09"
    "number" => "235857"
    "qc" => 0
  ]
]

```

Описание ответа

| **Название**      | **Длина**   |  **Описание**                               |
|:------------------|:-----------:|:--------------------------------------------|
| `source`          | `100`       | Исходная серия и номер одной строкой        |
| `series`          | `20`        | Серия                                       |
| `number`          | `20`        | Номер                                       |
| `qc`              | `5`         | Код проверки.                               |

| `qc`    | **Нужна ручная проверка?** |              **Описание**                                                                              |
|:-------:|:---------------------------|:-------------------------------------------------------------------------------------------------------|
| **0**   | нет                        | Действующий паспорт                                                                                    |
| **2**   | нет                        | Исходное значение пустое                                                                               |
| **1**   | да                         | Неправильный формат серии или номера                                                                   |
| **100** | да                         | Недействительный паспорт                                                                               |

**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ или секретный ключ или в запросе указан несуществующий ключ  |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

Пример получения сообщения исключения

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataPassport;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
   * DaData passport
   *
   * @return void
   */
   public function passportExample() : void
    {
        try {
            $dadata = DaDataPassport::standardization('4509 235857');

            dd($dadata);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }    
    }

}

```

### Кем выдан паспорт  
`DaDataPassport::fns(string $passport, int $count)` Моментально заполняет организацию, выдавшую паспорт, по коду подразделения

Самое утомительное поле при вводе паспорта — «Кем выдан». Писать какое-нибудь «Отделом внутренних дел Медведевского района республики Марий Эл» муторно. Поэтому мы сделали подсказки по полю «Паспорт выдан...».

Пример вызова

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataPassport;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
   * DaData FNS
   *
   * @return void
   */
   public function fnsExample() : void
    {
        $dadata = DaDataPassport::fms('772 053', 2);
        
        dd($dadata);   
    }

}

```

Параметры вызова

| **Название**      | **Тип**   | **Optional** | **Default value** |  **Описание**                               |
|:------------------|:---------:|:------------:|:-----------------:|:--------------------------------------------|
| `id`              | `string`  | `false`      |                   | Текст запроса                               |
| `count`           | `int`     | `true`       | 10                | Количество результатов. Максимум 20         |

Пример ответа

```php
array:1 [
  "suggestions" => array:2 [
    0 => array:3 [
      "value" => "ОВД ЗЮЗИНО Г. МОСКВЫ"
      "unrestricted_value" => "ОВД ЗЮЗИНО Г. МОСКВЫ"
      "data" => array:4 [
        "code" => "772-053"
        "name" => "ОВД ЗЮЗИНО Г. МОСКВЫ"
        "region_code" => "77"
        "type" => "2"
      ]
    ]
    1 => array:3 [
      "value" => "ОВД ЗЮЗИНО Г. МОСКВЫ ПАСПОРТНЫЙ СТОЛ 1"
      "unrestricted_value" => "ОВД ЗЮЗИНО Г. МОСКВЫ ПАСПОРТНЫЙ СТОЛ 1"
      "data" => array:4 [
        "code" => "772-053"
        "name" => "ОВД ЗЮЗИНО Г. МОСКВЫ ПАСПОРТНЫЙ СТОЛ 1"
        "region_code" => "77"
        "type" => "2"
      ]
    ]
  ]
]


```

Описание ответа

| **Название**          |  **Описание**                               |
|:----------------------|:--------------------------------------------|
| `value`               | Значение одной строкой (как показывается в списке подсказок) |
| `unrestricted_value`  | `== value` |
| `data['code']`        | Код подразделения |
| `data['name']`        | Название подразделения в творительном падеже («кем выдан?») |
| `data['region_code']` | Код региона (2 цифры) |
| `data['type']`        | Вид подразделения (1 цифра). `0` — подразделение ФМС, `1` — ГУВД или МВД региона, `2` — УВД или ОВД района или города, `3` — отделение полиции |

**Exceptions**

При вызове методов, вы можете обрабатывать коды исключений и их сообщения

|       **Код**        |                       **Описание**                                                          |
|:---------------------|:--------------------------------------------------------------------------------------------|
| `400`                | Некорректный запрос                                                                         |
| `401`                | В запросе отсутствует API-ключ или секретный ключ или в запросе указан несуществующий ключ  |
| `403`                | Не подтверждена почта или недостаточно средств для обработки запроса, пополните баланс      |
| `405`                | Запрос сделан с методом, отличным от POST                                                   |
| `429`                | Слишком много запросов в секунду или новых соединений в минуту                              |
| `5xx`                | Произошла внутренняя ошибка сервиса                                                         |

Более детальную информацию вы можете получить из сообщения исключения.

Пример получения сообщения исключения

```php
<?php

namespace App;

use MoveMoveIo\DaData\Facades\DaDataPassport;

/**
 * Class DaData
 * @package App\DaData
 */
class DaData
{

   /**
   * DaData FNS
   *
   * @return void
   */
   public function fnsExample() : void
    {
        try {
            $dadata = DaDataPassport::fms('772 053', 2);

            dd($dadata);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }    
    }

}

```
