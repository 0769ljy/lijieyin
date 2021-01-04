<?php


namespace lijieying\Wechat;


class WechatOpenid
{
    //设置配置信息
    protected static $appid = "wx9498329829181094";

    protected static $secret = "845c4e9e3e08431419b2702a71ce5941";

    protected static $grant_type = "authorization_code";


    /**
     * 获取session_key和openid
     * @param $code
     * @return bool|string
     */
    public static function getOpenid($code)
    {

        //获取微信小程序传过来的code
        $js_code = $name = $code;
        $curl = curl_init();

        //使用curl_setopt() 设置要获得url地址
        $url = 'https://api.weixin.qq.com/sns/jscode2session?appid=' . self::$appid . '&secret=' . self::$secret . '&js_code=' . $js_code . '&grant_type=' . self::$grant_type;
        curl_setopt($curl, CURLOPT_URL, $url);

        //设置是否输出header
        curl_setopt($curl, CURLOPT_HEADER, false);

        //设置是否输出结果
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        //设置是否检查服务器端的证书
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        //使用curl_exec()将curl返回的结果转换成正常数据并保存到一个变量中
        $data = curl_exec($curl);

        //关闭会话
        curl_close($curl);

        return $data;
    }

}
