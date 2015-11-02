<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Inflector;
use Cake\Event\Event;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index','view']);
    }

    public function index()
    {
        $this->paginate = [
            'limit' => 5,
            'order' => ['Articles.modified' => 'desc'],
        ];

        $articles = $this->paginate(
        $this->Articles->find("all")
            ->where(['Articles.validate' => 1])
            ->select(['name','description','modified','id','slug'])
        );

        $this->set("articles",$articles);
    }

    public function view($id = null)
    {
        if ($this->request->is('get') == true && is_numeric($id) == true && empty($id) == false)
        {

            $article = $this->Articles->find("all")
                ->where(["Articles.id" => $id])
                ->contain(["Categories"])
                ->select(["Articles.validate","Articles.content","Articles.name","Categories.name","Articles.modified","Articles.id","Articles.slug"])
                ->first();

            if (empty($article))
            {
                return $this->redirect(['controller' => 'articles']);
            }

            if ($article->validate == 1)
            {
                // Article validé
                $this->set('article',$article);

            } elseif ($this->request->session()->read("Auth.User.role") == 'Admin'){

                // Article non validé mais utilistateur admin
                $this->set('article',$article);
            } else {

                // Article non validé et utilisateur non admin
                return $this->redirect(['controller' => 'articles']);
            }

        } else {
            return $this->redirect(['controller' => 'articles']);
        }

    }

    public function add()
    {
        if ($this->request->session()->read("Auth.User.role") != 'Admin')
        {
            $this->Flash->error("Action non autorisée");
            return $this->redirect(["controller" => "articles"]);
        }

        $article = $this->Articles->newEntity();

        if ($this->request->is('post'))
        {
            $this->request->data["slug"] = strtolower(Inflector::slug($this->request->data["name"]));
            $article = $this->Articles->patchEntity($article,$this->request->data);

            if ($this->Articles->save($article))
            {
                $this->Flash->success('Article ajouté');
                return $this->redirect(['controller' => 'articles','action' => 'view',$article->id,$article->slug]);
            } else {
                $this->Flash->error("Une erreur est survenu");
            }

        }

        $categories = $this->Articles->Categories->find("list");
        $this->set("article",$article);
        $this->set("categories",$categories);

    }

    public function admin()
    {
        if ($this->request->session()->read("Auth.User.role") != 'Admin')
        {
            $this->Flash->error("Action non autorisée");
            return $this->redirect(["controller" => "articles"]);
        }

        $this->paginate = [
            'limit' => 5,
            'order' => ['Articles.modified' => 'desc'],
        ];

        $articles = $this->paginate(
        $this->Articles->find("all")
            ->select(['name','modified','id','slug','validate'])
        );

        $this->set("articles",$articles);
    }

    public function delete($id)
    {
        if ((empty($id) == true) || (is_numeric($id) == false) || ($this->request->is('post') == false) || ($this->request->session()->read("Auth.User.role") != 'Admin'))
        {
            return $this->redirect(["controller" => "articles"]);
        }

        $entity = $this->Articles->get($id);

        if ($this->Articles->delete($entity))
        {
            $this->Flash->success('Article effacé');
            return $this->redirect($this->referer());
        } else {
            $this->Flash->error('Une erreur est survenu');
            return $this->redirect($this->referer());
        }

    }

    public function validate($id)
    {
        if ((empty($id) == true) || (is_numeric($id) == false) || ($this->request->is('post') == false) || ($this->request->session()->read("Auth.User.role") != 'Admin'))
        {
            return $this->redirect(["controller" => "articles"]);
        }

        $entity = $this->Articles->get($id);

        if ($entity->validate)
        {
            $entity->validate = 0;
        } else {
            $entity->validate = 1;
        }

        if ($this->Articles->save($entity))
        {
            $this->Flash->success('Action reussi');
            return $this->redirect($this->referer());
        } else {
            $this->Flash->error('Une erreur est survenu');
            return $this->redirect($this->referer());
        }

    }

}
