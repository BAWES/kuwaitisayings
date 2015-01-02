<?php

class ApiController extends Controller {

    /**
     * Get MD5 Hash of Last Updated
     */
    public function actionLastUpdated() {
        header("Content-Type: application/json; charset=utf-8");
        
        if(isset($_POST["password"])){
            if($_POST["password"] != "active") die("Invalid Password");
        }else die("Not authorized");

        $criteria = new CDbCriteria();
        $criteria->order = "saying_datetime DESC";
        $criteria->limit = 1;
        $lastSaying = Saying::model()->find($criteria);

        $output = md5($lastSaying->saying_datetime);

        echo json_encode($output, JSON_UNESCAPED_UNICODE);
    }
    
    /**
     * Sends all sayings
     */
    public function actionSayings() {
        header("Content-Type: application/json; charset=utf-8");
        
        if(isset($_POST["password"])){
            if($_POST["password"] != "active") die("Invalid Password");
        }else die("Not authorized");

        $criteria = new CDbCriteria();
        $criteria->order = "saying_datetime DESC";
        $sayings = Saying::model()->findAll($criteria);

        $sayingOutput = array();
        foreach ($sayings as $saying) {
            //populate saying categories
            $categoryArray = array();
            $categories = $saying->categories;
            if($categories){
                foreach ($categories as $category) {
                    $categoryArray[$category->category_id] = $category->category_name;
                }
            }else $categoryArray = '';


            $sayingOutput[$saying->saying_id] = array('saying' => $saying->saying_saying,
                'response' => $saying->saying_response,
                'categories' => $categoryArray);
        }

        echo json_encode($sayingOutput, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Sends all possible categories
     */
    public function actionSuggestion() {
        header("Content-Type: application/json; charset=utf-8");
        if(isset($_POST["saying"]) && isset($_POST["response"])){
            $request = new Request();
            $request->request_saying = $_POST["saying"];
            $request->request_response = $_POST["response"];
            $request->request_datetime = new CDbExpression("NOW()");
            
            if($request->save()){
                $output = "success";
            }else $output = print_r($request->errors,false);
        }else $output = "fail";
        
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Sends all possible categories
     */
    public function actionCategories() {
        header("Content-Type: application/json; charset=utf-8");
        
        if(isset($_POST["password"])){
            if($_POST["password"] != "active") die("Invalid Password");
        }else die("Not authorized");

        $criteria = new CDbCriteria();
        $criteria->order = "category_sort ASC";
        $categories = Category::model()->findAll($criteria);

        $categoryOutput = array();
        foreach ($categories as $category) {
            $categoryOutput[$category->category_id] = $category->category_name;
        }

        echo json_encode($categoryOutput, JSON_UNESCAPED_UNICODE);
    }

}
