<?php

namespace ND\Cedric\Propel\Base;

use \Exception;
use \PDO;
use ND\Cedric\Propel\Utilisateur as ChildUtilisateur;
use ND\Cedric\Propel\UtilisateurQuery as ChildUtilisateurQuery;
use ND\Cedric\Propel\Map\UtilisateurTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'utilisateur' table.
 *
 *
 *
 * @method     ChildUtilisateurQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildUtilisateurQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildUtilisateurQuery orderByPassword($order = Criteria::ASC) Order by the password column
 *
 * @method     ChildUtilisateurQuery groupById() Group by the id column
 * @method     ChildUtilisateurQuery groupByEmail() Group by the email column
 * @method     ChildUtilisateurQuery groupByPassword() Group by the password column
 *
 * @method     ChildUtilisateurQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUtilisateurQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUtilisateurQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUtilisateurQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUtilisateurQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUtilisateurQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUtilisateurQuery leftJoinUtilisateurDepartementsQuery($relationAlias = null) Adds a LEFT JOIN clause to the query using the UtilisateurDepartementsQuery relation
 * @method     ChildUtilisateurQuery rightJoinUtilisateurDepartementsQuery($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UtilisateurDepartementsQuery relation
 * @method     ChildUtilisateurQuery innerJoinUtilisateurDepartementsQuery($relationAlias = null) Adds a INNER JOIN clause to the query using the UtilisateurDepartementsQuery relation
 *
 * @method     ChildUtilisateurQuery joinWithUtilisateurDepartementsQuery($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the UtilisateurDepartementsQuery relation
 *
 * @method     ChildUtilisateurQuery leftJoinWithUtilisateurDepartementsQuery() Adds a LEFT JOIN clause and with to the query using the UtilisateurDepartementsQuery relation
 * @method     ChildUtilisateurQuery rightJoinWithUtilisateurDepartementsQuery() Adds a RIGHT JOIN clause and with to the query using the UtilisateurDepartementsQuery relation
 * @method     ChildUtilisateurQuery innerJoinWithUtilisateurDepartementsQuery() Adds a INNER JOIN clause and with to the query using the UtilisateurDepartementsQuery relation
 *
 * @method     ChildUtilisateurQuery leftJoinUtilisateurCommunesQuery($relationAlias = null) Adds a LEFT JOIN clause to the query using the UtilisateurCommunesQuery relation
 * @method     ChildUtilisateurQuery rightJoinUtilisateurCommunesQuery($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UtilisateurCommunesQuery relation
 * @method     ChildUtilisateurQuery innerJoinUtilisateurCommunesQuery($relationAlias = null) Adds a INNER JOIN clause to the query using the UtilisateurCommunesQuery relation
 *
 * @method     ChildUtilisateurQuery joinWithUtilisateurCommunesQuery($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the UtilisateurCommunesQuery relation
 *
 * @method     ChildUtilisateurQuery leftJoinWithUtilisateurCommunesQuery() Adds a LEFT JOIN clause and with to the query using the UtilisateurCommunesQuery relation
 * @method     ChildUtilisateurQuery rightJoinWithUtilisateurCommunesQuery() Adds a RIGHT JOIN clause and with to the query using the UtilisateurCommunesQuery relation
 * @method     ChildUtilisateurQuery innerJoinWithUtilisateurCommunesQuery() Adds a INNER JOIN clause and with to the query using the UtilisateurCommunesQuery relation
 *
 * @method     \ND\Cedric\Propel\UtilisateurDepartementsQuery|\ND\Cedric\Propel\UtilisateurCommunesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildUtilisateur findOne(ConnectionInterface $con = null) Return the first ChildUtilisateur matching the query
 * @method     ChildUtilisateur findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUtilisateur matching the query, or a new ChildUtilisateur object populated from the query conditions when no match is found
 *
 * @method     ChildUtilisateur findOneById(int $id) Return the first ChildUtilisateur filtered by the id column
 * @method     ChildUtilisateur findOneByEmail(string $email) Return the first ChildUtilisateur filtered by the email column
 * @method     ChildUtilisateur findOneByPassword(string $password) Return the first ChildUtilisateur filtered by the password column *

 * @method     ChildUtilisateur requirePk($key, ConnectionInterface $con = null) Return the ChildUtilisateur by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtilisateur requireOne(ConnectionInterface $con = null) Return the first ChildUtilisateur matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUtilisateur requireOneById(int $id) Return the first ChildUtilisateur filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtilisateur requireOneByEmail(string $email) Return the first ChildUtilisateur filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUtilisateur requireOneByPassword(string $password) Return the first ChildUtilisateur filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUtilisateur[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUtilisateur objects based on current ModelCriteria
 * @method     ChildUtilisateur[]|ObjectCollection findById(int $id) Return ChildUtilisateur objects filtered by the id column
 * @method     ChildUtilisateur[]|ObjectCollection findByEmail(string $email) Return ChildUtilisateur objects filtered by the email column
 * @method     ChildUtilisateur[]|ObjectCollection findByPassword(string $password) Return ChildUtilisateur objects filtered by the password column
 * @method     ChildUtilisateur[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UtilisateurQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \ND\Cedric\Propel\Base\UtilisateurQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ND\\Cedric\\Propel\\Utilisateur', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUtilisateurQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUtilisateurQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUtilisateurQuery) {
            return $criteria;
        }
        $query = new ChildUtilisateurQuery();
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
     * @return ChildUtilisateur|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UtilisateurTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UtilisateurTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildUtilisateur A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, email, password FROM utilisateur WHERE id = :p0';
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
            /** @var ChildUtilisateur $obj */
            $obj = new ChildUtilisateur();
            $obj->hydrate($row);
            UtilisateurTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildUtilisateur|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UtilisateurTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UtilisateurTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UtilisateurTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UtilisateurTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilisateurTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilisateurTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UtilisateurTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query by a related \ND\Cedric\Propel\UtilisateurDepartements object
     *
     * @param \ND\Cedric\Propel\UtilisateurDepartements|ObjectCollection $utilisateurDepartements the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterByUtilisateurDepartementsQuery($utilisateurDepartements, $comparison = null)
    {
        if ($utilisateurDepartements instanceof \ND\Cedric\Propel\UtilisateurDepartements) {
            return $this
                ->addUsingAlias(UtilisateurTableMap::COL_ID, $utilisateurDepartements->getUtilisateurId(), $comparison);
        } elseif ($utilisateurDepartements instanceof ObjectCollection) {
            return $this
                ->useUtilisateurDepartementsQueryQuery()
                ->filterByPrimaryKeys($utilisateurDepartements->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUtilisateurDepartementsQuery() only accepts arguments of type \ND\Cedric\Propel\UtilisateurDepartements or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UtilisateurDepartementsQuery relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function joinUtilisateurDepartementsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UtilisateurDepartementsQuery');

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
            $this->addJoinObject($join, 'UtilisateurDepartementsQuery');
        }

        return $this;
    }

    /**
     * Use the UtilisateurDepartementsQuery relation UtilisateurDepartements object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ND\Cedric\Propel\UtilisateurDepartementsQuery A secondary query class using the current class as primary query
     */
    public function useUtilisateurDepartementsQueryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUtilisateurDepartementsQuery($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UtilisateurDepartementsQuery', '\ND\Cedric\Propel\UtilisateurDepartementsQuery');
    }

    /**
     * Filter the query by a related \ND\Cedric\Propel\UtilisateurCommunes object
     *
     * @param \ND\Cedric\Propel\UtilisateurCommunes|ObjectCollection $utilisateurCommunes the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUtilisateurQuery The current query, for fluid interface
     */
    public function filterByUtilisateurCommunesQuery($utilisateurCommunes, $comparison = null)
    {
        if ($utilisateurCommunes instanceof \ND\Cedric\Propel\UtilisateurCommunes) {
            return $this
                ->addUsingAlias(UtilisateurTableMap::COL_ID, $utilisateurCommunes->getUtilisateurId(), $comparison);
        } elseif ($utilisateurCommunes instanceof ObjectCollection) {
            return $this
                ->useUtilisateurCommunesQueryQuery()
                ->filterByPrimaryKeys($utilisateurCommunes->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUtilisateurCommunesQuery() only accepts arguments of type \ND\Cedric\Propel\UtilisateurCommunes or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UtilisateurCommunesQuery relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function joinUtilisateurCommunesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UtilisateurCommunesQuery');

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
            $this->addJoinObject($join, 'UtilisateurCommunesQuery');
        }

        return $this;
    }

    /**
     * Use the UtilisateurCommunesQuery relation UtilisateurCommunes object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ND\Cedric\Propel\UtilisateurCommunesQuery A secondary query class using the current class as primary query
     */
    public function useUtilisateurCommunesQueryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUtilisateurCommunesQuery($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UtilisateurCommunesQuery', '\ND\Cedric\Propel\UtilisateurCommunesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildUtilisateur $utilisateur Object to remove from the list of results
     *
     * @return $this|ChildUtilisateurQuery The current query, for fluid interface
     */
    public function prune($utilisateur = null)
    {
        if ($utilisateur) {
            $this->addUsingAlias(UtilisateurTableMap::COL_ID, $utilisateur->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the utilisateur table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UtilisateurTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UtilisateurTableMap::clearInstancePool();
            UtilisateurTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(UtilisateurTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UtilisateurTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UtilisateurTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UtilisateurTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UtilisateurQuery
