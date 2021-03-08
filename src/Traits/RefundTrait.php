<?php

namespace Moathdev\Tap\Traits;

use BadMethodCallException;

trait RefundTrait
{
    /**
     * Retrieves the details of an existing refund.
     *
     * @see https://www.tap.company/sa/en/developers > Carages > Retrieve a Refund
     *
     *  Parameters :
     * - refund_id string | required
     *
     * @param array $parameters
     * @return object
     */
    public function getRefund($parameters = [])
    {
        if (!array_key_exists('refund_id', $parameters)) {
            throw new BadMethodCallException('Parameter required missing : refund_id');
        }

        return $this->get('/refunds/' . $parameters['refund_id'], $parameters);
    }

    /**
     * When you create a new refund, you must specify a charge to create it on.
     * Creating a new refund will refund a charge that has previously been created but not yet refunded. Funds will be refunded to the card that was originally charged.
     * You can optionally refund only part of a charge. You can do so as many times as you wish until the entire charge has been refunded.
     * Once entirely refunded, a charge can't be refunded again. This method will throw an error when called on an already-refunded charge, or when trying to refund more money than is left on a charge.
     *
     * @see https://www.tap.company/sa/en/developers > Carages > Create a Refund
     *
     *  Parameters :
     * - charge_id | string | required
     * - amount | number | required
     * - currency | string | required
     * - description | string | optional
     * - reason | string | required
     * - reference | string | optional
     * - metadata | string | optional
     * - post | string | optional
     *
     * @param array $parameters
     * @return object
     */
    public function createRefund($parameters = [])
    {
        if (!array_key_exists('charge_id', $parameters)
            && !array_key_exists('amount', $parameters)
            && !array_key_exists('currency', $parameters)
            && !array_key_exists('reason', $parameters)
        ) {
            throw new BadMethodCallException('Parameter required missing : charge_id or amount or currency or reason');
        }

        return $this->post('/refunds/', $parameters);
    }

    /**
     * Updates the specified refund by setting the values of the parameters passed. Any parameters not provided will be left unchanged.
     * This request only accepts metadata as an argument.
     *
     * @see https://www.tap.company/sa/en/developers > Carages > Update a Refund
     *
     *  Parameters :
     * - metadata | array[string] | optional
     * @param array $parameters
     * @return object
     */
    public function UpdateRefund($parameters = [])
    {
        if (!array_key_exists('refund_id', $parameters)) {
            throw new BadMethodCallException('Parameter required missing : refund_id');
        }

        return $this->put('/refunds/', $parameters);
    }

    /**
     * Returns a list of all refunds you’ve previously created. The refunds are returned in sorted order, with the most recent refunds appearing first.
     *
     * @see https://www.tap.company/sa/en/developers > Carages > List all Refunds
     *
     *  Parameters :
     * - period | array[string] | optional
     * - refunds | string | optional
     * - charges |  array[string] | optional
     * - starting_after | string | optional
     * - limit | integer | optional
     * @param array $parameters
     * @return object
     */
    public function getAllRefunds($parameters = [])
    {
        return $this->post('/refunds/list', $parameters);
    }

}