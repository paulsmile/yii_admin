<?php
/**
 * 常用工具类
 * Class Tool
 */

class Tool {
    /**
     * ip转换成正整数
     *
     * ip2long 有很多ip会转换成有负数的
     * @param $ip
     * @return number
     */
    static function ip2number($ip){
        return bindec(decbin(ip2long($ip)));
    }

    /**
     * 将整数转换成ip
     * @param int $ip_n
     * @return string
     */
    static function number2ip($ip_n){
        return long2ip($ip_n);
    }

    /**
     * 生成6位随机密码干扰字符串
     * @return string
     */
    static function salt(){
        return substr(uniqid(rand()), -6);
    }

    /**
     * 生成密文密码
     * @param $pwd 密码
     * @param $salt 干扰字符
     * @return string
     */
    static function pwdSalt($pwd, $salt){
        return md5(md5($pwd).$salt);
    }

    /**
     * 检查密码是否正确
     * @param $pwd 明文密码
     * @param $pwdSalt 加密后的密码
     * @param $salt 干扰字符
     * @return bool
     */
    static function pwdCheck($pwd, $pwdSalt, $salt){
        return self::pwdSalt($pwd,$salt)==$pwdSalt;
    }

    /**
     * 获取公共配置文件的值
     * @param $key
     * @return mixed
     */
    static function main($key){
        return Yii::app()->params['main'][$key]['value'];
    }

    /**
     * utf-8 字符串截取
     * @param $string
     * @param $length
     * @param string $etc 多余的字符串显示 ...
     * @return string
     */
    static function truncate($string, $length, $etc = '...'){
        $result = '';
        $string = html_entity_decode(trim(strip_tags($string)), ENT_QUOTES, 'UTF-8');
        $str_len = strlen($string);
        for ($i = 0; (($i < $str_len) && ($length > 0)); $i++)
        {
            if ($number = strpos(str_pad(decbin(ord(substr($string, $i, 1))), 8, '0', STR_PAD_LEFT), '0'))
            {
                if ($length < 1.0)
                {
                    break;
                }
                $result .= substr($string, $i, $number);
                $length -= 1.0;
                $i += $number - 1;
            }
            else
            {
                $result .= substr($string, $i, 1);
                $length -= 0.5;
            }
        }
        $result = htmlspecialchars($result, ENT_QUOTES, 'UTF-8');
        if ($i < $str_len)
        {
            $result .= $etc;
        }
        return $result;
    }



}