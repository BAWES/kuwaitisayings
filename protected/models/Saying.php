<?php

/**
 * This is the model class for table "saying".
 *
 * The followings are the available columns in table 'saying':
 * @property integer $saying_id
 * @property string $saying_saying
 * @property string $saying_response
 * @property string $saying_datetime
 *
 * The followings are the available model relations:
 * @property Category[] $categories
 */
class Saying extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'saying';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('saying_saying, saying_response', 'required'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('saying_id, saying_saying, saying_response, saying_datetime', 'safe', 'on' => 'search'),
        );
    }

    protected function beforeSave() {
        if ($this->isNewRecord) {
            $this->saying_datetime = new CDbExpression("NOW()");
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
            'categories' => array(self::MANY_MANY, 'Category', 'saying_category(saying_id, category_id)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'saying_id' => 'Saying',
            'saying_saying' => 'Saying',
            'saying_response' => 'Response',
            'saying_datetime' => 'Date/time Added',
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

        $criteria->compare('saying_id', $this->saying_id);
        $criteria->compare('saying_saying', $this->saying_saying, true);
        $criteria->compare('saying_response', $this->saying_response, true);
        $criteria->compare('saying_datetime', $this->saying_datetime, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Saying the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
