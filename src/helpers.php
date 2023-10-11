<?php


use Illuminate\Http\Request;

if(!function_exists("formatStringWithAssociativeArray")){
    /**
     * 使用关联数组替换字符串模板中的占位符。
     *
     * @param  string $template 字符串模板，其中的占位符用大括号 {} 包围
     * @param  array $replacements 用于替换占位符的关联数组
     * @return string 替换后的字符串
     */
    function formatStringWithAssociativeArray(string $template, array $replacements): string
    {
        $keysWithBraces = array_map(function($key) {
            return '{' . $key . '}';
        }, array_keys($replacements));

        return str_replace($keysWithBraces, array_values($replacements), $template);
    }
}

if(!function_exists("getFirstPublicIp")){
    /**
     * 获取第一个公网 IP 地址。
     *
     * @param Request $request
     * @return string|null
     */
    function getFirstPublicIp(Request $request): ?string
    {
        $xForwardedFor = $request->header('X-Forwarded-For');
        if ($xForwardedFor) {
            $ipAddresses = explode(',', $xForwardedFor);
        } else {
            // 如果 X-Forwarded-For 头部不存在，使用 $request->ip() 获取 IP 地址
            $ipAddresses = [$request->ip()];
        }
        foreach ($ipAddresses as $ip) {
            $ip = trim($ip);  // 移除空格
            // 检查 IP 地址是否是公网地址
            if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                return $ip;  // 返回第一个公网 IP 地址
            }
        }
        return null;  // 如果没有找到公网 IP 地址，返回 null
    }
}