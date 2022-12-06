<?php

declare(strict_types=1);

namespace App\Controller;
use Cake\Event\Event;
use Cake\Event\EventInterface;
use Cake\View\JsonView;


/**
 * Notes Controller
 *
 * @property \App\Model\Table\NotesTable $Notes
 * @method \App\Model\Entity\Note[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NotesController extends AppController
{


    public function viewClasses(): array
    {
        return [JsonView::class];
    }

    public function notes(){

    }

    public function index()
    {

        $notes = $this->Notes->find('all')->all();

        $this->set(['notes' => $notes]);
        $this->viewBuilder()->setOption('serialize', true);
    //    $this->RequestHandler->renderAs($this, 'json');


    }

    /**
     * View method
     *
     * @param string|null $id Note id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $note = $this->Notes->get($id);
        $this->set('note', $note);
        $this->viewBuilder()->setOption('serialize', ['note']);
     //   $this->RequestHandler->renderAs($this, 'json');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
//        var_dump($_POST);
//        die();

        $this->request->allowMethod(['post','put','get']);
        $note = $this->Notes->newEntity($this->request->getData());
       // pr($this->request->getData());die();
        if ($this->Notes->save($note)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'note' => $note,
        ]);
        $this->viewBuilder()->setOption('serialize', ['note', 'message']);
//        $this->response->type('json');
//        $this->response->body(json_encode($note));
        $this->RequestHandler->renderAs($this, 'json');

    }

    /**
     * Edit method
     *
     * @param string|null $id Note id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $note = $this->Notes->get($id);
        $note = $this->Notes->patchEntity($note, $this->request->getData());
        if ($this->Notes->save($note)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'recipe' => $note,
        ]);
        $this->viewBuilder()->setOption('serialize', ['note', 'message']);
        $this->RequestHandler->renderAs($this, 'json');
    }


    /**
     * Delete method
     *
     * @param string|null $id Note id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
       // var_dump("hello delete"); exit();
        $this->request->allowMethod(['delete']);
        $note = $this->Notes->get($id);
        $message = 'Deleted';
        if (!$this->Notes->delete($note)) {
            $message = 'Error';
        }
        $this->set('message', $message);
        $this->viewBuilder()->setOption('serialize', ['message']);
        $this->RequestHandler->renderAs($this, 'json');
    }
}
