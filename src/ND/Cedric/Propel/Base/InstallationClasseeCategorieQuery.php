<?php

namespace ND\Cedric\Propel\Base;

use \Exception;
use \PDO;
use ND\Cedric\Propel\InstallationClasseeCategorie as ChildInstallationClasseeCategorie;
use ND\Cedric\Propel\InstallationClasseeCategorieQuery as ChildInstallationClasseeCategorieQuery;
use ND\Cedric\Propel\Map\InstallationClasseeCategorieTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'installation_categorie' table.
 *
 *
 *
 * @method     ChildInstallationClasseeCategorieQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildInstallationClasseeCategorieQuery orderByInstallationId($order = Criteria::ASC) Order by the installation_id column
 * @method     ChildInstallationClasseeCategorieQuery orderByRubriqueIc($order = Criteria::ASC) Order by the rubrique_ic column
 * @method     ChildInstallationClasseeCategorieQuery orderByAlinea($order = Criteria::ASC) Order by the alinea column
 * @method     ChildInstallationClasseeCategorieQuery orderByDateAutorisation($order = Criteria::ASC) Order by the date_autorisation column
 * @method     ChildInstallationClasseeCategorieQuery orderByEtatActivite($order = Criteria::ASC) Order by the etat_activite column
 * @method     ChildInstallationClasseeCategorieQuery orderByRegime($order = Criteria::ASC) Order by the regime column
 * @method     ChildInstallationClasseeCategorieQuery orderByActivite($order = Criteria::ASC) Order by the activite column
 * @method     ChildInstallationClasseeCategorieQuery orderByVolume($order = Criteria::ASC) Order by the volume column
 * @method     ChildInstallationClasseeCategorieQuery orderByUnite($order = Criteria::ASC) Order by the unite column
 *
 * @method     ChildInstallationClasseeCategorieQuery groupById() Group by the id column
 * @method     ChildInstallationClasseeCategorieQuery groupByInstallationId() Group by the installation_id column
 * @method     ChildInstallationClasseeCategorieQuery groupByRubriqueIc() Group by the rubrique_ic column
 * @method     ChildInstallationClasseeCategorieQuery groupByAlinea() Group by the alinea column
 * @method     ChildInstallationClasseeCategorieQuery groupByDateAutorisation() Group by the date_autorisation column
 * @method     ChildInstallationClasseeCategorieQuery groupByEtatActivite() Group by the etat_activite column
 * @method     ChildInstallationClasseeCategorieQuery groupByRegime() Group by the regime column
 * @method     ChildInstallationClasseeCategorieQuery groupByActivite() Group by the activite column
 * @method     ChildInstallationClasseeCategorieQuery groupByVolume() Group by the volume column
 * @method     ChildInstallationClasseeCategorieQuery groupByUnite() Group by the unite column
 *
 * @method     ChildInstallationClasseeCategorieQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInstallationClasseeCategorieQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInstallationClasseeCategorieQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInstallationClasseeCategorieQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildInstallationClasseeCategorieQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildInstallationClasseeCategorieQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildInstallationClasseeCategorieQuery leftJoinInstallationClassee($relationAlias = null) Adds a LEFT JOIN clause to the query using the InstallationClassee relation
 * @method     ChildInstallationClasseeCategorieQuery rightJoinInstallationClassee($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InstallationClassee relation
 * @method     ChildInstallationClasseeCategorieQuery innerJoinInstallationClassee($relationAlias = null) Adds a INNER JOIN clause to the query using the InstallationClassee relation
 *
 * @method     ChildInstallationClasseeCategorieQuery joinWithInstallationClassee($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InstallationClassee relation
 *
 * @method     ChildInstallationClasseeCategorieQuery leftJoinWithInstallationClassee() Adds a LEFT JOIN clause and with to the query using the InstallationClassee relation
 * @method     ChildInstallationClasseeCategorieQuery rightJoinWithInstallationClassee() Adds a RIGHT JOIN clause and with to the query using the InstallationClassee relation
 * @method     ChildInstallationClasseeCategorieQuery innerJoinWithInstallationClassee() Adds a INNER JOIN clause and with to the query using the InstallationClassee relation
 *
 * @method     \ND\Cedric\Propel\InstallationClasseeQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildInstallationClasseeCategorie findOne(ConnectionInterface $con = null) Return the first ChildInstallationClasseeCategorie matching the query
 * @method     ChildInstallationClasseeCategorie findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInstallationClasseeCategorie matching the query, or a new ChildInstallationClasseeCategorie object populated from the query conditions when no match is found
 *
 * @method     ChildInstallationClasseeCategorie findOneById(string $id) Return the first ChildInstallationClasseeCategorie filtered by the id column
 * @method     ChildInstallationClasseeCategorie findOneByInstallationId(string $installation_id) Return the first ChildInstallationClasseeCategorie filtered by the installation_id column
 * @method     ChildInstallationClasseeCategorie findOneByRubriqueIc(int $rubrique_ic) Return the first ChildInstallationClasseeCategorie filtered by the rubrique_ic column
 * @method     ChildInstallationClasseeCategorie findOneByAlinea(string $alinea) Return the first ChildInstallationClasseeCategorie filtered by the alinea column
 * @method     ChildInstallationClasseeCategorie findOneByDateAutorisation(string $date_autorisation) Return the first ChildInstallationClasseeCategorie filtered by the date_autorisation column
 * @method     ChildInstallationClasseeCategorie findOneByEtatActivite(string $etat_activite) Return the first ChildInstallationClasseeCategorie filtered by the etat_activite column
 * @method     ChildInstallationClasseeCategorie findOneByRegime(string $regime) Return the first ChildInstallationClasseeCategorie filtered by the regime column
 * @method     ChildInstallationClasseeCategorie findOneByActivite(string $activite) Return the first ChildInstallationClasseeCategorie filtered by the activite column
 * @method     ChildInstallationClasseeCategorie findOneByVolume(int $volume) Return the first ChildInstallationClasseeCategorie filtered by the volume column
 * @method     ChildInstallationClasseeCategorie findOneByUnite(string $unite) Return the first ChildInstallationClasseeCategorie filtered by the unite column *

 * @method     ChildInstallationClasseeCategorie requirePk($key, ConnectionInterface $con = null) Return the ChildInstallationClasseeCategorie by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationClasseeCategorie requireOne(ConnectionInterface $con = null) Return the first ChildInstallationClasseeCategorie matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInstallationClasseeCategorie requireOneById(string $id) Return the first ChildInstallationClasseeCategorie filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationClasseeCategorie requireOneByInstallationId(string $installation_id) Return the first ChildInstallationClasseeCategorie filtered by the installation_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationClasseeCategorie requireOneByRubriqueIc(int $rubrique_ic) Return the first ChildInstallationClasseeCategorie filtered by the rubrique_ic column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationClasseeCategorie requireOneByAlinea(string $alinea) Return the first ChildInstallationClasseeCategorie filtered by the alinea column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationClasseeCategorie requireOneByDateAutorisation(string $date_autorisation) Return the first ChildInstallationClasseeCategorie filtered by the date_autorisation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationClasseeCategorie requireOneByEtatActivite(string $etat_activite) Return the first ChildInstallationClasseeCategorie filtered by the etat_activite column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationClasseeCategorie requireOneByRegime(string $regime) Return the first ChildInstallationClasseeCategorie filtered by the regime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationClasseeCategorie requireOneByActivite(string $activite) Return the first ChildInstallationClasseeCategorie filtered by the activite column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationClasseeCategorie requireOneByVolume(int $volume) Return the first ChildInstallationClasseeCategorie filtered by the volume column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationClasseeCategorie requireOneByUnite(string $unite) Return the first ChildInstallationClasseeCategorie filtered by the unite column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInstallationClasseeCategorie[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInstallationClasseeCategorie objects based on current ModelCriteria
 * @method     ChildInstallationClasseeCategorie[]|ObjectCollection findById(string $id) Return ChildInstallationClasseeCategorie objects filtered by the id column
 * @method     ChildInstallationClasseeCategorie[]|ObjectCollection findByInstallationId(string $installation_id) Return ChildInstallationClasseeCategorie objects filtered by the installation_id column
 * @method     ChildInstallationClasseeCategorie[]|ObjectCollection findByRubriqueIc(int $rubrique_ic) Return ChildInstallationClasseeCategorie objects filtered by the rubrique_ic column
 * @method     ChildInstallationClasseeCategorie[]|ObjectCollection findByAlinea(string $alinea) Return ChildInstallationClasseeCategorie objects filtered by the alinea column
 * @method     ChildInstallationClasseeCategorie[]|ObjectCollection findByDateAutorisation(string $date_autorisation) Return ChildInstallationClasseeCategorie objects filtered by the date_autorisation column
 * @method     ChildInstallationClasseeCategorie[]|ObjectCollection findByEtatActivite(string $etat_activite) Return ChildInstallationClasseeCategorie objects filtered by the etat_activite column
 * @method     ChildInstallationClasseeCategorie[]|ObjectCollection findByRegime(string $regime) Return ChildInstallationClasseeCategorie objects filtered by the regime column
 * @method     ChildInstallationClasseeCategorie[]|ObjectCollection findByActivite(string $activite) Return ChildInstallationClasseeCategorie objects filtered by the activite column
 * @method     ChildInstallationClasseeCategorie[]|ObjectCollection findByVolume(int $volume) Return ChildInstallationClasseeCategorie objects filtered by the volume column
 * @method     ChildInstallationClasseeCategorie[]|ObjectCollection findByUnite(string $unite) Return ChildInstallationClasseeCategorie objects filtered by the unite column
 * @method     ChildInstallationClasseeCategorie[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InstallationClasseeCategorieQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \ND\Cedric\Propel\Base\InstallationClasseeCategorieQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ND\\Cedric\\Propel\\InstallationClasseeCategorie', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInstallationClasseeCategorieQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInstallationClasseeCategorieQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInstallationClasseeCategorieQuery) {
            return $criteria;
        }
        $query = new ChildInstallationClasseeCategorieQuery();
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
     * @return ChildInstallationClasseeCategorie|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InstallationClasseeCategorieTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = InstallationClasseeCategorieTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildInstallationClasseeCategorie A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, installation_id, rubrique_ic, alinea, date_autorisation, etat_activite, regime, activite, volume, unite FROM installation_categorie WHERE id = :p0 AND installation_id = :p1';
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
            /** @var ChildInstallationClasseeCategorie $obj */
            $obj = new ChildInstallationClasseeCategorie();
            $obj->hydrate($row);
            InstallationClasseeCategorieTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildInstallationClasseeCategorie|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildInstallationClasseeCategorieQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(InstallationClasseeCategorieTableMap::COL_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(InstallationClasseeCategorieTableMap::COL_INSTALLATION_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInstallationClasseeCategorieQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(InstallationClasseeCategorieTableMap::COL_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(InstallationClasseeCategorieTableMap::COL_INSTALLATION_ID, $key[1], Criteria::EQUAL);
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
     * @return $this|ChildInstallationClasseeCategorieQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($id)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationClasseeCategorieTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildInstallationClasseeCategorieQuery The current query, for fluid interface
     */
    public function filterByInstallationId($installationId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($installationId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationClasseeCategorieTableMap::COL_INSTALLATION_ID, $installationId, $comparison);
    }

    /**
     * Filter the query on the rubrique_ic column
     *
     * Example usage:
     * <code>
     * $query->filterByRubriqueIc(1234); // WHERE rubrique_ic = 1234
     * $query->filterByRubriqueIc(array(12, 34)); // WHERE rubrique_ic IN (12, 34)
     * $query->filterByRubriqueIc(array('min' => 12)); // WHERE rubrique_ic > 12
     * </code>
     *
     * @param     mixed $rubriqueIc The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationClasseeCategorieQuery The current query, for fluid interface
     */
    public function filterByRubriqueIc($rubriqueIc = null, $comparison = null)
    {
        if (is_array($rubriqueIc)) {
            $useMinMax = false;
            if (isset($rubriqueIc['min'])) {
                $this->addUsingAlias(InstallationClasseeCategorieTableMap::COL_RUBRIQUE_IC, $rubriqueIc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rubriqueIc['max'])) {
                $this->addUsingAlias(InstallationClasseeCategorieTableMap::COL_RUBRIQUE_IC, $rubriqueIc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationClasseeCategorieTableMap::COL_RUBRIQUE_IC, $rubriqueIc, $comparison);
    }

    /**
     * Filter the query on the alinea column
     *
     * Example usage:
     * <code>
     * $query->filterByAlinea('fooValue');   // WHERE alinea = 'fooValue'
     * $query->filterByAlinea('%fooValue%', Criteria::LIKE); // WHERE alinea LIKE '%fooValue%'
     * </code>
     *
     * @param     string $alinea The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationClasseeCategorieQuery The current query, for fluid interface
     */
    public function filterByAlinea($alinea = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($alinea)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationClasseeCategorieTableMap::COL_ALINEA, $alinea, $comparison);
    }

    /**
     * Filter the query on the date_autorisation column
     *
     * Example usage:
     * <code>
     * $query->filterByDateAutorisation('2011-03-14'); // WHERE date_autorisation = '2011-03-14'
     * $query->filterByDateAutorisation('now'); // WHERE date_autorisation = '2011-03-14'
     * $query->filterByDateAutorisation(array('max' => 'yesterday')); // WHERE date_autorisation > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateAutorisation The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationClasseeCategorieQuery The current query, for fluid interface
     */
    public function filterByDateAutorisation($dateAutorisation = null, $comparison = null)
    {
        if (is_array($dateAutorisation)) {
            $useMinMax = false;
            if (isset($dateAutorisation['min'])) {
                $this->addUsingAlias(InstallationClasseeCategorieTableMap::COL_DATE_AUTORISATION, $dateAutorisation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAutorisation['max'])) {
                $this->addUsingAlias(InstallationClasseeCategorieTableMap::COL_DATE_AUTORISATION, $dateAutorisation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationClasseeCategorieTableMap::COL_DATE_AUTORISATION, $dateAutorisation, $comparison);
    }

    /**
     * Filter the query on the etat_activite column
     *
     * Example usage:
     * <code>
     * $query->filterByEtatActivite('fooValue');   // WHERE etat_activite = 'fooValue'
     * $query->filterByEtatActivite('%fooValue%', Criteria::LIKE); // WHERE etat_activite LIKE '%fooValue%'
     * </code>
     *
     * @param     string $etatActivite The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationClasseeCategorieQuery The current query, for fluid interface
     */
    public function filterByEtatActivite($etatActivite = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($etatActivite)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationClasseeCategorieTableMap::COL_ETAT_ACTIVITE, $etatActivite, $comparison);
    }

    /**
     * Filter the query on the regime column
     *
     * Example usage:
     * <code>
     * $query->filterByRegime('fooValue');   // WHERE regime = 'fooValue'
     * $query->filterByRegime('%fooValue%', Criteria::LIKE); // WHERE regime LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regime The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationClasseeCategorieQuery The current query, for fluid interface
     */
    public function filterByRegime($regime = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regime)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationClasseeCategorieTableMap::COL_REGIME, $regime, $comparison);
    }

    /**
     * Filter the query on the activite column
     *
     * Example usage:
     * <code>
     * $query->filterByActivite('fooValue');   // WHERE activite = 'fooValue'
     * $query->filterByActivite('%fooValue%', Criteria::LIKE); // WHERE activite LIKE '%fooValue%'
     * </code>
     *
     * @param     string $activite The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationClasseeCategorieQuery The current query, for fluid interface
     */
    public function filterByActivite($activite = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($activite)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationClasseeCategorieTableMap::COL_ACTIVITE, $activite, $comparison);
    }

    /**
     * Filter the query on the volume column
     *
     * Example usage:
     * <code>
     * $query->filterByVolume(1234); // WHERE volume = 1234
     * $query->filterByVolume(array(12, 34)); // WHERE volume IN (12, 34)
     * $query->filterByVolume(array('min' => 12)); // WHERE volume > 12
     * </code>
     *
     * @param     mixed $volume The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationClasseeCategorieQuery The current query, for fluid interface
     */
    public function filterByVolume($volume = null, $comparison = null)
    {
        if (is_array($volume)) {
            $useMinMax = false;
            if (isset($volume['min'])) {
                $this->addUsingAlias(InstallationClasseeCategorieTableMap::COL_VOLUME, $volume['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($volume['max'])) {
                $this->addUsingAlias(InstallationClasseeCategorieTableMap::COL_VOLUME, $volume['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationClasseeCategorieTableMap::COL_VOLUME, $volume, $comparison);
    }

    /**
     * Filter the query on the unite column
     *
     * Example usage:
     * <code>
     * $query->filterByUnite('fooValue');   // WHERE unite = 'fooValue'
     * $query->filterByUnite('%fooValue%', Criteria::LIKE); // WHERE unite LIKE '%fooValue%'
     * </code>
     *
     * @param     string $unite The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationClasseeCategorieQuery The current query, for fluid interface
     */
    public function filterByUnite($unite = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($unite)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationClasseeCategorieTableMap::COL_UNITE, $unite, $comparison);
    }

    /**
     * Filter the query by a related \ND\Cedric\Propel\InstallationClassee object
     *
     * @param \ND\Cedric\Propel\InstallationClassee|ObjectCollection $installationClassee The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildInstallationClasseeCategorieQuery The current query, for fluid interface
     */
    public function filterByInstallationClassee($installationClassee, $comparison = null)
    {
        if ($installationClassee instanceof \ND\Cedric\Propel\InstallationClassee) {
            return $this
                ->addUsingAlias(InstallationClasseeCategorieTableMap::COL_INSTALLATION_ID, $installationClassee->getId(), $comparison);
        } elseif ($installationClassee instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InstallationClasseeCategorieTableMap::COL_INSTALLATION_ID, $installationClassee->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildInstallationClasseeCategorieQuery The current query, for fluid interface
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
     * @param   ChildInstallationClasseeCategorie $installationClasseeCategorie Object to remove from the list of results
     *
     * @return $this|ChildInstallationClasseeCategorieQuery The current query, for fluid interface
     */
    public function prune($installationClasseeCategorie = null)
    {
        if ($installationClasseeCategorie) {
            $this->addCond('pruneCond0', $this->getAliasedColName(InstallationClasseeCategorieTableMap::COL_ID), $installationClasseeCategorie->getId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(InstallationClasseeCategorieTableMap::COL_INSTALLATION_ID), $installationClasseeCategorie->getInstallationId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the installation_categorie table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InstallationClasseeCategorieTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InstallationClasseeCategorieTableMap::clearInstancePool();
            InstallationClasseeCategorieTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InstallationClasseeCategorieTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InstallationClasseeCategorieTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InstallationClasseeCategorieTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InstallationClasseeCategorieTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InstallationClasseeCategorieQuery
