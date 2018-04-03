<?php

namespace ND\Cedric\Propel\Map;

use ND\Cedric\Propel\InstallationClasseeCategorie;
use ND\Cedric\Propel\InstallationClasseeCategorieQuery;
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
 * This class defines the structure of the 'installation_categorie' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class InstallationClasseeCategorieTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ND.Cedric.Propel.Map.InstallationClasseeCategorieTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'installation_categorie';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ND\\Cedric\\Propel\\InstallationClasseeCategorie';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ND.Cedric.Propel.InstallationClasseeCategorie';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the id field
     */
    const COL_ID = 'installation_categorie.id';

    /**
     * the column name for the installation_id field
     */
    const COL_INSTALLATION_ID = 'installation_categorie.installation_id';

    /**
     * the column name for the rubrique_ic field
     */
    const COL_RUBRIQUE_IC = 'installation_categorie.rubrique_ic';

    /**
     * the column name for the alinea field
     */
    const COL_ALINEA = 'installation_categorie.alinea';

    /**
     * the column name for the date_autorisation field
     */
    const COL_DATE_AUTORISATION = 'installation_categorie.date_autorisation';

    /**
     * the column name for the etat_activite field
     */
    const COL_ETAT_ACTIVITE = 'installation_categorie.etat_activite';

    /**
     * the column name for the regime field
     */
    const COL_REGIME = 'installation_categorie.regime';

    /**
     * the column name for the activite field
     */
    const COL_ACTIVITE = 'installation_categorie.activite';

    /**
     * the column name for the volume field
     */
    const COL_VOLUME = 'installation_categorie.volume';

    /**
     * the column name for the unite field
     */
    const COL_UNITE = 'installation_categorie.unite';

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
        self::TYPE_PHPNAME       => array('Id', 'InstallationId', 'RubriqueIc', 'Alinea', 'DateAutorisation', 'EtatActivite', 'Regime', 'Activite', 'Volume', 'Unite', ),
        self::TYPE_CAMELNAME     => array('id', 'installationId', 'rubriqueIc', 'alinea', 'dateAutorisation', 'etatActivite', 'regime', 'activite', 'volume', 'unite', ),
        self::TYPE_COLNAME       => array(InstallationClasseeCategorieTableMap::COL_ID, InstallationClasseeCategorieTableMap::COL_INSTALLATION_ID, InstallationClasseeCategorieTableMap::COL_RUBRIQUE_IC, InstallationClasseeCategorieTableMap::COL_ALINEA, InstallationClasseeCategorieTableMap::COL_DATE_AUTORISATION, InstallationClasseeCategorieTableMap::COL_ETAT_ACTIVITE, InstallationClasseeCategorieTableMap::COL_REGIME, InstallationClasseeCategorieTableMap::COL_ACTIVITE, InstallationClasseeCategorieTableMap::COL_VOLUME, InstallationClasseeCategorieTableMap::COL_UNITE, ),
        self::TYPE_FIELDNAME     => array('id', 'installation_id', 'rubrique_ic', 'alinea', 'date_autorisation', 'etat_activite', 'regime', 'activite', 'volume', 'unite', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'InstallationId' => 1, 'RubriqueIc' => 2, 'Alinea' => 3, 'DateAutorisation' => 4, 'EtatActivite' => 5, 'Regime' => 6, 'Activite' => 7, 'Volume' => 8, 'Unite' => 9, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'installationId' => 1, 'rubriqueIc' => 2, 'alinea' => 3, 'dateAutorisation' => 4, 'etatActivite' => 5, 'regime' => 6, 'activite' => 7, 'volume' => 8, 'unite' => 9, ),
        self::TYPE_COLNAME       => array(InstallationClasseeCategorieTableMap::COL_ID => 0, InstallationClasseeCategorieTableMap::COL_INSTALLATION_ID => 1, InstallationClasseeCategorieTableMap::COL_RUBRIQUE_IC => 2, InstallationClasseeCategorieTableMap::COL_ALINEA => 3, InstallationClasseeCategorieTableMap::COL_DATE_AUTORISATION => 4, InstallationClasseeCategorieTableMap::COL_ETAT_ACTIVITE => 5, InstallationClasseeCategorieTableMap::COL_REGIME => 6, InstallationClasseeCategorieTableMap::COL_ACTIVITE => 7, InstallationClasseeCategorieTableMap::COL_VOLUME => 8, InstallationClasseeCategorieTableMap::COL_UNITE => 9, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'installation_id' => 1, 'rubrique_ic' => 2, 'alinea' => 3, 'date_autorisation' => 4, 'etat_activite' => 5, 'regime' => 6, 'activite' => 7, 'volume' => 8, 'unite' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $this->setName('installation_categorie');
        $this->setPhpName('InstallationClasseeCategorie');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\ND\\Cedric\\Propel\\InstallationClasseeCategorie');
        $this->setPackage('ND.Cedric.Propel');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id', 'Id', 'VARCHAR', true, 64, null);
        $this->addForeignPrimaryKey('installation_id', 'InstallationId', 'VARCHAR' , 'installation', 'id', true, 10, null);
        $this->addColumn('rubrique_ic', 'RubriqueIc', 'INTEGER', false, null, null);
        $this->addColumn('alinea', 'Alinea', 'VARCHAR', false, 10, null);
        $this->addColumn('date_autorisation', 'DateAutorisation', 'DATE', false, null, null);
        $this->addColumn('etat_activite', 'EtatActivite', 'VARCHAR', false, 50, null);
        $this->addColumn('regime', 'Regime', 'VARCHAR', false, 100, null);
        $this->addColumn('activite', 'Activite', 'VARCHAR', false, 255, null);
        $this->addColumn('volume', 'Volume', 'INTEGER', false, null, null);
        $this->addColumn('unite', 'Unite', 'VARCHAR', false, 10, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('InstallationClassee', '\\ND\\Cedric\\Propel\\InstallationClassee', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':installation_id',
    1 => ':id',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \ND\Cedric\Propel\InstallationClasseeCategorie $obj A \ND\Cedric\Propel\InstallationClasseeCategorie object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getId() || is_scalar($obj->getId()) || is_callable([$obj->getId(), '__toString']) ? (string) $obj->getId() : $obj->getId()), (null === $obj->getInstallationId() || is_scalar($obj->getInstallationId()) || is_callable([$obj->getInstallationId(), '__toString']) ? (string) $obj->getInstallationId() : $obj->getInstallationId())]);
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param mixed $value A \ND\Cedric\Propel\InstallationClasseeCategorie object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \ND\Cedric\Propel\InstallationClasseeCategorie) {
                $key = serialize([(null === $value->getId() || is_scalar($value->getId()) || is_callable([$value->getId(), '__toString']) ? (string) $value->getId() : $value->getId()), (null === $value->getInstallationId() || is_scalar($value->getInstallationId()) || is_callable([$value->getInstallationId(), '__toString']) ? (string) $value->getInstallationId() : $value->getInstallationId())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \ND\Cedric\Propel\InstallationClasseeCategorie object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    }

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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('InstallationId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('InstallationId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('InstallationId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('InstallationId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('InstallationId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('InstallationId', TableMap::TYPE_PHPNAME, $indexType)])]);
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
            $pks = [];

        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('InstallationId', TableMap::TYPE_PHPNAME, $indexType)
        ];

        return $pks;
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
        return $withPrefix ? InstallationClasseeCategorieTableMap::CLASS_DEFAULT : InstallationClasseeCategorieTableMap::OM_CLASS;
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
     * @return array           (InstallationClasseeCategorie object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = InstallationClasseeCategorieTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = InstallationClasseeCategorieTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + InstallationClasseeCategorieTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = InstallationClasseeCategorieTableMap::OM_CLASS;
            /** @var InstallationClasseeCategorie $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            InstallationClasseeCategorieTableMap::addInstanceToPool($obj, $key);
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
            $key = InstallationClasseeCategorieTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = InstallationClasseeCategorieTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var InstallationClasseeCategorie $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                InstallationClasseeCategorieTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(InstallationClasseeCategorieTableMap::COL_ID);
            $criteria->addSelectColumn(InstallationClasseeCategorieTableMap::COL_INSTALLATION_ID);
            $criteria->addSelectColumn(InstallationClasseeCategorieTableMap::COL_RUBRIQUE_IC);
            $criteria->addSelectColumn(InstallationClasseeCategorieTableMap::COL_ALINEA);
            $criteria->addSelectColumn(InstallationClasseeCategorieTableMap::COL_DATE_AUTORISATION);
            $criteria->addSelectColumn(InstallationClasseeCategorieTableMap::COL_ETAT_ACTIVITE);
            $criteria->addSelectColumn(InstallationClasseeCategorieTableMap::COL_REGIME);
            $criteria->addSelectColumn(InstallationClasseeCategorieTableMap::COL_ACTIVITE);
            $criteria->addSelectColumn(InstallationClasseeCategorieTableMap::COL_VOLUME);
            $criteria->addSelectColumn(InstallationClasseeCategorieTableMap::COL_UNITE);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.installation_id');
            $criteria->addSelectColumn($alias . '.rubrique_ic');
            $criteria->addSelectColumn($alias . '.alinea');
            $criteria->addSelectColumn($alias . '.date_autorisation');
            $criteria->addSelectColumn($alias . '.etat_activite');
            $criteria->addSelectColumn($alias . '.regime');
            $criteria->addSelectColumn($alias . '.activite');
            $criteria->addSelectColumn($alias . '.volume');
            $criteria->addSelectColumn($alias . '.unite');
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
        return Propel::getServiceContainer()->getDatabaseMap(InstallationClasseeCategorieTableMap::DATABASE_NAME)->getTable(InstallationClasseeCategorieTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(InstallationClasseeCategorieTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(InstallationClasseeCategorieTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new InstallationClasseeCategorieTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a InstallationClasseeCategorie or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or InstallationClasseeCategorie object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(InstallationClasseeCategorieTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ND\Cedric\Propel\InstallationClasseeCategorie) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(InstallationClasseeCategorieTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(InstallationClasseeCategorieTableMap::COL_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(InstallationClasseeCategorieTableMap::COL_INSTALLATION_ID, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = InstallationClasseeCategorieQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            InstallationClasseeCategorieTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                InstallationClasseeCategorieTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the installation_categorie table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return InstallationClasseeCategorieQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a InstallationClasseeCategorie or Criteria object.
     *
     * @param mixed               $criteria Criteria or InstallationClasseeCategorie object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InstallationClasseeCategorieTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from InstallationClasseeCategorie object
        }


        // Set the correct dbName
        $query = InstallationClasseeCategorieQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // InstallationClasseeCategorieTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
InstallationClasseeCategorieTableMap::buildTableMap();
