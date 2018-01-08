<?php

namespace App\Models\Base;

use \Exception;
use \PDO;
use App\Models\Gpu as ChildGpu;
use App\Models\GpuQuery as ChildGpuQuery;
use App\Models\Map\GpuTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'gpu' table.
 *
 *
 *
 * @method     ChildGpuQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildGpuQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildGpuQuery orderByManufacturerId($order = Criteria::ASC) Order by the manufacturer_id column
 * @method     ChildGpuQuery orderByCoreCount($order = Criteria::ASC) Order by the core_count column
 * @method     ChildGpuQuery orderByBaseClock($order = Criteria::ASC) Order by the base_clock column
 * @method     ChildGpuQuery orderByBoostClock($order = Criteria::ASC) Order by the boost_clock column
 * @method     ChildGpuQuery orderByTdp($order = Criteria::ASC) Order by the tdp column
 * @method     ChildGpuQuery orderByCudaCoreCount($order = Criteria::ASC) Order by the cuda_core_count column
 * @method     ChildGpuQuery orderByMemoryCapacity($order = Criteria::ASC) Order by the memory_capacity column
 * @method     ChildGpuQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildGpuQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildGpuQuery groupById() Group by the id column
 * @method     ChildGpuQuery groupByName() Group by the name column
 * @method     ChildGpuQuery groupByManufacturerId() Group by the manufacturer_id column
 * @method     ChildGpuQuery groupByCoreCount() Group by the core_count column
 * @method     ChildGpuQuery groupByBaseClock() Group by the base_clock column
 * @method     ChildGpuQuery groupByBoostClock() Group by the boost_clock column
 * @method     ChildGpuQuery groupByTdp() Group by the tdp column
 * @method     ChildGpuQuery groupByCudaCoreCount() Group by the cuda_core_count column
 * @method     ChildGpuQuery groupByMemoryCapacity() Group by the memory_capacity column
 * @method     ChildGpuQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildGpuQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildGpuQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildGpuQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildGpuQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildGpuQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildGpuQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildGpuQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildGpuQuery leftJoinManufacturer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Manufacturer relation
 * @method     ChildGpuQuery rightJoinManufacturer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Manufacturer relation
 * @method     ChildGpuQuery innerJoinManufacturer($relationAlias = null) Adds a INNER JOIN clause to the query using the Manufacturer relation
 *
 * @method     ChildGpuQuery joinWithManufacturer($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Manufacturer relation
 *
 * @method     ChildGpuQuery leftJoinWithManufacturer() Adds a LEFT JOIN clause and with to the query using the Manufacturer relation
 * @method     ChildGpuQuery rightJoinWithManufacturer() Adds a RIGHT JOIN clause and with to the query using the Manufacturer relation
 * @method     ChildGpuQuery innerJoinWithManufacturer() Adds a INNER JOIN clause and with to the query using the Manufacturer relation
 *
 * @method     \App\Models\ManufacturerQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildGpu findOne(ConnectionInterface $con = null) Return the first ChildGpu matching the query
 * @method     ChildGpu findOneOrCreate(ConnectionInterface $con = null) Return the first ChildGpu matching the query, or a new ChildGpu object populated from the query conditions when no match is found
 *
 * @method     ChildGpu findOneById(int $id) Return the first ChildGpu filtered by the id column
 * @method     ChildGpu findOneByName(string $name) Return the first ChildGpu filtered by the name column
 * @method     ChildGpu findOneByManufacturerId(int $manufacturer_id) Return the first ChildGpu filtered by the manufacturer_id column
 * @method     ChildGpu findOneByCoreCount(int $core_count) Return the first ChildGpu filtered by the core_count column
 * @method     ChildGpu findOneByBaseClock(double $base_clock) Return the first ChildGpu filtered by the base_clock column
 * @method     ChildGpu findOneByBoostClock(double $boost_clock) Return the first ChildGpu filtered by the boost_clock column
 * @method     ChildGpu findOneByTdp(int $tdp) Return the first ChildGpu filtered by the tdp column
 * @method     ChildGpu findOneByCudaCoreCount(int $cuda_core_count) Return the first ChildGpu filtered by the cuda_core_count column
 * @method     ChildGpu findOneByMemoryCapacity(double $memory_capacity) Return the first ChildGpu filtered by the memory_capacity column
 * @method     ChildGpu findOneByCreatedAt(string $created_at) Return the first ChildGpu filtered by the created_at column
 * @method     ChildGpu findOneByUpdatedAt(string $updated_at) Return the first ChildGpu filtered by the updated_at column *

 * @method     ChildGpu requirePk($key, ConnectionInterface $con = null) Return the ChildGpu by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGpu requireOne(ConnectionInterface $con = null) Return the first ChildGpu matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGpu requireOneById(int $id) Return the first ChildGpu filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGpu requireOneByName(string $name) Return the first ChildGpu filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGpu requireOneByManufacturerId(int $manufacturer_id) Return the first ChildGpu filtered by the manufacturer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGpu requireOneByCoreCount(int $core_count) Return the first ChildGpu filtered by the core_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGpu requireOneByBaseClock(double $base_clock) Return the first ChildGpu filtered by the base_clock column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGpu requireOneByBoostClock(double $boost_clock) Return the first ChildGpu filtered by the boost_clock column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGpu requireOneByTdp(int $tdp) Return the first ChildGpu filtered by the tdp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGpu requireOneByCudaCoreCount(int $cuda_core_count) Return the first ChildGpu filtered by the cuda_core_count column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGpu requireOneByMemoryCapacity(double $memory_capacity) Return the first ChildGpu filtered by the memory_capacity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGpu requireOneByCreatedAt(string $created_at) Return the first ChildGpu filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGpu requireOneByUpdatedAt(string $updated_at) Return the first ChildGpu filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGpu[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildGpu objects based on current ModelCriteria
 * @method     ChildGpu[]|ObjectCollection findById(int $id) Return ChildGpu objects filtered by the id column
 * @method     ChildGpu[]|ObjectCollection findByName(string $name) Return ChildGpu objects filtered by the name column
 * @method     ChildGpu[]|ObjectCollection findByManufacturerId(int $manufacturer_id) Return ChildGpu objects filtered by the manufacturer_id column
 * @method     ChildGpu[]|ObjectCollection findByCoreCount(int $core_count) Return ChildGpu objects filtered by the core_count column
 * @method     ChildGpu[]|ObjectCollection findByBaseClock(double $base_clock) Return ChildGpu objects filtered by the base_clock column
 * @method     ChildGpu[]|ObjectCollection findByBoostClock(double $boost_clock) Return ChildGpu objects filtered by the boost_clock column
 * @method     ChildGpu[]|ObjectCollection findByTdp(int $tdp) Return ChildGpu objects filtered by the tdp column
 * @method     ChildGpu[]|ObjectCollection findByCudaCoreCount(int $cuda_core_count) Return ChildGpu objects filtered by the cuda_core_count column
 * @method     ChildGpu[]|ObjectCollection findByMemoryCapacity(double $memory_capacity) Return ChildGpu objects filtered by the memory_capacity column
 * @method     ChildGpu[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildGpu objects filtered by the created_at column
 * @method     ChildGpu[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildGpu objects filtered by the updated_at column
 * @method     ChildGpu[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class GpuQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \App\Models\Base\GpuQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\App\\Models\\Gpu', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildGpuQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildGpuQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildGpuQuery) {
            return $criteria;
        }
        $query = new ChildGpuQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildGpu|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(GpuTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = GpuTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildGpu A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, name, manufacturer_id, core_count, base_clock, boost_clock, tdp, cuda_core_count, memory_capacity, created_at, updated_at FROM gpu WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildGpu $obj */
            $obj = new ChildGpu();
            $obj->hydrate($row);
            GpuTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildGpu|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildGpuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(GpuTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildGpuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(GpuTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGpuQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(GpuTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(GpuTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GpuTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGpuQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GpuTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the manufacturer_id column
     *
     * Example usage:
     * <code>
     * $query->filterByManufacturerId(1234); // WHERE manufacturer_id = 1234
     * $query->filterByManufacturerId(array(12, 34)); // WHERE manufacturer_id IN (12, 34)
     * $query->filterByManufacturerId(array('min' => 12)); // WHERE manufacturer_id > 12
     * </code>
     *
     * @see       filterByManufacturer()
     *
     * @param     mixed $manufacturerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGpuQuery The current query, for fluid interface
     */
    public function filterByManufacturerId($manufacturerId = null, $comparison = null)
    {
        if (is_array($manufacturerId)) {
            $useMinMax = false;
            if (isset($manufacturerId['min'])) {
                $this->addUsingAlias(GpuTableMap::COL_MANUFACTURER_ID, $manufacturerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($manufacturerId['max'])) {
                $this->addUsingAlias(GpuTableMap::COL_MANUFACTURER_ID, $manufacturerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GpuTableMap::COL_MANUFACTURER_ID, $manufacturerId, $comparison);
    }

    /**
     * Filter the query on the core_count column
     *
     * Example usage:
     * <code>
     * $query->filterByCoreCount(1234); // WHERE core_count = 1234
     * $query->filterByCoreCount(array(12, 34)); // WHERE core_count IN (12, 34)
     * $query->filterByCoreCount(array('min' => 12)); // WHERE core_count > 12
     * </code>
     *
     * @param     mixed $coreCount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGpuQuery The current query, for fluid interface
     */
    public function filterByCoreCount($coreCount = null, $comparison = null)
    {
        if (is_array($coreCount)) {
            $useMinMax = false;
            if (isset($coreCount['min'])) {
                $this->addUsingAlias(GpuTableMap::COL_CORE_COUNT, $coreCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coreCount['max'])) {
                $this->addUsingAlias(GpuTableMap::COL_CORE_COUNT, $coreCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GpuTableMap::COL_CORE_COUNT, $coreCount, $comparison);
    }

    /**
     * Filter the query on the base_clock column
     *
     * Example usage:
     * <code>
     * $query->filterByBaseClock(1234); // WHERE base_clock = 1234
     * $query->filterByBaseClock(array(12, 34)); // WHERE base_clock IN (12, 34)
     * $query->filterByBaseClock(array('min' => 12)); // WHERE base_clock > 12
     * </code>
     *
     * @param     mixed $baseClock The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGpuQuery The current query, for fluid interface
     */
    public function filterByBaseClock($baseClock = null, $comparison = null)
    {
        if (is_array($baseClock)) {
            $useMinMax = false;
            if (isset($baseClock['min'])) {
                $this->addUsingAlias(GpuTableMap::COL_BASE_CLOCK, $baseClock['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($baseClock['max'])) {
                $this->addUsingAlias(GpuTableMap::COL_BASE_CLOCK, $baseClock['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GpuTableMap::COL_BASE_CLOCK, $baseClock, $comparison);
    }

    /**
     * Filter the query on the boost_clock column
     *
     * Example usage:
     * <code>
     * $query->filterByBoostClock(1234); // WHERE boost_clock = 1234
     * $query->filterByBoostClock(array(12, 34)); // WHERE boost_clock IN (12, 34)
     * $query->filterByBoostClock(array('min' => 12)); // WHERE boost_clock > 12
     * </code>
     *
     * @param     mixed $boostClock The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGpuQuery The current query, for fluid interface
     */
    public function filterByBoostClock($boostClock = null, $comparison = null)
    {
        if (is_array($boostClock)) {
            $useMinMax = false;
            if (isset($boostClock['min'])) {
                $this->addUsingAlias(GpuTableMap::COL_BOOST_CLOCK, $boostClock['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($boostClock['max'])) {
                $this->addUsingAlias(GpuTableMap::COL_BOOST_CLOCK, $boostClock['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GpuTableMap::COL_BOOST_CLOCK, $boostClock, $comparison);
    }

    /**
     * Filter the query on the tdp column
     *
     * Example usage:
     * <code>
     * $query->filterByTdp(1234); // WHERE tdp = 1234
     * $query->filterByTdp(array(12, 34)); // WHERE tdp IN (12, 34)
     * $query->filterByTdp(array('min' => 12)); // WHERE tdp > 12
     * </code>
     *
     * @param     mixed $tdp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGpuQuery The current query, for fluid interface
     */
    public function filterByTdp($tdp = null, $comparison = null)
    {
        if (is_array($tdp)) {
            $useMinMax = false;
            if (isset($tdp['min'])) {
                $this->addUsingAlias(GpuTableMap::COL_TDP, $tdp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tdp['max'])) {
                $this->addUsingAlias(GpuTableMap::COL_TDP, $tdp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GpuTableMap::COL_TDP, $tdp, $comparison);
    }

    /**
     * Filter the query on the cuda_core_count column
     *
     * Example usage:
     * <code>
     * $query->filterByCudaCoreCount(1234); // WHERE cuda_core_count = 1234
     * $query->filterByCudaCoreCount(array(12, 34)); // WHERE cuda_core_count IN (12, 34)
     * $query->filterByCudaCoreCount(array('min' => 12)); // WHERE cuda_core_count > 12
     * </code>
     *
     * @param     mixed $cudaCoreCount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGpuQuery The current query, for fluid interface
     */
    public function filterByCudaCoreCount($cudaCoreCount = null, $comparison = null)
    {
        if (is_array($cudaCoreCount)) {
            $useMinMax = false;
            if (isset($cudaCoreCount['min'])) {
                $this->addUsingAlias(GpuTableMap::COL_CUDA_CORE_COUNT, $cudaCoreCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cudaCoreCount['max'])) {
                $this->addUsingAlias(GpuTableMap::COL_CUDA_CORE_COUNT, $cudaCoreCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GpuTableMap::COL_CUDA_CORE_COUNT, $cudaCoreCount, $comparison);
    }

    /**
     * Filter the query on the memory_capacity column
     *
     * Example usage:
     * <code>
     * $query->filterByMemoryCapacity(1234); // WHERE memory_capacity = 1234
     * $query->filterByMemoryCapacity(array(12, 34)); // WHERE memory_capacity IN (12, 34)
     * $query->filterByMemoryCapacity(array('min' => 12)); // WHERE memory_capacity > 12
     * </code>
     *
     * @param     mixed $memoryCapacity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGpuQuery The current query, for fluid interface
     */
    public function filterByMemoryCapacity($memoryCapacity = null, $comparison = null)
    {
        if (is_array($memoryCapacity)) {
            $useMinMax = false;
            if (isset($memoryCapacity['min'])) {
                $this->addUsingAlias(GpuTableMap::COL_MEMORY_CAPACITY, $memoryCapacity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($memoryCapacity['max'])) {
                $this->addUsingAlias(GpuTableMap::COL_MEMORY_CAPACITY, $memoryCapacity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GpuTableMap::COL_MEMORY_CAPACITY, $memoryCapacity, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGpuQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(GpuTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(GpuTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GpuTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGpuQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(GpuTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(GpuTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GpuTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \App\Models\Manufacturer object
     *
     * @param \App\Models\Manufacturer|ObjectCollection $manufacturer The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildGpuQuery The current query, for fluid interface
     */
    public function filterByManufacturer($manufacturer, $comparison = null)
    {
        if ($manufacturer instanceof \App\Models\Manufacturer) {
            return $this
                ->addUsingAlias(GpuTableMap::COL_MANUFACTURER_ID, $manufacturer->getId(), $comparison);
        } elseif ($manufacturer instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(GpuTableMap::COL_MANUFACTURER_ID, $manufacturer->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByManufacturer() only accepts arguments of type \App\Models\Manufacturer or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Manufacturer relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildGpuQuery The current query, for fluid interface
     */
    public function joinManufacturer($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Manufacturer');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Manufacturer');
        }

        return $this;
    }

    /**
     * Use the Manufacturer relation Manufacturer object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \App\Models\ManufacturerQuery A secondary query class using the current class as primary query
     */
    public function useManufacturerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinManufacturer($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Manufacturer', '\App\Models\ManufacturerQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildGpu $gpu Object to remove from the list of results
     *
     * @return $this|ChildGpuQuery The current query, for fluid interface
     */
    public function prune($gpu = null)
    {
        if ($gpu) {
            $this->addUsingAlias(GpuTableMap::COL_ID, $gpu->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the gpu table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GpuTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            GpuTableMap::clearInstancePool();
            GpuTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GpuTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(GpuTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            GpuTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            GpuTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildGpuQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(GpuTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildGpuQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(GpuTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildGpuQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(GpuTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildGpuQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(GpuTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildGpuQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(GpuTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildGpuQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(GpuTableMap::COL_CREATED_AT);
    }

} // GpuQuery
