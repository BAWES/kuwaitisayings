<?php

class SayingController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('deny', // deny all users
                'users' => array('?'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        
        if(isset($_GET['category'])){
            $categoryId = (int) $_GET['category'];
            
            $relation = new SayingCategory;
            $relation->category_id = $categoryId;
            $relation->saying_id = $id;
            $relation->save();
        }
        
        if(isset($_GET['delete'])){
            $categoryId = (int) $_GET['delete'];
            
            $criteria = new CDbCriteria();
            $criteria->condition = "category_id=$categoryId AND saying_id=$id";
            SayingCategory::model()->find($criteria)->delete();
        }
        
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Saying;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Saying'])) {
            $model->attributes = $_POST['Saying'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->saying_id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Saying'])) {
            $model->attributes = $_POST['Saying'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->saying_id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

    /**
     * Manages all models.
     */
    public function actionIndex() {
        $model = new Saying('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Saying']))
            $model->attributes = $_GET['Saying'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Saying the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Saying::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Saying $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'saying-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
