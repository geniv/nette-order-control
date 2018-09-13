<?php declare(strict_types=1);

namespace OrderControl;


/**
 * Class OrderControl
 *
 * @author  geniv
 * @package OrderControl
 */
class OrderControl implements IOrderControl
{
    /** @var float */
    private $price, $vat;
    /** @var string */
    private $currency;
    /** @var array */
    private $payment, $delivery;


    /**
     * Set price.
     *
     * @param float $price
     * @return IOrderControl
     */
    public function setPrice(float $price): IOrderControl
    {
        $this->price = $price;
        return $this;
    }


    /**
     * Set vat.
     *
     * @param float $vat
     * @return IOrderControl
     */
    public function setVat(float $vat): IOrderControl
    {
        $this->vat = $vat;
        return $this;
    }


    /**
     * Set currency.
     *
     * @param string $currency
     * @return IOrderControl
     */
    public function setCurrency(string $currency): IOrderControl
    {
        $this->currency = $currency;
        return $this;
    }


    /**
     * Get currency.
     *
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }


    /**
     * Get price.
     *
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }


    /**
     * Get vat.
     *
     * @return float
     */
    public function getVat(): float
    {
        return $this->vat;
    }


    /**
     * Get price vat.
     *
     * @param bool $priceAndVat
     * @return float
     */
    public function getPriceVat($priceAndVat = false): float
    {
        $priceVat = $this->price * floatval('0.' . $this->vat);
        if ($priceAndVat) {
            return $this->price + $priceVat;
        } else {
            return $priceVat;
        }
    }


    /**
     * Set payment.
     *
     * @param string $name
     * @param float  $price
     * @param float  $vat
     * @return IOrderControl
     */
    public function setPayment(string $name, float $price, float $vat): IOrderControl
    {
        $this->payment = [
            'name'  => $name,
            'price' => $price,
            'vat'   => $vat,
        ];
        return $this;
    }


    /**
     * Get payment name.
     *
     * @return string
     */
    public function getPaymentName(): string
    {
        return $this->payment['name'];
    }


    /**
     * Get payment price.
     *
     * @return float
     */
    public function getPaymentPrice(): float
    {
        return $this->payment['price'];
    }


    /**
     * Get payment price vat.
     *
     * @param bool $priceAndVat
     * @return float
     */
    public function getPaymentPriceVat($priceAndVat = false): float
    {
        $priceVat = $this->payment['price'] * floatval('0.' . $this->payment['vat']);
        if ($priceAndVat) {
            return $this->payment['price'] + $priceVat;
        } else {
            return $priceVat;
        }
    }


    /**
     * Set delivery.
     *
     * @param string $name
     * @param float  $price
     * @param float  $vat
     * @return IOrderControl
     */
    public function setDelivery(string $name, float $price, float $vat): IOrderControl
    {
        $this->delivery = [
            'name'  => $name,
            'price' => $price,
            'vat'   => $vat,
        ];
        return $this;
    }


    /**
     * Get delivery name.
     *
     * @return string
     */
    public function getDeliveryName(): string
    {
        return $this->delivery['name'];
    }


    /**
     * Get delivery price.
     *
     * @return float
     */
    public function getDeliveryPrice(): float
    {
        return $this->delivery['price'];
    }


    /**
     * Get delivery price vat.
     *
     * @param bool $priceAndVat
     * @return float
     */
    public function getDeliveryPriceVat($priceAndVat = false): float
    {
        $priceVat = $this->delivery['price'] * floatval('0.' . $this->delivery['vat']);
        if ($priceAndVat) {
            return $this->delivery['price'] + $priceVat;
        } else {
            return $priceVat;
        }
    }


    /**
     * Get price total.
     *
     * @param bool $priceAndVat
     * @return float
     */
    public function getPriceTotal($priceAndVat = false): float
    {
        if (is_bool($priceAndVat)) {
            // price vat or price an vat
            $result = $this->getPriceVat($priceAndVat);
            $result += $this->getPaymentPriceVat($priceAndVat);
            $result += $this->getDeliveryPriceVat($priceAndVat);
        } else {
            // sum default price
            $result = $this->price + $this->payment['price'] + $this->delivery['price'];
        }
        return round($result);
    }
}
