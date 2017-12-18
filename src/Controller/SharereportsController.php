<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Report;
use App\Model\Table\ReportsTable;
use Cake\ORM\TableRegistry;

/**
 * Sharereports Controller
 *
 *
 * @method \App\Model\Entity\Sharereport[] paginate($object = null, array $settings = [])
 */
class SharereportsController extends AppController
{
    public $paginate = [
        'limit' => 10,
        'order' => [
            'Reports.id' => 'asc'
        ]
    ];

    public $helpers = [
        'Paginator' => ['templates' =>
            'paginator-templates']
    ];


    public function initialize()
    {
        parent::initialize();
        $this->set('userName', $this->Auth->user('us_name'));
    }

    public function index()
    {
//        $reportsTbl = TableRegistry::get('reports');
//        $report = $reportsTbl->newEntity();
//        $report->rp_date = '2017-12-02';
//        $report->rp_time_from = '10:00:00';
//        $report->rp_time_to = '19:00:00';
//        $report->rp_content = 'なんやこれ';
//        $report->rp_created_at = '2017-12-02 00:00:00';
//        $report->reportcate_id = 1;
//        $report->user_id = 16;
//        $reportsTbl->save($report);
        $this->loadComponent('Paginator');
        $this->set('reports', $this->paginate(
                $this->loadModel('reports')->find()->contain('users')
            )
        );
        $reportsState = $this->loadModel('reports')->find()->first();
        $this->set('reportsState', $reportsState);
        $this->set('helpers', $this->helpers);
    }

    public function details($reports_id = null)
    {
        $report = $this->loadModel('reports')->find()
            ->where(['Reports.id' => $reports_id])
            ->contain(['users', 'reportcates'])
            ->first();
        $this->set('report', $report);
    }

    public function add()
    {
        $reportModel = $this->loadModel('reports');
        $report = $reportModel->newEntity(['user_id' => 16]);
        $this->set('report', $report);

        $reportcates = $this->loadModel('reportcates')->find()->all();
        $reportcateOptions = [];
        foreach ($reportcates as $key => $value) {
            $reportcateOptions[$value->id] = $value->rc_name;
        }
        $this->set('reportcateOption', $reportcateOptions);

        if ($this->request->is('post')) {
            $report = $reportModel->patchEntity($report, $this->request->getData());
            if ($reportModel->save($report)) {
                $this->Flash->success(__('レポートを追加しました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('レポートを追加できませんでした。 もう一度やり直してください'));
        }
    }

    public function edit($reports_id = null)
    {
        $reportModel = $this->loadModel('reports');
        $report = $reportModel->find()
            ->where(['Reports.id' => $reports_id])
            ->contain(['users', 'reportcates'])
            ->first();
        $this->set('report', $report);

        $reportcates = $this->loadModel('reportcates')->find()->all();
        $reportcateOptions = [];
        foreach ($reportcates as $key => $value) {
            $reportcateOptions[$value->id] = $value->rc_name;
        }
        $this->set('reportcateOption', $reportcateOptions);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $report = $reportModel->patchEntity($report, $this->request->getData());
            if ($reportModel->save($report)) {
                $this->Flash->success(__('レポートを編集しました。'));
                return $this->redirect(['action' => 'details/'.$reports_id]);
            }
            $this->Flash->error(__('レポートを編集できませんでした。 もう一度やり直してください。'));
        }
    }

    public function delete($reports_id = null)
    {
        $report = $this->loadModel('reports')->find()
            ->where(['Reports.id' => $reports_id])
            ->contain(['users', 'reportcates'])
            ->first();
        $this->set('report', $report);

        $report = $this->loadModel('reports')->get($reports_id);
        if ($this->loadModel('reports')->delete($report)) {
            $this->Flash->success(__('レポートを削除しました。'));
        } else {
            $this->Flash->error(__('レポートを削除できませんでした。もう一度やり直してください。'));
        }

        return $this->redirect(['action' => 'index']);


    }

}