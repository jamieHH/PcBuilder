<?php

namespace App\Models\Base;

use \Exception;
use App\Models\PasswordReset as ChildPasswordReset;
use App\Models\PasswordResetQuery as ChildPasswordResetQuery;
use App\Models\Map\PasswordResetTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'password_resets' table.
 *
 *
 *
 * @method     ChildPasswordResetQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildPasswordResetQuery orderByToken($order = Criteria::ASC) Order by the token column
 * @method     ChildPasswordResetQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method     ChildPasswordResetQuery groupByEmail() Group by the email column
 * @method     ChildPasswordResetQuery groupByToken() Group by the token column
 * @method     ChildPasswordResetQuery groupByCreatedAt() Group by the created_at column
 *
 * @method     ChildPasswordResetQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPasswordResetQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPasswordResetQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPasswordResetQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPasswordResetQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPasswordResetQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPasswordReset findOne(ConnectionInterface $con = null) Return the first ChildPasswordReset matching the query
 * @method     ChildPasswordReset findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPasswordReset matching the query, or a new ChildPasswordReset object populated from the query conditions when no match is found
 *
 * @method     ChildPasswordReset findOneByEmail(string $email) Return the first ChildPasswordReset filtered by the email column
 * @method     ChildPasswordReset findOneByToken(string $token) Return the first ChildPasswordReset filtered by the token column
 * @method     ChildPasswordReset findOneByCreatedAt(string $created_at) Return the first ChildPasswordReset filtered by the created_at column *

 * @method     ChildPasswordReset requirePk($key, ConnectionInterface $con = null) Return the ChildPasswordReset by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPasswordReset requireOne(ConnectionInterface $con = null) Return the first ChildPasswordReset matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPasswordReset requireOneByEmail(string $email) Return the first ChildPasswordReset filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPasswordReset requireOneByToken(string $token) Return the first ChildPasswordReset filtered by the token column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPasswordReset requireOneByCreatedAt(string $created_at) Return the first ChildPasswordReset filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPasswordReset[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPasswordReset objects based on current ModelCriteria
 * @method     ChildPasswordReset[]|ObjectCollection findByEmail(string $email) Return ChildPasswordReset objects filtered by the email column
 * @method     ChildPasswordReset[]|ObjectCollection findByToken(string $token) Return ChildPasswordReset objects filtered by the token column
 * @method     ChildPasswordReset[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildPasswordReset objects filtered by the created_at column
 * @method     ChildPasswordReset[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PasswordResetQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \App\Models\Base\PasswordResetQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\App\\Models\\PasswordReset', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPasswordResetQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPasswordResetQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPasswordResetQuery) {
            return $criteria;
        }
        $query = new ChildPasswordResetQuery();
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
     * @return ChildPasswordReset|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The PasswordReset object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The PasswordReset object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildPasswordResetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The PasswordReset object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPasswordResetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The PasswordReset object has no primary key');
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPasswordResetQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PasswordResetTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the token column
     *
     * Example usage:
     * <code>
     * $query->filterByToken('fooValue');   // WHERE token = 'fooValue'
     * $query->filterByToken('%fooValue%', Criteria::LIKE); // WHERE token LIKE '%fooValue%'
     * </code>
     *
     * @param     string $token The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPasswordResetQuery The current query, for fluid interface
     */
    public function filterByToken($token = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($token)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PasswordResetTableMap::COL_TOKEN, $token, $comparison);
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
     * @return $this|ChildPasswordResetQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(PasswordResetTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(PasswordResetTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PasswordResetTableMap::COL_CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPasswordReset $passwordReset Object to remove from the list of results
     *
     * @return $this|ChildPasswordResetQuery The current query, for fluid interface
     */
    public function prune($passwordReset = null)
    {
        if ($passwordReset) {
            throw new LogicException('PasswordReset object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the password_resets table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PasswordResetTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PasswordResetTableMap::clearInstancePool();
            PasswordResetTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PasswordResetTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PasswordResetTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PasswordResetTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PasswordResetTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PasswordResetQuery
