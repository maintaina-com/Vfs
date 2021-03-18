<?php
/**
 * Prepare the test setup.
 */
namespace Horde\Vfs\Sql\Pdo;
use Horde_Vfs_Test_Sql_Base as Base;
use \Horde_Test_Factory_Db;

require_once __DIR__ . '/../Base.php';

/**
 * Copyright 2012-2017 Horde LLC (http://www.horde.org/)
 *
 * @author     Jan Schneider <jan@horde.org>
 * @category   Horde
 * @package    Vfs
 * @subpackage UnitTests
 * @license    http://www.horde.org/licenses/lgpl21 LGPL 2.1
 */
class SqliteTest extends Base
{
    public static function setUpBeforeClass(): void
    {
        $factory_db = new Horde_Test_Factory_Db();

        if (class_exists('Horde_Db_Adapter_Pdo_Sqlite')) {
            try {
                self::$db = $factory_db->create();
                parent::setUpBeforeClass();
            } catch (Horde_Test_Exception $e) {
                self::$reason = 'Sqlite not available';
            }
        }         
    }
}
