<?php

namespace ND\Cedric\Propel\Base;

use \Exception;
use \PDO;
use ND\Cedric\Propel\InstallationDoc as ChildInstallationDoc;
use ND\Cedric\Propel\InstallationDocQuery as ChildInstallationDocQuery;
use ND\Cedric\Propel\Map\InstallationDocTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'installation_docs' table.
 *
 *
 *
 * @method     ChildInstallationDocQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildInstallationDocQuery orderByDateDoc($order = Criteria::ASC) Order by the date_doc column
 * @method     ChildInstallationDocQuery orderByInstallationId($order = Criteria::ASC) Order by the installation_id column
 * @method     ChildInstallationDocQuery orderByTypeDoc($order = Criteria::ASC) Order by the type_doc column
 * @method     ChildInstallationDocQuery orderByUrlDoc($order = Criteria::ASC) Order by the url_doc column
 * @method     ChildInstallationDocQuery orderByTitreDoc($order = Criteria::ASC) Order by the titre_doc column
 * @method     ChildInstallationDocQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildInstallationDocQuery orderByNouveau($order = Criteria::ASC) Order by the nouveau column
 *
 * @method     ChildInstallationDocQuery groupById() Group by the id column
 * @method     ChildInstallationDocQuery groupByDateDoc() Group by the date_doc column
 * @method     ChildInstallationDocQuery groupByInstallationId() Group by the installation_id column
 * @method     ChildInstallationDocQuery groupByTypeDoc() Group by the type_doc column
 * @method     ChildInstallationDocQuery groupByUrlDoc() Group by the url_doc column
 * @method     ChildInstallationDocQuery groupByTitreDoc() Group by the titre_doc column
 * @method     ChildInstallationDocQuery groupByDescription() Group by the description column
 * @method     ChildInstallationDocQuery groupByNouveau() Group by the nouveau column
 *
 * @method     ChildInstallationDocQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInstallationDocQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInstallationDocQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInstallationDocQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildInstallationDocQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildInstallationDocQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildInstallationDocQuery leftJoinInstallationClassee($relationAlias = null) Adds a LEFT JOIN clause to the query using the InstallationClassee relation
 * @method     ChildInstallationDocQuery rightJoinInstallationClassee($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InstallationClassee relation
 * @method     ChildInstallationDocQuery innerJoinInstallationClassee($relationAlias = null) Adds a INNER JOIN clause to the query using the InstallationClassee relation
 *
 * @method     ChildInstallationDocQuery joinWithInstallationClassee($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InstallationClassee relation
 *
 * @method     ChildInstallationDocQuery leftJoinWithInstallationClassee() Adds a LEFT JOIN clause and with to the query using the InstallationClassee relation
 * @method     ChildInstallationDocQuery rightJoinWithInstallationClassee() Adds a RIGHT JOIN clause and with to the query using the InstallationClassee relation
 * @method     ChildInstallationDocQuery innerJoinWithInstallationClassee() Adds a INNER JOIN clause and with to the query using the InstallationClassee relation
 *
 * @method     \ND\Cedric\Propel\InstallationClasseeQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildInstallationDoc findOne(ConnectionInterface $con = null) Return the first ChildInstallationDoc matching the query
 * @method     ChildInstallationDoc findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInstallationDoc matching the query, or a new ChildInstallationDoc object populated from the query conditions when no match is found
 *
 * @method     ChildInstallationDoc findOneById(string $id) Return the first ChildInstallationDoc filtered by the id column
 * @method     ChildInstallationDoc findOneByDateDoc(string $date_doc) Return the first ChildInstallationDoc filtered by the date_doc column
 * @method     ChildInstallationDoc findOneByInstallationId(string $installation_id) Return the first ChildInstallationDoc filtered by the installation_id column
 * @method     ChildInstallationDoc findOneByTypeDoc(string $type_doc) Return the first ChildInstallationDoc filtered by the type_doc column
 * @method     ChildInstallationDoc findOneByUrlDoc(string $url_doc) Return the first ChildInstallationDoc filtered by the url_doc column
 * @method     ChildInstallationDoc findOneByTitreDoc(string $titre_doc) Return the first ChildInstallationDoc filtered by the titre_doc column
 * @method     ChildInstallationDoc findOneByDescription(string $description) Return the first ChildInstallationDoc filtered by the description column
 * @method     ChildInstallationDoc findOneByNouveau(boolean $nouveau) Return the first ChildInstallationDoc filtered by the nouveau column *

 * @method     ChildInstallationDoc requirePk($key, ConnectionInterface $con = null) Return the ChildInstallationDoc by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationDoc requireOne(ConnectionInterface $con = null) Return the first ChildInstallationDoc matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInstallationDoc requireOneById(string $id) Return the first ChildInstallationDoc filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationDoc requireOneByDateDoc(string $date_doc) Return the first ChildInstallationDoc filtered by the date_doc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationDoc requireOneByInstallationId(string $installation_id) Return the first ChildInstallationDoc filtered by the installation_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationDoc requireOneByTypeDoc(string $type_doc) Return the first ChildInstallationDoc filtered by the type_doc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationDoc requireOneByUrlDoc(string $url_doc) Return the first ChildInstallationDoc filtered by the url_doc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationDoc requireOneByTitreDoc(string $titre_doc) Return the first ChildInstallationDoc filtered by the titre_doc column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationDoc requireOneByDescription(string $description) Return the first ChildInstallationDoc filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationDoc requireOneByNouveau(boolean $nouveau) Return the first ChildInstallationDoc filtered by the nouveau column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInstallationDoc[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInstallationDoc objects based on current ModelCriteria
 * @method     ChildInstallationDoc[]|ObjectCollection findById(string $id) Return ChildInstallationDoc objects filtered by the id column
 * @method     ChildInstallationDoc[]|ObjectCollection findByDateDoc(string $date_doc) Return ChildInstallationDoc objects filtered by the date_doc column
 * @method     ChildInstallationDoc[]|ObjectCollection findByInstallationId(string $installation_id) Return ChildInstallationDoc objects filtered by the installation_id column
 * @method     ChildInstallationDoc[]|ObjectCollection findByTypeDoc(string $type_doc) Return ChildInstallationDoc objects filtered by the type_doc column
 * @method     ChildInstallationDoc[]|ObjectCollection findByUrlDoc(string $url_doc) Return ChildInstallationDoc objects filtered by the url_doc column
 * @method     ChildInstallationDoc[]|ObjectCollection findByTitreDoc(string $titre_doc) Return ChildInstallationDoc objects filtered by the titre_doc column
 * @method     ChildInstallationDoc[]|ObjectCollection findByDescription(string $description) Return ChildInstallationDoc objects filtered by the description column
 * @method     ChildInstallationDoc[]|ObjectCollection findByNouveau(boolean $nouveau) Return ChildInstallationDoc objects filtered by the nouveau column
 * @method     ChildInstallationDoc[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InstallationDocQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \ND\Cedric\Propel\Base\InstallationDocQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ND\\Cedric\\Propel\\InstallationDoc', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInstallationDocQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInstallationDocQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInstallationDocQuery) {
            return $criteria;
        }
        $query = new ChildInstallationDocQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$id, $installation_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildInstallationDoc|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InstallationDocTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = InstallationDocTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildInstallationDoc A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, date_doc, installation_id, type_doc, url_doc, titre_doc, description, nouveau FROM installation_docs WHERE id = :p0 AND installation_id = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildInstallationDoc $obj */
            $obj = new ChildInstallationDoc();
            $obj->hydrate($row);
            InstallationDocTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildInstallationDoc|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildInstallationDocQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(InstallationDocTableMap::COL_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(InstallationDocTableMap::COL_INSTALLATION_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInstallationDocQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(InstallationDocTableMap::COL_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(InstallationDocTableMap::COL_INSTALLATION_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById('fooValue');   // WHERE id = 'fooValue'
     * $query->filterById('%fooValue%', Criteria::LIKE); // WHERE id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $id The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationDocQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($id)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationDocTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the date_doc column
     *
     * Example usage:
     * <code>
     * $query->filterByDateDoc('2011-03-14'); // WHERE date_doc = '2011-03-14'
     * $query->filterByDateDoc('now'); // WHERE date_doc = '2011-03-14'
     * $query->filterByDateDoc(array('max' => 'yesterday')); // WHERE date_doc > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateDoc The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationDocQuery The current query, for fluid interface
     */
    public function filterByDateDoc($dateDoc = null, $comparison = null)
    {
        if (is_array($dateDoc)) {
            $useMinMax = false;
            if (isset($dateDoc['min'])) {
                $this->addUsingAlias(InstallationDocTableMap::COL_DATE_DOC, $dateDoc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateDoc['max'])) {
                $this->addUsingAlias(InstallationDocTableMap::COL_DATE_DOC, $dateDoc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationDocTableMap::COL_DATE_DOC, $dateDoc, $comparison);
    }

    /**
     * Filter the query on the installation_id column
     *
     * Example usage:
     * <code>
     * $query->filterByInstallationId('fooValue');   // WHERE installation_id = 'fooValue'
     * $query->filterByInstallationId('%fooValue%', Criteria::LIKE); // WHERE installation_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $installationId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationDocQuery The current query, for fluid interface
     */
    public function filterByInstallationId($installationId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($installationId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationDocTableMap::COL_INSTALLATION_ID, $installationId, $comparison);
    }

    /**
     * Filter the query on the type_doc column
     *
     * Example usage:
     * <code>
     * $query->filterByTypeDoc('fooValue');   // WHERE type_doc = 'fooValue'
     * $query->filterByTypeDoc('%fooValue%', Criteria::LIKE); // WHERE type_doc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $typeDoc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationDocQuery The current query, for fluid interface
     */
    public function filterByTypeDoc($typeDoc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($typeDoc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationDocTableMap::COL_TYPE_DOC, $typeDoc, $comparison);
    }

    /**
     * Filter the query on the url_doc column
     *
     * Example usage:
     * <code>
     * $query->filterByUrlDoc('fooValue');   // WHERE url_doc = 'fooValue'
     * $query->filterByUrlDoc('%fooValue%', Criteria::LIKE); // WHERE url_doc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $urlDoc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationDocQuery The current query, for fluid interface
     */
    public function filterByUrlDoc($urlDoc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($urlDoc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationDocTableMap::COL_URL_DOC, $urlDoc, $comparison);
    }

    /**
     * Filter the query on the titre_doc column
     *
     * Example usage:
     * <code>
     * $query->filterByTitreDoc('fooValue');   // WHERE titre_doc = 'fooValue'
     * $query->filterByTitreDoc('%fooValue%', Criteria::LIKE); // WHERE titre_doc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $titreDoc The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationDocQuery The current query, for fluid interface
     */
    public function filterByTitreDoc($titreDoc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($titreDoc)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationDocTableMap::COL_TITRE_DOC, $titreDoc, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationDocQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationDocTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the nouveau column
     *
     * Example usage:
     * <code>
     * $query->filterByNouveau(true); // WHERE nouveau = true
     * $query->filterByNouveau('yes'); // WHERE nouveau = true
     * </code>
     *
     * @param     boolean|string $nouveau The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationDocQuery The current query, for fluid interface
     */
    public function filterByNouveau($nouveau = null, $comparison = null)
    {
        if (is_string($nouveau)) {
            $nouveau = in_array(strtolower($nouveau), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(InstallationDocTableMap::COL_NOUVEAU, $nouveau, $comparison);
    }

    /**
     * Filter the query by a related \ND\Cedric\Propel\InstallationClassee object
     *
     * @param \ND\Cedric\Propel\InstallationClassee|ObjectCollection $installationClassee The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInstallationDocQuery The current query, for fluid interface
     */
    public function filterByInstallationClassee($installationClassee, $comparison = null)
    {
        if ($installationClassee instanceof \ND\Cedric\Propel\InstallationClassee) {
            return $this
                ->addUsingAlias(InstallationDocTableMap::COL_INSTALLATION_ID, $installationClassee->getId(), $comparison);
        } elseif ($installationClassee instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InstallationDocTableMap::COL_INSTALLATION_ID, $installationClassee->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByInstallationClassee() only accepts arguments of type \ND\Cedric\Propel\InstallationClassee or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InstallationClassee relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInstallationDocQuery The current query, for fluid interface
     */
    public function joinInstallationClassee($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InstallationClassee');

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
            $this->addJoinObject($join, 'InstallationClassee');
        }

        return $this;
    }

    /**
     * Use the InstallationClassee relation InstallationClassee object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ND\Cedric\Propel\InstallationClasseeQuery A secondary query class using the current class as primary query
     */
    public function useInstallationClasseeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInstallationClassee($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InstallationClassee', '\ND\Cedric\Propel\InstallationClasseeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildInstallationDoc $installationDoc Object to remove from the list of results
     *
     * @return $this|ChildInstallationDocQuery The current query, for fluid interface
     */
    public function prune($installationDoc = null)
    {
        if ($installationDoc) {
            $this->addCond('pruneCond0', $this->getAliasedColName(InstallationDocTableMap::COL_ID), $installationDoc->getId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(InstallationDocTableMap::COL_INSTALLATION_ID), $installationDoc->getInstallationId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the installation_docs table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InstallationDocTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InstallationDocTableMap::clearInstancePool();
            InstallationDocTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InstallationDocTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InstallationDocTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InstallationDocTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InstallationDocTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InstallationDocQuery
