<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * User Controller
 *
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     *
     */
    public function index() {
        //to retrieve all users, need just one line
        $users = $this->set('users', $this->Users->find('all'));
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add(){
 
        $user = $this->Users->newEntity();
        //check if it is a post request
        //this way, we won't have to do if(!empty($this->request->data))
        if ($this->request->is('post')){
            $user = $this->Users->patchEntity($user,$this->request->getData());
            
            //save new user
            if ($this->Users->save($user)){
                
                //set flash to user screen
                $this->Flash->success('User was added.');
                //redirect to user list
                $this->redirect(array('action' => 'index'));
                 
            }else{
                //if save failed
                $this->Flash->error('Unable to add user. Please, try again.');
                 
            }
        }
        $this->set('post',$user);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit() {
        //get the id of the user to be edited
        $id = $this->request->params['pass'][0];
        //set the user id
        $this->Users->id = $id;
        //check if a user with this id really exists
        if( $this->Users->exists($id)){
            if( $this->request->is(array('post', 'put')) ){
                $actualUser= $this->Users->get($id);
                $modifiedUser = $this->Users->newEntity();
                $modifiedUser = $this->Users->patchEntity($modifiedUser,$this->request->getData());
                $actualUser = $modifiedUser;
                $actualUser->id=$id;

                //save user
                if( $this->Users->save($actualUser)){
                    //set to user's screen
                    $this->Flash->success('User was editted.');
                     
                    //redirect to user's list
                    $this->redirect(array('action' => 'index'));
                     
                }else{
                    $this->Flash->error('Unable to edit user. Please, try again.');
                }
                 
            }else{

                //we will read the user data
                //so it will fill up our html form automatically
                $user = $this->Users->get($id);
                $this->set('user',$user);

            
            }}else{
            //if not found, we will tell the user that user does not exist
            $this->Flash->error('The user you are trying to edit does not exist.');
            $this->redirect(array('action' => 'index'));
                 
            //or, since it we are using php5, we can throw an exception
            //it looks like this
            //throw new NotFoundException('The user you are trying to edit does not exist.');
        }
         
     
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete() {
        $id = $this->request->params['pass'][0];
        $deleteUser= $this->Users->get($id);
                if (!$deleteUser) {
                throw new NotFoundException(__('Invalid post'));

                }

                if($this->request->is('get')){

                    if ($this->Users->delete($deleteUser)) {

                        $this->Flash->success(__('The post has been deleted.'));

                    } else {

                        $this->Flash->error(__('The post could not be deleted. Please, try again.'));

                    }
                }

                return $this->redirect(array('action' => 'index'));

            }
}
