<?php
/**
 * User: tongWZ
 * Date: 2022/12/21
 * Time: 11:03
 */
namespace App\Http\Common;

use Illuminate\Http\JsonResponse;

class CommonJson
{
    /**
     * @notes: 返回处理结果
     * @param int $code
     * @param string $msg
     * @param array $data
     * @return JsonResponse
     * @author tongwz
     * @date: 2022年12月21日11:27:05
     */
    public static function jsonReturn(int $code = 0, string $msg = "", array $data = []): JsonResponse
    {
        $res = [
            "code" => $code,
            "msg" => $msg,
            "data" => $data,
        ];
        return JsonResponse::create($res);
    }
}
