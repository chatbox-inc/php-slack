<?php
namespace Chatbox\PhpSlack;


use Psr\Http\Message\ResponseInterface;

class Result
{
    public $response;

    protected $contents;
    /**
     * Client constructor.
     * @param $token
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    public function getBody():array {
        if(!$this->contents){
            $this->contents =  $this->response->getBody()->getContents();
        }
        return json_decode($this->contents,true);
    }

    public function isOk():bool {
        return $this->getBody()["ok"];
    }

    public function getResult($key,$default=null) {
        return $this->getBody()[$key] ?? $default;
    }
}
