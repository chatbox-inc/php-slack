<?php
namespace Chatbox\PhpSlack;


class Client
{
    protected $token;

    /**
     * Client constructor.
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    protected function client():\GuzzleHttp\Client{
        $config = [
            "base_uri" => "https://slack.com/api/"
        ];

        return new \GuzzleHttp\Client($config);
    }

    /**
     * @param $url
     * @param array $query
     * @return Result
     */
    public function sendGet($url,$query=[]):Result{
        $response = $this->client()->get($url,[
            "params" => $query,
            "headers" => [
                "Authorization" => "Bearer {$this->token}"
            ]
        ]);
        return new Result($response);
    }

    public function sendPost($url,$body):Result{
        $response = $this->client()->get($url,[
            "params" => $body,
            "headers" => [

            ]
        ]);
        return new Result($response);
    }
}
