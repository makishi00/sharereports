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
        $report = $this->Reports->newEntity();
        if ($this->request->is('post')) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The report has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The report could not be saved. Please, try again.'));
        }
        $reportcates = $this->Reports->Reportcates->find('list', ['limit' => 200]);
        $users = $this->Reports->Users->find('list', ['limit' => 200]);
        $this->set(compact('report', 'reportcates', 'users'));
        $this->set('_serialize', ['report']);
    }

    public function edit($reports_id = null)
    {
        $report = $this->loadModel('reports')->find()
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

        // formきたら
        if ($this->request->is(['patch', 'post', 'put'])) {
            $editReportModel = $this->loadModel('reports');
            $editReport = $editReportModel->find()
                ->where(['Reports.id' => $reports_id])
                ->first();
            $editReport = $editReportModel->patchEntity($editReport, $this->request->getData());
            if ($editReportModel->save($editReport)) {
                $this->Flash->success(__('編集完了。'));
                return $this->redirect(['action' => 'details/'.$reports_id]);
            }
            $this->Flash->error(__('レポートを保存できませんでした。 もう一度やり直してください。'));
        }
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $report = $this->Reports->get($id);
        if ($this->Reports->delete($report)) {
            $this->Flash->success(__('The report has been deleted.'));
        } else {
            $this->Flash->error(__('The report could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
