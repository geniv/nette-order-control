Order control
=============

Installation
------------
```sh
$ composer require geniv/nette-order-control
```
or
```json
"geniv/nette-order-control": ">=1.0.0"
```

require:
```json
"php": ">=7.0.0"
```

Include in application
----------------------
content of IOrderControl:
```php
//const:
IOrderControl::CURRENCY_CZK
IOrderControl::CURRENCY_EUR
IOrderControl::CURRENCY_USD
IOrderControl::CURRENCY_GBP

//method:
setPrice(float $price): IOrderControl;
setVat(float $vat): IOrderControl;
setCurrency(string $currency): IOrderControl;

getCurrency(): string;
getPrice(): float;
getVat(): float;

getPriceVat($priceAndVat = false): float;
getPriceTotal($priceAndVat = false): float;

setPayment(string $name, float $price, float $vat): IOrderControl;
getPaymentName(): string;
getPaymentPrice(): float;
getPaymentPriceVat($priceAndVat = false): float;

setDelivery(string $name, float $price, float $vat): IOrderControl;
getDeliveryName(): string;
getDeliveryPrice(): float;
getDeliveryPriceVat($priceAndVat = false): float;

getOrderNumber(array $items, int $zeros = self::ZEROS): string;
```

php usage:
```php
$orderControl = new OrderControl();
$orderControl->setPrice($this->price);
$orderControl->setVat($this->vat);
$orderControl->setCurrency($this->currency);

$orderControl->setPayment($item['driver'], $item['price'], $this->vat);

$orderControl->setDelivery($item['driver'], $item['price'], $this->vat);
```

latte usage:
```latte
{$orderControl->getPrice()}
{$orderControl->getPriceVat(true)}
```
