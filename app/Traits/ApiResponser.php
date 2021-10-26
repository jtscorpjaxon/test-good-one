<?php
/**
 * Author Maxamadjonov Jaxongir.
 * https://github.com/jtscorpjaxon
 * Date: 12.08.2021
 * Time: 11:06
 */

namespace App\Traits;

/*
|--------------------------------------------------------------------------
| Api Responser Trait
|--------------------------------------------------------------------------
|
| This trait will be used for any response we sent to clients.
|
*/

use App\Http\Resources\Api\PaginationResourceCollection;
use Illuminate\Http\JsonResponse;

trait ApiResponser
{
    /**
     * @param string $message
     * @param mixed|null $data
     * @param mixed|null $append
     * @param int $code
     * @return JsonResponse
     */
    protected function success( mixed $data = null,  int $code = 200): JsonResponse
    {
        $resp = [
            'result' => $data ?? new \stdClass(),
        ];

        return response()->json($resp, $code);
    }

    /**
     * @param string $message
     * @param mixed|null $errors
     * @param int $code
     * @return JsonResponse
     */
    protected function error(int $code = 404): JsonResponse
    {
        return response()->json([
            'result' => new \stdClass(),
        ], $code);
    }
}
