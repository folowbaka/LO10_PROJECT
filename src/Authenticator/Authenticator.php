<?php

namespace App\Authenticator;

use Portier\Client\RedisStore;
use Portier\Client\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Redis;


class Authenticator extends Controller
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
        $this->redis= new Redis();
        $this->redis->pconnect('127.0.0.1', 6379);
        $this->portier = new Client(
            new RedisStore( $this->redis),
            'http://lo10dev/verify'
        );
    }

    public function auth(Request $req) : Response
    {
        $email = $req->request->get('email');
        $authUrl = $this->portier->authenticate($email);


        $response = new Response(
            'Content',
            Response::HTTP_OK,
            array('content-type' => 'text/html')
        );

        $response
            ->setStatusCode(303)
            ->headers->set('Location', $authUrl);

        return $response;
    }

    public function verify(Request $req) : Response
    {
        try {
            $email = $this->portier->verify($req->get('id_token'));
            $response = new Response(
                'Content',
                Response::HTTP_OK,
                array('content-type' => 'text/html')
            );

            $response
                ->setStatusCode(200)
                ->headers->set('Content-Type', 'text/html; charset=utf-8');

            $response->setContent($email);

            return $response;
        }catch (\Exception $e) {
            print_r($e->getMessage());
            $response = new Response(
                'Content',
                Response::HTTP_INTERNAL_SERVER_ERROR,
                array('content-type' => 'text/html')
            );
            $response->setContent($e);
            return $response;
        }

    }
}