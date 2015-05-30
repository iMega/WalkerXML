<?php
/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2015 Dmitry Gavrilov <info@imega.ru>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
namespace iMega\Teleport\Parser;

/**
 * Class Description
 */
final class Description
{
    const CONTAINS_ONLY_THE_CHANGES = 'СодержитТолькоИзменения',
        DOCUMENT        = 'Документ',
        PACKAGEOFFERS   = 'ПакетПредложений',
        PRICETYPES      = 'ТипыЦен',
        PRICETYPE       = 'ТипЦены',
        CURRENCY        = 'Валюта',
        OFFERS          = 'Предложения',
        OFFER           = 'Предложение',
        BARCODE         = 'Штрихкод',
        BASEUNIT        = 'БазоваяЕдиница',
        PRODUCTFEATURES = 'ХарактеристикиТовара',
        PRODUCTFEATURE  = 'ХарактеристикаТовара',
        PRICES          = 'Цены',
        PRICE           = 'Цена',
        REPRESENTATION  = 'Представление',
        PRICETYPEID     = 'ИдТипаЦены',
        PRICEBYUNIT     = 'ЦенаЗаЕдиницу',
        UNIT            = 'Единица',
        RATIO           = 'Коэффициент',
        AMOUNT          = 'Количество',

        KEY = 'Код',
        FULLNAME = 'НаименованиеПолное',
        INTERNATIONALABBREVIATION = 'МеждународноеСокращение',
        ARTICLE = 'Артикул',

        CLASSI = 'Классификатор',
        GROUPS = 'Группы',
        GROUP = 'Группа',

        CATALOG = 'Каталог',
        PRODUCTS = 'Товары',
        PRODUCT = 'Товар',

        ATTRIBUTEVALUES = 'ЗначенияРеквизитов',
        ATTRIBUTEVALUE = 'ЗначениеРеквизита',
        VALUE = 'Значение',

        ID = 'Ид',
        NUMBER = 'Номер',
        NAME = 'Наименование',
        DESC = 'Описание',
        IMAGE = 'Картинка',

        PROPERTIES = 'Свойства',
        PROPERY = 'Свойство',
        VALUETYPE = 'ТипЗначений',
        ATTRIBUTESVARIANTS = 'ВариантыЗначений',
        FORPRODUCT = 'ДляТоваров',
        VALUEID = 'ИдЗначения',
        DIC = 'Справочник',

        PROPERTYVALUES = 'ЗначенияСвойств',
        PROPERTYVALUE = 'ЗначенияСвойства',

        OPERATION = 'ХозОперация',
        COMMERCIAL_INFO = 'КоммерческаяИнформация',
        DATE_CREATE = 'ДатаФормирования',
        CONTRAGENTS = 'Контрагенты',
        CONTRAGENT = 'Контрагент',
        NAMEFULL = 'ПолноеНаименование',
        FIRSTNAME = 'Имя',
        LASTNAME = 'Фамилия',
        ADDRESS = 'АдресРегистрации',
        ADDRESS_TITLE = 'Представление',
        ADDRESS_FIELD = 'АдресноеПоле',
        TYPE = 'Тип',
        DATE = 'Дата',
        TIME = 'Время',
        GOODS = 'Товары',
        GOOD = 'Товар',
        SUM = 'Сумма',
        RATE = 'Курс',

        MARK_REMOVAL = 'ПометкаУдаления',
        HELD = 'Проведен',
        PAYMENT_DATE = 'Дата оплаты по 1С',
        DATE_OF_SHIPMENT = 'Дата отгрузки по 1С';
}
