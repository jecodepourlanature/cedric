<?php

namespace ND\Cedric\Propel\Base;

use \Exception;
use \PDO;
use ND\Cedric\Propel\InstallationClassee as ChildInstallationClassee;
use ND\Cedric\Propel\InstallationClasseeQuery as ChildInstallationClasseeQuery;
use ND\Cedric\Propel\Map\InstallationClasseeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'installation' table.
 *
 *
 *
 * @method     ChildInstallationClasseeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildInstallationClasseeQuery orderByNomEtablissement($order = Criteria::ASC) Order by the nom_etablissement column
 * @method     ChildInstallationClasseeQuery orderByCodePostal($order = Criteria::ASC) Order by the code_postal column
 * @method     ChildInstallationClasseeQuery orderByCommune($order = Criteria::ASC) Order by the commune column
 * @method     ChildInstallationClasseeQuery orderByDepartement($order = Criteria::ASC) Order by the departement column
 * @method     ChildInstallationClasseeQuery orderByRegime($order = Criteria::ASC) Order by the regime column
 * @method     ChildInstallationClasseeQuery orderBySeveso($order = Criteria::ASC) Order by the seveso column
 * @method     ChildInstallationClasseeQuery orderByEtatActivite($order = Criteria::ASC) Order by the etat_activite column
 * @method     ChildInstallationClasseeQuery orderByPrioriteNationale($order = Criteria::ASC) Order by the priorite_nationale column
 * @method     ChildInstallationClasseeQuery orderByIedmtd($order = Criteria::ASC) Order by the IEDMTD column
 *
 * @method     ChildInstallationClasseeQuery groupById() Group by the id column
 * @method     ChildInstallationClasseeQuery groupByNomEtablissement() Group by the nom_etablissement column
 * @method     ChildInstallationClasseeQuery groupByCodePostal() Group by the code_postal column
 * @method     ChildInstallationClasseeQuery groupByCommune() Group by the commune column
 * @method     ChildInstallationClasseeQuery groupByDepartement() Group by the departement column
 * @method     ChildInstallationClasseeQuery groupByRegime() Group by the regime column
 * @method     ChildInstallationClasseeQuery groupBySeveso() Group by the seveso column
 * @method     ChildInstallationClasseeQuery groupByEtatActivite() Group by the etat_activite column
 * @method     ChildInstallationClasseeQuery groupByPrioriteNationale() Group by the priorite_nationale column
 * @method     ChildInstallationClasseeQuery groupByIedmtd() Group by the IEDMTD column
 *
 * @method     ChildInstallationClasseeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInstallationClasseeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInstallationClasseeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInstallationClasseeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildInstallationClasseeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildInstallationClasseeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildInstallationClasseeQuery leftJoinInstallationClasseeCatQuery($relationAlias = null) Adds a LEFT JOIN clause to the query using the InstallationClasseeCatQuery relation
 * @method     ChildInstallationClasseeQuery rightJoinInstallationClasseeCatQuery($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InstallationClasseeCatQuery relation
 * @method     ChildInstallationClasseeQuery innerJoinInstallationClasseeCatQuery($relationAlias = null) Adds a INNER JOIN clause to the query using the InstallationClasseeCatQuery relation
 *
 * @method     ChildInstallationClasseeQuery joinWithInstallationClasseeCatQuery($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InstallationClasseeCatQuery relation
 *
 * @method     ChildInstallationClasseeQuery leftJoinWithInstallationClasseeCatQuery() Adds a LEFT JOIN clause and with to the query using the InstallationClasseeCatQuery relation
 * @method     ChildInstallationClasseeQuery rightJoinWithInstallationClasseeCatQuery() Adds a RIGHT JOIN clause and with to the query using the InstallationClasseeCatQuery relation
 * @method     ChildInstallationClasseeQuery innerJoinWithInstallationClasseeCatQuery() Adds a INNER JOIN clause and with to the query using the InstallationClasseeCatQuery relation
 *
 * @method     ChildInstallationClasseeQuery leftJoinInstallationClasseeDocQuery($relationAlias = null) Adds a LEFT JOIN clause to the query using the InstallationClasseeDocQuery relation
 * @method     ChildInstallationClasseeQuery rightJoinInstallationClasseeDocQuery($relationAlias = null) Adds a RIGHT JOIN clause to the query using the InstallationClasseeDocQuery relation
 * @method     ChildInstallationClasseeQuery innerJoinInstallationClasseeDocQuery($relationAlias = null) Adds a INNER JOIN clause to the query using the InstallationClasseeDocQuery relation
 *
 * @method     ChildInstallationClasseeQuery joinWithInstallationClasseeDocQuery($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the InstallationClasseeDocQuery relation
 *
 * @method     ChildInstallationClasseeQuery leftJoinWithInstallationClasseeDocQuery() Adds a LEFT JOIN clause and with to the query using the InstallationClasseeDocQuery relation
 * @method     ChildInstallationClasseeQuery rightJoinWithInstallationClasseeDocQuery() Adds a RIGHT JOIN clause and with to the query using the InstallationClasseeDocQuery relation
 * @method     ChildInstallationClasseeQuery innerJoinWithInstallationClasseeDocQuery() Adds a INNER JOIN clause and with to the query using the InstallationClasseeDocQuery relation
 *
 * @method     \ND\Cedric\Propel\InstallationClasseeCategorieQuery|\ND\Cedric\Propel\InstallationDocQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildInstallationClassee findOne(ConnectionInterface $con = null) Return the first ChildInstallationClassee matching the query
 * @method     ChildInstallationClassee findOneOrCreate(ConnectionInterface $con = null) Return the first ChildInstallationClassee matching the query, or a new ChildInstallationClassee object populated from the query conditions when no match is found
 *
 * @method     ChildInstallationClassee findOneById(string $id) Return the first ChildInstallationClassee filtered by the id column
 * @method     ChildInstallationClassee findOneByNomEtablissement(string $nom_etablissement) Return the first ChildInstallationClassee filtered by the nom_etablissement column
 * @method     ChildInstallationClassee findOneByCodePostal(string $code_postal) Return the first ChildInstallationClassee filtered by the code_postal column
 * @method     ChildInstallationClassee findOneByCommune(string $commune) Return the first ChildInstallationClassee filtered by the commune column
 * @method     ChildInstallationClassee findOneByDepartement(string $departement) Return the first ChildInstallationClassee filtered by the departement column
 * @method     ChildInstallationClassee findOneByRegime(string $regime) Return the first ChildInstallationClassee filtered by the regime column
 * @method     ChildInstallationClassee findOneBySeveso(boolean $seveso) Return the first ChildInstallationClassee filtered by the seveso column
 * @method     ChildInstallationClassee findOneByEtatActivite(string $etat_activite) Return the first ChildInstallationClassee filtered by the etat_activite column
 * @method     ChildInstallationClassee findOneByPrioriteNationale(boolean $priorite_nationale) Return the first ChildInstallationClassee filtered by the priorite_nationale column
 * @method     ChildInstallationClassee findOneByIedmtd(boolean $IEDMTD) Return the first ChildInstallationClassee filtered by the IEDMTD column *

 * @method     ChildInstallationClassee requirePk($key, ConnectionInterface $con = null) Return the ChildInstallationClassee by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationClassee requireOne(ConnectionInterface $con = null) Return the first ChildInstallationClassee matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInstallationClassee requireOneById(string $id) Return the first ChildInstallationClassee filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationClassee requireOneByNomEtablissement(string $nom_etablissement) Return the first ChildInstallationClassee filtered by the nom_etablissement column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationClassee requireOneByCodePostal(string $code_postal) Return the first ChildInstallationClassee filtered by the code_postal column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationClassee requireOneByCommune(string $commune) Return the first ChildInstallationClassee filtered by the commune column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationClassee requireOneByDepartement(string $departement) Return the first ChildInstallationClassee filtered by the departement column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationClassee requireOneByRegime(string $regime) Return the first ChildInstallationClassee filtered by the regime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationClassee requireOneBySeveso(boolean $seveso) Return the first ChildInstallationClassee filtered by the seveso column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationClassee requireOneByEtatActivite(string $etat_activite) Return the first ChildInstallationClassee filtered by the etat_activite column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationClassee requireOneByPrioriteNationale(boolean $priorite_nationale) Return the first ChildInstallationClassee filtered by the priorite_nationale column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInstallationClassee requireOneByIedmtd(boolean $IEDMTD) Return the first ChildInstallationClassee filtered by the IEDMTD column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInstallationClassee[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildInstallationClassee objects based on current ModelCriteria
 * @method     ChildInstallationClassee[]|ObjectCollection findById(string $id) Return ChildInstallationClassee objects filtered by the id column
 * @method     ChildInstallationClassee[]|ObjectCollection findByNomEtablissement(string $nom_etablissement) Return ChildInstallationClassee objects filtered by the nom_etablissement column
 * @method     ChildInstallationClassee[]|ObjectCollection findByCodePostal(string $code_postal) Return ChildInstallationClassee objects filtered by the code_postal column
 * @method     ChildInstallationClassee[]|ObjectCollection findByCommune(string $commune) Return ChildInstallationClassee objects filtered by the commune column
 * @method     ChildInstallationClassee[]|ObjectCollection findByDepartement(string $departement) Return ChildInstallationClassee objects filtered by the departement column
 * @method     ChildInstallationClassee[]|ObjectCollection findByRegime(string $regime) Return ChildInstallationClassee objects filtered by the regime column
 * @method     ChildInstallationClassee[]|ObjectCollection findBySeveso(boolean $seveso) Return ChildInstallationClassee objects filtered by the seveso column
 * @method     ChildInstallationClassee[]|ObjectCollection findByEtatActivite(string $etat_activite) Return ChildInstallationClassee objects filtered by the etat_activite column
 * @method     ChildInstallationClassee[]|ObjectCollection findByPrioriteNationale(boolean $priorite_nationale) Return ChildInstallationClassee objects filtered by the priorite_nationale column
 * @method     ChildInstallationClassee[]|ObjectCollection findByIedmtd(boolean $IEDMTD) Return ChildInstallationClassee objects filtered by the IEDMTD column
 * @method     ChildInstallationClassee[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class InstallationClasseeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \ND\Cedric\Propel\Base\InstallationClasseeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ND\\Cedric\\Propel\\InstallationClassee', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildInstallationClasseeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildInstallationClasseeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildInstallationClasseeQuery) {
            return $criteria;
        }
        $query = new ChildInstallationClasseeQuery();
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
     * @return ChildInstallationClassee|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InstallationClasseeTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = InstallationClasseeTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildInstallationClassee A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nom_etablissement, code_postal, commune, departement, regime, seveso, etat_activite, priorite_nationale, IEDMTD FROM installation WHERE id = :p0';
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
            /** @var ChildInstallationClassee $obj */
            $obj = new ChildInstallationClassee();
            $obj->hydrate($row);
            InstallationClasseeTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildInstallationClassee|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildInstallationClasseeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(InstallationClasseeTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildInstallationClasseeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(InstallationClasseeTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildInstallationClasseeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($id)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationClasseeTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the nom_etablissement column
     *
     * Example usage:
     * <code>
     * $query->filterByNomEtablissement('fooValue');   // WHERE nom_etablissement = 'fooValue'
     * $query->filterByNomEtablissement('%fooValue%', Criteria::LIKE); // WHERE nom_etablissement LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomEtablissement The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationClasseeQuery The current query, for fluid interface
     */
    public function filterByNomEtablissement($nomEtablissement = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomEtablissement)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationClasseeTableMap::COL_NOM_ETABLISSEMENT, $nomEtablissement, $comparison);
    }

    /**
     * Filter the query on the code_postal column
     *
     * Example usage:
     * <code>
     * $query->filterByCodePostal('fooValue');   // WHERE code_postal = 'fooValue'
     * $query->filterByCodePostal('%fooValue%', Criteria::LIKE); // WHERE code_postal LIKE '%fooValue%'
     * </code>
     *
     * @param     string $codePostal The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationClasseeQuery The current query, for fluid interface
     */
    public function filterByCodePostal($codePostal = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codePostal)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationClasseeTableMap::COL_CODE_POSTAL, $codePostal, $comparison);
    }

    /**
     * Filter the query on the commune column
     *
     * Example usage:
     * <code>
     * $query->filterByCommune('fooValue');   // WHERE commune = 'fooValue'
     * $query->filterByCommune('%fooValue%', Criteria::LIKE); // WHERE commune LIKE '%fooValue%'
     * </code>
     *
     * @param     string $commune The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationClasseeQuery The current query, for fluid interface
     */
    public function filterByCommune($commune = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($commune)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationClasseeTableMap::COL_COMMUNE, $commune, $comparison);
    }

    /**
     * Filter the query on the departement column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartement('fooValue');   // WHERE departement = 'fooValue'
     * $query->filterByDepartement('%fooValue%', Criteria::LIKE); // WHERE departement LIKE '%fooValue%'
     * </code>
     *
     * @param     string $departement The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationClasseeQuery The current query, for fluid interface
     */
    public function filterByDepartement($departement = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($departement)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationClasseeTableMap::COL_DEPARTEMENT, $departement, $comparison);
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
     * @return $this|ChildInstallationClasseeQuery The current query, for fluid interface
     */
    public function filterByRegime($regime = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regime)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationClasseeTableMap::COL_REGIME, $regime, $comparison);
    }

    /**
     * Filter the query on the seveso column
     *
     * Example usage:
     * <code>
     * $query->filterBySeveso(true); // WHERE seveso = true
     * $query->filterBySeveso('yes'); // WHERE seveso = true
     * </code>
     *
     * @param     boolean|string $seveso The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationClasseeQuery The current query, for fluid interface
     */
    public function filterBySeveso($seveso = null, $comparison = null)
    {
        if (is_string($seveso)) {
            $seveso = in_array(strtolower($seveso), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(InstallationClasseeTableMap::COL_SEVESO, $seveso, $comparison);
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
     * @return $this|ChildInstallationClasseeQuery The current query, for fluid interface
     */
    public function filterByEtatActivite($etatActivite = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($etatActivite)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InstallationClasseeTableMap::COL_ETAT_ACTIVITE, $etatActivite, $comparison);
    }

    /**
     * Filter the query on the priorite_nationale column
     *
     * Example usage:
     * <code>
     * $query->filterByPrioriteNationale(true); // WHERE priorite_nationale = true
     * $query->filterByPrioriteNationale('yes'); // WHERE priorite_nationale = true
     * </code>
     *
     * @param     boolean|string $prioriteNationale The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationClasseeQuery The current query, for fluid interface
     */
    public function filterByPrioriteNationale($prioriteNationale = null, $comparison = null)
    {
        if (is_string($prioriteNationale)) {
            $prioriteNationale = in_array(strtolower($prioriteNationale), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(InstallationClasseeTableMap::COL_PRIORITE_NATIONALE, $prioriteNationale, $comparison);
    }

    /**
     * Filter the query on the IEDMTD column
     *
     * Example usage:
     * <code>
     * $query->filterByIedmtd(true); // WHERE IEDMTD = true
     * $query->filterByIedmtd('yes'); // WHERE IEDMTD = true
     * </code>
     *
     * @param     boolean|string $iedmtd The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildInstallationClasseeQuery The current query, for fluid interface
     */
    public function filterByIedmtd($iedmtd = null, $comparison = null)
    {
        if (is_string($iedmtd)) {
            $iedmtd = in_array(strtolower($iedmtd), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(InstallationClasseeTableMap::COL_IEDMTD, $iedmtd, $comparison);
    }

    /**
     * Filter the query by a related \ND\Cedric\Propel\InstallationClasseeCategorie object
     *
     * @param \ND\Cedric\Propel\InstallationClasseeCategorie|ObjectCollection $installationClasseeCategorie the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildInstallationClasseeQuery The current query, for fluid interface
     */
    public function filterByInstallationClasseeCatQuery($installationClasseeCategorie, $comparison = null)
    {
        if ($installationClasseeCategorie instanceof \ND\Cedric\Propel\InstallationClasseeCategorie) {
            return $this
                ->addUsingAlias(InstallationClasseeTableMap::COL_ID, $installationClasseeCategorie->getInstallationId(), $comparison);
        } elseif ($installationClasseeCategorie instanceof ObjectCollection) {
            return $this
                ->useInstallationClasseeCatQueryQuery()
                ->filterByPrimaryKeys($installationClasseeCategorie->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInstallationClasseeCatQuery() only accepts arguments of type \ND\Cedric\Propel\InstallationClasseeCategorie or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InstallationClasseeCatQuery relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInstallationClasseeQuery The current query, for fluid interface
     */
    public function joinInstallationClasseeCatQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InstallationClasseeCatQuery');

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
            $this->addJoinObject($join, 'InstallationClasseeCatQuery');
        }

        return $this;
    }

    /**
     * Use the InstallationClasseeCatQuery relation InstallationClasseeCategorie object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ND\Cedric\Propel\InstallationClasseeCategorieQuery A secondary query class using the current class as primary query
     */
    public function useInstallationClasseeCatQueryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInstallationClasseeCatQuery($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InstallationClasseeCatQuery', '\ND\Cedric\Propel\InstallationClasseeCategorieQuery');
    }

    /**
     * Filter the query by a related \ND\Cedric\Propel\InstallationDoc object
     *
     * @param \ND\Cedric\Propel\InstallationDoc|ObjectCollection $installationDoc the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildInstallationClasseeQuery The current query, for fluid interface
     */
    public function filterByInstallationClasseeDocQuery($installationDoc, $comparison = null)
    {
        if ($installationDoc instanceof \ND\Cedric\Propel\InstallationDoc) {
            return $this
                ->addUsingAlias(InstallationClasseeTableMap::COL_ID, $installationDoc->getInstallationId(), $comparison);
        } elseif ($installationDoc instanceof ObjectCollection) {
            return $this
                ->useInstallationClasseeDocQueryQuery()
                ->filterByPrimaryKeys($installationDoc->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInstallationClasseeDocQuery() only accepts arguments of type \ND\Cedric\Propel\InstallationDoc or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the InstallationClasseeDocQuery relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildInstallationClasseeQuery The current query, for fluid interface
     */
    public function joinInstallationClasseeDocQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('InstallationClasseeDocQuery');

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
            $this->addJoinObject($join, 'InstallationClasseeDocQuery');
        }

        return $this;
    }

    /**
     * Use the InstallationClasseeDocQuery relation InstallationDoc object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ND\Cedric\Propel\InstallationDocQuery A secondary query class using the current class as primary query
     */
    public function useInstallationClasseeDocQueryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInstallationClasseeDocQuery($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'InstallationClasseeDocQuery', '\ND\Cedric\Propel\InstallationDocQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildInstallationClassee $installationClassee Object to remove from the list of results
     *
     * @return $this|ChildInstallationClasseeQuery The current query, for fluid interface
     */
    public function prune($installationClassee = null)
    {
        if ($installationClassee) {
            $this->addUsingAlias(InstallationClasseeTableMap::COL_ID, $installationClassee->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the installation table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InstallationClasseeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            InstallationClasseeTableMap::clearInstancePool();
            InstallationClasseeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(InstallationClasseeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(InstallationClasseeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            InstallationClasseeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            InstallationClasseeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // InstallationClasseeQuery
