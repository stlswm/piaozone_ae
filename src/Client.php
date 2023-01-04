<?php

namespace stlswm\PiaoZoneAe;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use stlswm\PiaoZoneAe\Request\Req;

/**
 * Class PiaoZoneAe
 * @package stlswm\PiaoZoneAe
 */
class Client
{
    /**
     * @var string
     */
    private static string $domain = 'https://api.piaozone.com';
    /**
     * @var string
     */
    private static string $domainTest = 'https://api-dev.piaozone.com/test';
    /**
     * @var string 客户端id
     */
    public string $clientId = '';
    /**
     * @var string 客户端秘钥
     */
    public string $secret = '';

    /**
     * @var string 请求加密秘钥
     */
    public string $encryptKey = '';

    /**
     * @var bool
     */
    private bool $isTest = false;

    /**
     * @var string 接口请求凭证
     */
    private string $token = '';


    /**
     * 设置为测试用客户端
     * @return $this
     */
    public function asTest(): Client
    {
        $this->isTest = true;
        return $this;
    }

    /**
     * @param  string  $token
     */
    public function setToken(string $token)
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * 加密请求体
     * @param  string  $body
     * @return string
     * @throws Exception
     */
    private function encryptBody(string $body): string
    {
        if (strlen($this->encryptKey) != 16) {
            throw new Exception('错误的加密秘钥');
        }
        $bodyEncrypt = openssl_encrypt($body, 'AES-128-ECB', $this->encryptKey, OPENSSL_RAW_DATA);
        return base64_encode($bodyEncrypt);
    }

    /**
     * 请求接口
     * @param  string  $router
     * @param  ?Req    $req
     * @param  array   $query
     * @param  bool    $encrypt
     * @return string
     * @throws GuzzleException
     * @throws Exception
     */
    public function request(string $router, ?Req $req, array $query = [], bool $encrypt = false): string
    {
        $api = self::$domain;
        if ($this->isTest) {
            $api = self::$domainTest;
        }
        if (strpos($router, '/') !== 0) {
            $router = '/'.$router;
        }
        $body = json_encode($req);
        if ($encrypt) {
            $body = $this->encryptBody($body);
        }
        $client = new \GuzzleHttp\Client(['base_uri' => $api]);
        try {
            $response = $client->request('POST', $router, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'query'   => $query,
                'body'    => $body,
            ]);
            return $response->getBody()->getContents();
        } catch (Exception $e) {
            throw new Exception('网络异常：'.$e->getResponse()->getBody()->getContents());
        }
    }

    /**
     * @param  string  $clientId
     * @param  string  $secret
     * @param  string  $encryptKey
     * @return Client
     */
    public static function newClient(string $clientId, string $secret, string $encryptKey): Client
    {
        $client = new Client();
        $client->clientId = $clientId;
        $client->secret = $secret;
        $client->encryptKey = $encryptKey;
        return $client;
    }
}