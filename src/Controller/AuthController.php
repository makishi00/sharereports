<?php
namespace App\Controller;


use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;

class AuthController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }


    public function login()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

/**
最初にコメントを外してユーザー登録をしてください。
**/
//        $usersTbl = TableRegistry::get('users');
//        $user = $usersTbl->newEntity();
//        $user->us_mail = 'architshin@websarva.com';
//        $user->us_name = '齊藤新三';
//        $user->us_password = (new DefaultPasswordHasher)->hash('hogehoge');
//        $user->us_auth = 1;
//        $usersTbl->save($user);

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect('Sharereports/index');
            }
            $this->Flash->error('メールアドレスかパスワードが間違ってます。');
        }
    }

    public function logout()
    {
        $this->Flash->success('ログアウトしました。');
        return $this->redirect($this->Auth->logout());
    }
}