<?php

/**
 * This is the model class for table "request".
 *
 * The followings are the available columns in table 'request':
 * @property string $request_id
 * @property string $request_saying
 * @property string $request_response
 * @property string $request_datetime
 */
class Request extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'request';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('request_saying, request_response, request_datetime', 'required'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('request_id, request_saying, request_response, request_datetime', 'safe', 'on' => 'search'),
        );
    }

    protected function beforeSave() {
        if ($this->isNewRecord) {
            $this->request_datetime = new CDbExpression("NOW()");
        }

        return parent::beforeSave();
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'request_id' => 'Request',
            'request_saying' => 'Saying',
            'request_response' => 'Response',
            'request_datetime' => 'Date/time requested',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('request_id', $this->request_id, true);
        $criteria->compare('request_saying', $this->request_saying, true);
        $criteria->compare('request_response', $this->request_response, true);
        $criteria->compare('request_datetime', $this->request_datetime, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Request the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
