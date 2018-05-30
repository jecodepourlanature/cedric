<?php

namespace ND\Cedric\Propel\Base;

use \Exception;
use \PDO;
use ND\Cedric\Propel\Communes as ChildCommunes;
use ND\Cedric\Propel\CommunesQuery as ChildCommunesQuery;
use ND\Cedric\Propel\Map\CommunesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'communes' table.
 *
 *
 *
 * @method     ChildCommunesQuery orderByCodeInsee($order = Criteria::ASC) Order by the code_insee column
 * @method     ChildCommunesQuery orderByNom($order = Criteria::ASC) Order by the nom column
 *
 * @method     ChildCommunesQuery groupByCodeInsee() Group by the code_insee column
 * @method     ChildCommunesQuery groupByNom() Group by the nom column
 *
 * @method     ChildCommunesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCommunesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCommunesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCommunesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCommunesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCommunesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCommunes findOne(ConnectionInterface $con = null) Return the first ChildCommunes matching the query
 * @method     ChildCommunes findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCommunes matching the query, or a new ChildCommunes object populated from the query conditions when no match is found
 *
 * @method     ChildCommunes findOneByCodeInsee(string $code_insee) Return the first ChildCommunes filtered by the code_insee column
 * @method     ChildCommunes findOneByNom(string $nom) Return the first ChildCommunes filtered by the nom column *

 * @method     ChildCommunes requirePk($key, ConnectionInterface $con = null) Return the ChildCommunes by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommunes requireOne(ConnectionInterface $con = null) Return the first ChildCommunes matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCommunes requireOneByCodeInsee(string $code_insee) Return the first ChildCommunes filtered by the code_insee column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCommunes requireOneByNom(string $nom) Return the first ChildCommunes filtered by the nom column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCommunes[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCommunes objects based on current ModelCriteria
 * @method     ChildCommunes[]|ObjectCollection findByCodeInsee(string $code_insee) Return ChildCommunes objects filtered by the code_insee column
 * @method     ChildCommunes[]|ObjectCollection findByNom(string $nom) Return ChildCommunes objects filtered by the nom column
 * @method     ChildCommunes[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CommunesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \ND\Cedric\Propel\Base\CommunesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ND\\Cedric\\Propel\\Communes', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCommunesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCommunesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCommunesQuery) {
            return $criteria;
        }
        $query = new ChildCommunesQuery();
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
     * @return ChildCommunes|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CommunesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CommunesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCommunes A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT code_insee, nom FROM communes WHERE code_insee = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildCommunes $obj */
            $obj = new ChildCommunes();
            $obj->hydrate($row);
            CommunesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCommunes|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCommunesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CommunesTableMap::COL_CODE_INSEE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCommunesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CommunesTableMap::COL_CODE_INSEE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the code_insee column
     *
     * Example usage:
     * <code>
     * $query->filterByCodeInsee('fooValue');   // WHERE code_insee = 'fooValue'
     * $query->filterByCodeInsee('%fooValue%', Criteria::LIKE); // WHERE code_insee LIKE '%fooValue%'
     * </code>
     *
     * @param     string $codeInsee The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommunesQuery The current query, for fluid interface
     */
    public function filterByCodeInsee($codeInsee = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codeInsee)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommunesTableMap::COL_CODE_INSEE, $codeInsee, $comparison);
    }

    /**
     * Filter the query on the nom column
     *
     * Example usage:
     * <code>
     * $query->filterByNom('fooValue');   // WHERE nom = 'fooValue'
     * $query->filterByNom('%fooValue%', Criteria::LIKE); // WHERE nom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nom The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCommunesQuery The current query, for fluid interface
     */
    public function filterByNom($nom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nom)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CommunesTableMap::COL_NOM, $nom, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCommunes $communes Object to remove from the list of results
     *
     * @return $this|ChildCommunesQuery The current query, for fluid interface
     */
    public function prune($communes = null)
    {
        if ($communes) {
            $this->addUsingAlias(CommunesTableMap::COL_CODE_INSEE, $communes->getCodeInsee(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the communes table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CommunesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CommunesTableMap::clearInstancePool();
            CommunesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CommunesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CommunesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CommunesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CommunesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CommunesQuery
