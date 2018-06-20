<?php
/**
 * Created by IntelliJ IDEA.
 * User: david
 * Date: 20/05/2018
 * Time: 21:35
 */

namespace App\EventSubscriber;

use App\Controller\SessionAuthenticatedController;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;


class SessionSubscriber implements EventSubscriberInterface
{

    public function __construct()
    {

    }

    public function onKernelController(FilterControllerEvent $event)
    {
        $controller = $event->getController();

        /*
         * $controller passed can be either a class or a Closure.
         * This is not usual in Symfony but it may happen.
         * If it is a class, it comes in array format
         */
        if (!is_array($controller)) {
            return;
        }

        if ($controller[0] instanceof SessionAuthenticatedController)
        {

                $session = $event->getRequest()->getSession();
                $email = $session->get("email");
                if (!($session->get("email") != null && $session->get("email") != ""))
                {
                    $connected = false;
                    throw new AccessDeniedHttpException('Veuillez vous connectez');
                } else
                    $connected = true;
        }
    }
    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::CONTROLLER => 'onKernelController',
        );
    }
}