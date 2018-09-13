<?php declare(strict_types=1);

namespace OrderControl;


/**
 * Interface IOrderControl
 *
 * @author  geniv
 * @package OrderControl
 */
interface IOrderControl
{
    const
        CURRENCY_CZK = 'CZK',
        CURRENCY_EUR = 'EUR',
        CURRENCY_USD = 'USD',
        CURRENCY_GBP = 'GBP';


    /**
     * Set price.
     *
     * @param float $price
     * @return IOrderControl
     */
    public function setPrice(float $price): IOrderControl;


    /**
     * Set vat.
     *
     * @param float $vat
     * @return IOrderControl
     */
    public function setVat(float $vat): IOrderControl;


    /**
     * Set currency.
     *
     * @param string $currency
     * @return IOrderControl
     */
    public function setCurrency(string $currency): IOrderControl;


    /**
     * Get currency.
     *
     * @return string
     */
    public function getCurrency(): string;


    /**
     * Get price.
     *
     * @return float
     */
    public function getPrice(): float;


    /**
     * Get vat.
     *
     * @return float
     */
    public function getVat(): float;


    /**
     * Get price vat.
     *
     * @param bool $priceAndVat
     * @return float
     */
    public function getPriceVat($priceAndVat = false): float;


    /**
     * Get price total.
     *
     * @param bool $priceAndVat
     * @return float
     */
    public function getPriceTotal($priceAndVat = false): float;


    /**
     * Set payment.
     *
     * @param string $name
     * @param float  $price
     * @param float  $vat
     * @return IOrderControl
     */
    public function setPayment(string $name, float $price, float $vat): IOrderControl;


    /**
     * Get payment name.
     *
     * @return string
     */
    public function getPaymentName(): string;


    /**
     * Get payment price.
     *
     * @return float
     */
    public function getPaymentPrice(): float;


    /**
     * Get payment price vat.
     *
     * @param bool $priceAndVat
     * @return float
     */
    public function getPaymentPriceVat($priceAndVat = false): float;


    /**
     * Set delivery.
     *
     * @param string $name
     * @param float  $price
     * @param float  $vat
     * @return IOrderControl
     */
    public function setDelivery(string $name, float $price, float $vat): IOrderControl;


    /**
     * Get delivery name.
     *
     * @return string
     */
    public function getDeliveryName(): string;


    /**
     * Get delivery price.
     *
     * @return float
     */
    public function getDeliveryPrice(): float;


    /**
     * Get delivery price vat.
     *
     * @param bool $priceAndVat
     * @return float
     */
    public function getDeliveryPriceVat($priceAndVat = false): float;
}
