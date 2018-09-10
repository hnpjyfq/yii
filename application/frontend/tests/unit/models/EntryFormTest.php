<?php
namespace tests\models;
use app\models\EntryForm;
class EntryFormTest extends \Codeception\Test\Unit
{
  public function testValidInput()
  {
    $model = new EntryForm();
    $model->name = 'Harry Qin';
    $model->email = '15848778@qq.com';
    expect_that($model->validate());
    return $model;
  }
  public function testInvalidInput()
  {
    $model = new EntryForm();
    $model->name = 'Harry Qin';
    $model->email = 'xxyy';
    expect_not($model->validate());
    $model = new EntryForm();
    $model->name = '';
    $model->email = '15848778@qq.com';
    expect_not($model->validate());
  }
  /**
   * 下面一行表示这里输入的参数值来自testValidInput的输出
   * @depends testValidInput
   */
  public function testModelProperty($model)
  {
    expect($model->name)->equals('Harry Qin');
  }
}