<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\Job;

class JobController extends \yii\web\Controller
{
    public function actionIndex($category = 0)
    {
      // Create Query
      $query = Job::find();

      $pagination = new Pagination([
                      'defaultPageSize' => 20,
                      'totalCount' => $query->count()
      ]);

      if (! empty($category)) {
        $jobs = $query->orderBy('create_date DESC')
                            ->offset($pagination->offset)
                            ->limit($pagination->limit)
                            ->where(['category_id' => $category])
                            ->all();
      } else {
        $jobs = $query->orderBy('create_date DESC')
                            ->offset($pagination->offset)
                            ->limit($pagination->limit)
                            ->all();
      }
      return $this->render('index',[
                  'jobs' => $jobs,
                  'pagination' => $pagination
      ]);
    }

    public function actionDetails($id)
    {
      // Create Query
      $Job = Job::find()
                  ->where(['id' => $id])
                  ->one();
        return $this->render('details',['Job' => $Job]);
    }

    public function actionCreate()
    {
      $job = new Job();

      if ($job->load(Yii::$app->request->post())) {
        if ($job->validate()) {
            // Save to db
            $job->save();
            // Save Message
            yii::$app->getSession()->setFlash('success','Job added Successfully');
            return $this->redirect('index.php?r=job');
          }
        }
        return $this->render('create', [
          'job' => $job,
        ]);
    }

    public function actionDelete($id)
    {
        $job = Job::findOne($id);
        $job->delete();
        // Show Message
        yii::$app->getSession()->setFlash('deleted','Job deleted Successfully');
        return $this->redirect('index.php?r=job');

    }

    public function actionEdit($id)
    {
      $job = Job::findOne($id);

      if ($job->load(Yii::$app->request->post())) {
        if ($job->validate()) {
            // Save to db
            $job->save();
            // Save Message
            yii::$app->getSession()->setFlash('success','Job updated Successfully');
            return $this->redirect('index.php?r=job');
          }
        }
        return $this->render('edit', [
          'job' => $job,
        ]);
    }

}
