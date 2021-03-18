<?php
/**
 * Prepare the test setup.
 */
namespace Horde\Vfs\SqlFile\Pdo;
use Horde_Vfs_Test_SqlFile_Base as Base;
use \PDO;

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
class PgsqlTest extends Base
{
    public static function setUpBeforeClass(): void
    {
        if (!extension_loaded('pdo') ||
            !in_array('pgsql', PDO::getAvailableDrivers())) {
            self::$reason = 'No pgsql extension or no pgsql PDO driver';
            return;
        }
        $config = self::getConfig('VFS_SQLFILE_PDO_PGSQL_TEST_CONFIG',
                                  __DIR__ . '/../..');
        if ($config && !empty($config['vfs']['sqlfile']['pdo_pgsql'])) {
            self::$db = new Horde_Db_Adapter_Pdo_Pgsql($config['vfs']['sqlfile']['pdo_pgsql']);
            parent::setUpBeforeClass();
        }
    }
}
