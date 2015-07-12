<?php

namespace Sd\amvalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SdamvalBundle:Default:dashboard.html.twig');
    }

    public function messagesAction()
    {
        return $this->render('SdamvalBundle:Default:messages.html.twig');
    }

    public function loginAction()
    {
        return $this->render('SdamvalBundle:Default:login.html.twig');
    }

    public function userAction()
    {
        return $this->render('SdamvalBundle:Default:user-account.html.twig');
    }

    public function galleryAction()
    {
        return $this->render('SdamvalBundle:Default:gallery.html.twig');
    }

    public function changepassAction()
    {
        return $this->render('SdamvalBundle:Default:password.html.twig');
    }

    public function kalaAction()
    {
        return $this->render('SdamvalBundle:Default:kalas.html.twig');
    }

    public function helpAction()
    {
        return $this->render('SdamvalBundle:Default:help.html.twig');
    }

    public function recycleAction()
    {
        return $this->render('SdamvalBundle:Default:recycle.html.twig');
    }

    public function subsetAction()
    {
        return $this->render('SdamvalBundle:Default:subset.html.twig');
    }
    public function login2Action()
    {
        return $this->render('SdamvalBundle:Default:login2.html.twig');
    }
    public function signupAction()
    {
        return $this->render('SdamvalBundle:Default:signup.html.twig');
    }
    public function homeAction()
    {
        return $this->render('SdamvalBundle:Default:index.html.twig');
    }
}
