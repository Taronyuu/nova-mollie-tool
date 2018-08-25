<?php

namespace Taronyuu\NovaMollieTool\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mollie\Api\MollieApiClient;
use Mollie\Api\Resources\PaymentCollection;

class MollieController extends Controller {

    /**
     * index function.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Mollie\Api\Exceptions\ApiException
     * @throws \Mollie\Api\Exceptions\IncompatiblePlatform
     */
    public function index(Request $request)
    {
        $mollie = new MollieApiClient();
        $mollie->setApiKey(config('services.nova_mollie_tool.api_key'));

        $limit = config('services.nova_mollie_tool.request.limit');
        $next = $request->get('url');
        $from = null;
        if($next) {
            $url = parse_url($next);
            $query = $url['query'];
            $list  = explode('&', $query);
            foreach ($list as $value) {
                [$key, $value] = explode('=', $value);
                if($key === 'from') {
                    $from = $value;
                    break;
                }
            }
        }

        $payments = $mollie->payments->page( $from, $limit );

        return response()
            ->json([
                'payments' => $payments,
                'next'     => $payments->_links->next->href ?? null,
                'prev'     => $payments->_links->previous->href ?? null,
            ]);
    }

}