<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['logout','add']);
    }

    public function login()
    {
        if ($this->request->is("post"))
        {
            $user = $this->Auth->identify();

            if ($user)
            {
                $this->Auth->setUser($user);
                $this->Flash->success("Connection reussi.");
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error("Nom d'utilisateur ou mot de passe incorrect, essayez à nouveau.");
            }

        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function add()
    {
        $secret = "6LdDWQ0TAAAAAB8AHV2REv6E5kdMRMqcD3CZwwud";
        $recaptcha = new \ReCaptcha\ReCaptcha($secret);

        $user = $this->Users->newEntity();

        if ($this->request->is("post"))
        {

            $resp = $recaptcha->verify($this->request->data["g-recaptcha-response"], $this->request->clientIp());

            if ($resp->isSuccess())
            {
                $this->request->data["role"] = "User";
                $this->request->data["gravatar"] = $this->request->data["mail"];

                $user = $this->Users->patchEntity($user,$this->request->data);

                if ($this->Users->save($user))
                {
                    $this->Flash->success("L'utilisateur a été sauvegardé");
                    return $this->redirect(['controller' => 'articles']);
                }

                $this->Flash->error("Impossible d'ajouter l'utilisateur.");

            } else {
                $errors = $resp->getErrorCodes();
                $this->Flash->error("Captcha non valide.");
            }

        }

        $this->set("user",$user);
    }

}
