<?php

namespace App\Models\Map;

use App\Models\Gpu;
use App\Models\GpuQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'gpu' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class GpuTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.GpuTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'gpu';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\App\\Models\\Gpu';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Gpu';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the id field
     */
    const COL_ID = 'gpu.id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'gpu.name';

    /**
     * the column name for the manufacturer_id field
     */
    const COL_MANUFACTURER_ID = 'gpu.manufacturer_id';

    /**
     * the column name for the core_count field
     */
    const COL_CORE_COUNT = 'gpu.core_count';

    /**
     * the column name for the base_clock field
     */
    const COL_BASE_CLOCK = 'gpu.base_clock';

    /**
     * the column name for the boost_clock field
     */
    const COL_BOOST_CLOCK = 'gpu.boost_clock';

    /**
     * the column name for the tdp field
     */
    const COL_TDP = 'gpu.tdp';

    /**
     * the column name for the cuda_core_count field
     */
    const COL_CUDA_CORE_COUNT = 'gpu.cuda_core_count';

    /**
     * the column name for the memory_capacity field
     */
    const COL_MEMORY_CAPACITY = 'gpu.memory_capacity';

    /**
     * the column name for the created_at field
     */
    const COL_CREATED_AT = 'gpu.created_at';

    /**
     * the column name for the updated_at field
     */
    const COL_UPDATED_AT = 'gpu.updated_at';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Name', 'ManufacturerId', 'CoreCount', 'BaseClock', 'BoostClock', 'Tdp', 'CudaCoreCount', 'MemoryCapacity', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_CAMELNAME     => array('id', 'name', 'manufacturerId', 'coreCount', 'baseClock', 'boostClock', 'tdp', 'cudaCoreCount', 'memoryCapacity', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(GpuTableMap::COL_ID, GpuTableMap::COL_NAME, GpuTableMap::COL_MANUFACTURER_ID, GpuTableMap::COL_CORE_COUNT, GpuTableMap::COL_BASE_CLOCK, GpuTableMap::COL_BOOST_CLOCK, GpuTableMap::COL_TDP, GpuTableMap::COL_CUDA_CORE_COUNT, GpuTableMap::COL_MEMORY_CAPACITY, GpuTableMap::COL_CREATED_AT, GpuTableMap::COL_UPDATED_AT, ),
        self::TYPE_FIELDNAME     => array('id', 'name', 'manufacturer_id', 'core_count', 'base_clock', 'boost_clock', 'tdp', 'cuda_core_count', 'memory_capacity', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Name' => 1, 'ManufacturerId' => 2, 'CoreCount' => 3, 'BaseClock' => 4, 'BoostClock' => 5, 'Tdp' => 6, 'CudaCoreCount' => 7, 'MemoryCapacity' => 8, 'CreatedAt' => 9, 'UpdatedAt' => 10, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'name' => 1, 'manufacturerId' => 2, 'coreCount' => 3, 'baseClock' => 4, 'boostClock' => 5, 'tdp' => 6, 'cudaCoreCount' => 7, 'memoryCapacity' => 8, 'createdAt' => 9, 'updatedAt' => 10, ),
        self::TYPE_COLNAME       => array(GpuTableMap::COL_ID => 0, GpuTableMap::COL_NAME => 1, GpuTableMap::COL_MANUFACTURER_ID => 2, GpuTableMap::COL_CORE_COUNT => 3, GpuTableMap::COL_BASE_CLOCK => 4, GpuTableMap::COL_BOOST_CLOCK => 5, GpuTableMap::COL_TDP => 6, GpuTableMap::COL_CUDA_CORE_COUNT => 7, GpuTableMap::COL_MEMORY_CAPACITY => 8, GpuTableMap::COL_CREATED_AT => 9, GpuTableMap::COL_UPDATED_AT => 10, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'name' => 1, 'manufacturer_id' => 2, 'core_count' => 3, 'base_clock' => 4, 'boost_clock' => 5, 'tdp' => 6, 'cuda_core_count' => 7, 'memory_capacity' => 8, 'created_at' => 9, 'updated_at' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('gpu');
        $this->setPhpName('Gpu');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\App\\Models\\Gpu');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, 10, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addForeignKey('manufacturer_id', 'ManufacturerId', 'INTEGER', 'manufacturer', 'id', true, 8, null);
        $this->addColumn('core_count', 'CoreCount', 'INTEGER', true, 8, null);
        $this->addColumn('base_clock', 'BaseClock', 'DOUBLE', true, 6, null);
        $this->addColumn('boost_clock', 'BoostClock', 'DOUBLE', false, 6, null);
        $this->addColumn('tdp', 'Tdp', 'INTEGER', false, 8, null);
        $this->addColumn('cuda_core_count', 'CudaCoreCount', 'INTEGER', false, 255, null);
        $this->addColumn('memory_capacity', 'MemoryCapacity', 'DOUBLE', false, 6, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Manufacturer', '\\App\\Models\\Manufacturer', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':manufacturer_id',
    1 => ':id',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_created_at' => 'false', 'disable_updated_at' => 'false', ),
        );
    } // getBehaviors()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? GpuTableMap::CLASS_DEFAULT : GpuTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Gpu object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = GpuTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = GpuTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + GpuTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = GpuTableMap::OM_CLASS;
            /** @var Gpu $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            GpuTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = GpuTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = GpuTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Gpu $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                GpuTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(GpuTableMap::COL_ID);
            $criteria->addSelectColumn(GpuTableMap::COL_NAME);
            $criteria->addSelectColumn(GpuTableMap::COL_MANUFACTURER_ID);
            $criteria->addSelectColumn(GpuTableMap::COL_CORE_COUNT);
            $criteria->addSelectColumn(GpuTableMap::COL_BASE_CLOCK);
            $criteria->addSelectColumn(GpuTableMap::COL_BOOST_CLOCK);
            $criteria->addSelectColumn(GpuTableMap::COL_TDP);
            $criteria->addSelectColumn(GpuTableMap::COL_CUDA_CORE_COUNT);
            $criteria->addSelectColumn(GpuTableMap::COL_MEMORY_CAPACITY);
            $criteria->addSelectColumn(GpuTableMap::COL_CREATED_AT);
            $criteria->addSelectColumn(GpuTableMap::COL_UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.manufacturer_id');
            $criteria->addSelectColumn($alias . '.core_count');
            $criteria->addSelectColumn($alias . '.base_clock');
            $criteria->addSelectColumn($alias . '.boost_clock');
            $criteria->addSelectColumn($alias . '.tdp');
            $criteria->addSelectColumn($alias . '.cuda_core_count');
            $criteria->addSelectColumn($alias . '.memory_capacity');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(GpuTableMap::DATABASE_NAME)->getTable(GpuTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(GpuTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(GpuTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new GpuTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Gpu or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Gpu object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GpuTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \App\Models\Gpu) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(GpuTableMap::DATABASE_NAME);
            $criteria->add(GpuTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = GpuQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            GpuTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                GpuTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the gpu table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return GpuQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Gpu or Criteria object.
     *
     * @param mixed               $criteria Criteria or Gpu object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GpuTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Gpu object
        }

        if ($criteria->containsKey(GpuTableMap::COL_ID) && $criteria->keyContainsValue(GpuTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.GpuTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = GpuQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // GpuTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
GpuTableMap::buildTableMap();
