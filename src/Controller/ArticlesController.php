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
                ->select(["Articles.content","Articles.name","Categories.name","Articles.modified","Articles.id","Articles.slug"])
                ->first();

            $this->set('article',$article);

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

}
