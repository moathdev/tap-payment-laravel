<?php

namespace Moathdev\Tap\Traits;

use BadMethodCallException;

trait ChargeTrait
{
    /**
     * Retrieves the details of a charge that has previously been created. Supply the unique charge id that was returned from your
     * previous request, and Tap will return the corresponding charge information. The same information is returned when creating
     * the charge.
     * @see https://www.tap.company/sa/en/developers > Carages > Retrieve a Charge
     *
     *  Parameters :
     * - charge_id string | required
     *
     * @param array $parameters
     * @return object
     */
    public function getCharge($parameters = [])
    {
        if (!array_key_exists('charge_id', $parameters)) {
            throw new BadMethodCallException('Parameter required missing : charge_id');
        }

        return $this->get('/charges/'.$parameters['charge_id'], $parameters);
    }

    /**
     * To charge a credit card or debit card (Knet, mada, Visa, MasterCard) or an existing authorized transactions, you create a charge request. If your
     * API key is in test mode, the card won't actually be charged, though everything else will occur as if in live mode.
     * (Tap assumes that the charge would have completed successfully).
     * @see https://www.tap.company/sa/en/developers > Carages > Create a Charge
     *
     *  Parameters :
     * - amount | number | required
     * - currency | string| (AED, BHD, EGP, EUR, GBP, KWD, OMR, QAR, SAR, USD) | required
     * - threeDSecure | boolean | "True - recommended"  | optional
     * - save_card | boolean | optional
     * - description | string | optional
     * - statement_descriptor | string | optional
     * - metadata| object | optional
     * - reference| object | optional
     * - receipt| object | optional
     * - customer| object | required
     * - source| object | required
     * - airline| object | optional
     * - destinations| object | optional
     * - application| object | optional
     * - redirect | object | optional
     * - merchant | object | optional
     * @param array $parameters
     * @return object
     */
    public function createCharge($parameters = [])
    {
        if (!array_key_exists('amount', $parameters)
            && !array_key_exists('currency', $parameters)
            && !array_key_exists('customer', $parameters)
            && !array_key_exists('source', $parameters)
        ) {
            throw new BadMethodCallException('Parameter required missing : amount or currency or customer or source');
        }

        return $this->post('/charges/', $parameters);
    }
}
