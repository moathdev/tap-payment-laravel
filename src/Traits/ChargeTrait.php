<?php

namespace Moathdev\Tap\Traits;

use BadMethodCallException;

trait ChargeTrait
{
    /**
     * Retrieves the details of a charge that has previously been created. Supply the unique charge id that was returned from your
     * previous request, and Tap will return the corresponding charge information. The same information is returned when creating the charge.
     *
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
     *
     * @see https://www.tap.company/sa/en/developers > Carages > Create a Charge
     *
     *  Parameters :
     * - amount | number | required
     * - currency | string| (AED, BHD, EGP, EUR, GBP, KWD, OMR, QAR, SAR, USD) | required
     * - threeDSecure | boolean | "True - recommended"  | optional
     * - save_card | boolean | optional
     * - description | string | optional
     * - statement_descriptor | string | optional
     * - metadata| array[string] | optional
     * - reference| array[string] | optional
     * - receipt| array[string] | optional
     * - customer| array[string] | required
     * - source| array[string] | required
     * - airline| array[string] | optional
     * - destinations| array[string] | optional
     * - application| array[string] | optional
     * - redirect | array[string] | optional
     * - merchant | array[string] | optional
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

    /**
     * Updates the specified charge by setting the values of the parameters passed. Any parameters not provided will be left unchanged.
     * This request accepts only the description, metadata and receipt arguments.
     *
     * @see https://www.tap.company/sa/en/developers > Carages > Update a Charge
     *
     *  Parameters :
     * - description | string | optional
     * - receipt | string | optional
     * - metadata |  array[string] | optional
     * - airline | array[string] | optional
     * - customers | array[string] | optional
     * - charges | array[string] | optional
     * - starting_after | array[string] | optional
     * - payout | array[string] | optional
     * @param array $parameters
     * @return object
     */
    public function UpdateCharge($parameters = [])
    {
        if (!array_key_exists('charge_id', $parameters)) {
            throw new BadMethodCallException('Parameter required missing : charge_id');
        }

        return $this->post('/charges/', $parameters);
    }

    /**
     * Returns a list of charges you’ve previously created.
     * The charges are returned in sorted order, with the most recent charges appearing first.
     *
     * @see https://www.tap.company/sa/en/developers > Carages > List all Charges
     *
     *  Parameters :
     * - period | array[string] | optional
     * - status | string | optional
     * - sources |  array[string] | optional
     * - payment_methods | array[string] | optional
     * - customers | array[string] | optional
     * - charges | array[string] | optional
     * - starting_after | array[string] | optional
     * - limit | integer | optional
     * @param array $parameters
     * @return object
     */
    public function getAllCharges($parameters = [])
    {
        return $this->post('/charges/list/', $parameters);
    }
}
