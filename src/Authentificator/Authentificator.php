<?php

namespace App\Authentificator;

use Portier\Client\RedisStore;
use Portier\Client\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Redis;


class Authentificator
{


    private $portier;

    private $redis;
    /**
     * $app->get('/', function($req, JsonResponse $res) {
     * $res = $res
     * ->withStatus(200)
     * ->withHeader('Content-Type', 'text/html; charset=utf-8');
     *
     * $res->getBody()->write(
     * <<<EOF
     * <p>Enter your email address:</p>
     * <form method="post" action="/auth">
     * <input name="email" type="email">
     * <button type="submit">Login</button>
     * </form>
     * EOF
     * );
     *
     * return $res;
     * });
     **/

    public function __construct()
    {
        $this->redis= new Redis;
        $this->redis->pconnect('127.0.0.1', 6379);
        $this->portier = new Client(
            new RedisStore( $this->redis),
            'http://localhost:8000/verify'
        );
    }

    public function auth(Request $req, Response $res) : Response
    {

        $authUrl = $this->portier->authenticate($req->get('email'));

        return $res
            ->setStatusCode(303)
            ->headers->set('Location', $authUrl);
    }

    public function verify(Request $req, Response $res) : Response
    {
        try {
            $email = $this->portier->verify($req->get('id_token'));

            $res = $res
                ->setStatusCode(200)
                ->headers->set('Content-Type', 'text/html; charset=utf-8');

            //$res->getBody()->write();

            return $res;
        }catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }
}