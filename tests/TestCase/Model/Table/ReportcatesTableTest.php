<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReportcatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReportcatesTable Test Case
 */
class ReportcatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReportcatesTable
     */
    public $Reportcates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reportcates',
        'app.reports'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Reportcates') ? [] : ['className' => ReportcatesTable::class];
        $this->Reportcates = TableRegistry::get('Reportcates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Reportcates);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
