<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $category_id
 * @property string $category_name
 * @property integer $category_sort
 * @property string $category_datetime
 *
 * The followings are the available model relations:
 * @property Saying[] $sayings
 */
class Category extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'category';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('category_name, category_sort', 'required'),
            array('category_sort', 'numerical', 'integerOnly' => true),
            array('category_name', 'length', 'max' => 240),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('category_id, category_name, category_sort, category_datetime', 'safe', 'on' => 'search'),
        );
    }

    protected function beforeSave() {
        if ($this->isNewRecord) {
            $this->category_datetime = new CDbExpression("NOW()");
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
            'sayings' => array(self::MANY_MANY, 'Saying', 'saying_category(category_id, saying_id)'),
            'sayingsCount' => array(self::STAT, 'Saying', 'saying_category(category_id, saying_id)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'category_id' => 'Category',
            'category_name' => 'Name',
            'category_sort' => 'Sort',
            'category_datetime' => 'Date/time Added',
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

        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('category_name', $this->category_name, true);
        $criteria->compare('category_sort', $this->category_sort);
        $criteria->compare('category_datetime', $this->category_datetime, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Category the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
