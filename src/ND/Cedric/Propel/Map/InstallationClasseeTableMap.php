<?php

namespace ND\Cedric\Propel\Map;

use ND\Cedric\Propel\InstallationClassee;
use ND\Cedric\Propel\InstallationClasseeQuery;
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
 * This class defines the structure of the 'installation' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class InstallationClasseeTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ND.Cedric.Propel.Map.InstallationClasseeTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'installation';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ND\\Cedric\\Propel\\InstallationClassee';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ND.Cedric.Propel.InstallationClassee';

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
    const COL_ID = 'installation.id';

    /**
     * the column name for the nom_etablissement field
     */
    const COL_NOM_ETABLISSEMENT = 'installation.nom_etablissement';

    /**
     * the column name for the code_postal field
     */
    const COL_CODE_POSTAL = 'installation.code_postal';

    /**
     * the column name for the commune field
     */
    const COL_COMMUNE = 'installation.commune';

    /**
     * the column name for the departement field
     */
    const COL_DEPARTEMENT = 'installation.departement';

    /**
     * the column name for the regime field
     */
    const COL_REGIME = 'installation.regime';

    /**
     * the column name for the seveso field
     */
    const COL_SEVESO = 'installation.seveso';

    /**
     * the column name for the etat_activite field
     */
    const COL_ETAT_ACTIVITE = 'installation.etat_activite';

    /**
     * the column name for the priorite_nationale field
     */
    const COL_PRIORITE_NATIONALE = 'installation.priorite_nationale';

    /**
     * the column name for the IEDMTD field
     */
    const COL_IEDMTD = 'installation.IEDMTD';

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
        self::TYPE_PHPNAME       => array('Id', 'NomEtablissement', 'CodePostal', 'Commune', 'Departement', 'Regime', 'Seveso', 'EtatActivite', 'PrioriteNationale', 'Iedmtd', ),
        self::TYPE_CAMELNAME     => array('id', 'nomEtablissement', 'codePostal', 'commune', 'departement', 'regime', 'seveso', 'etatActivite', 'prioriteNationale', 'iedmtd', ),
        self::TYPE_COLNAME       => array(InstallationClasseeTableMap::COL_ID, InstallationClasseeTableMap::COL_NOM_ETABLISSEMENT, InstallationClasseeTableMap::COL_CODE_POSTAL, InstallationClasseeTableMap::COL_COMMUNE, InstallationClasseeTableMap::COL_DEPARTEMENT, InstallationClasseeTableMap::COL_REGIME, InstallationClasseeTableMap::COL_SEVESO, InstallationClasseeTableMap::COL_ETAT_ACTIVITE, InstallationClasseeTableMap::COL_PRIORITE_NATIONALE, InstallationClasseeTableMap::COL_IEDMTD, ),
        self::TYPE_FIELDNAME     => array('id', 'nom_etablissement', 'code_postal', 'commune', 'departement', 'regime', 'seveso', 'etat_activite', 'priorite_nationale', 'IEDMTD', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'NomEtablissement' => 1, 'CodePostal' => 2, 'Commune' => 3, 'Departement' => 4, 'Regime' => 5, 'Seveso' => 6, 'EtatActivite' => 7, 'PrioriteNationale' => 8, 'Iedmtd' => 9, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'nomEtablissement' => 1, 'codePostal' => 2, 'commune' => 3, 'departement' => 4, 'regime' => 5, 'seveso' => 6, 'etatActivite' => 7, 'prioriteNationale' => 8, 'iedmtd' => 9, ),
        self::TYPE_COLNAME       => array(InstallationClasseeTableMap::COL_ID => 0, InstallationClasseeTableMap::COL_NOM_ETABLISSEMENT => 1, InstallationClasseeTableMap::COL_CODE_POSTAL => 2, InstallationClasseeTableMap::COL_COMMUNE => 3, InstallationClasseeTableMap::COL_DEPARTEMENT => 4, InstallationClasseeTableMap::COL_REGIME => 5, InstallationClasseeTableMap::COL_SEVESO => 6, InstallationClasseeTableMap::COL_ETAT_ACTIVITE => 7, InstallationClasseeTableMap::COL_PRIORITE_NATIONALE => 8, InstallationClasseeTableMap::COL_IEDMTD => 9, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'nom_etablissement' => 1, 'code_postal' => 2, 'commune' => 3, 'departement' => 4, 'regime' => 5, 'seveso' => 6, 'etat_activite' => 7, 'priorite_nationale' => 8, 'IEDMTD' => 9, ),
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
        $this->setName('installation');
        $this->setPhpName('InstallationClassee');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\ND\\Cedric\\Propel\\InstallationClassee');
        $this->setPackage('ND.Cedric.Propel');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id', 'Id', 'VARCHAR', true, 10, null);
        $this->addColumn('nom_etablissement', 'NomEtablissement', 'VARCHAR', false, 255, null);
        $this->addColumn('code_postal', 'CodePostal', 'VARCHAR', false, 5, null);
        $this->addColumn('commune', 'Commune', 'VARCHAR', false, 255, null);
        $this->addColumn('departement', 'Departement', 'VARCHAR', false, 3, null);
        $this->addColumn('regime', 'Regime', 'VARCHAR', false, 20, null);
        $this->addColumn('seveso', 'Seveso', 'BOOLEAN', false, 1, null);
        $this->addColumn('etat_activite', 'EtatActivite', 'VARCHAR', false, 50, null);
        $this->addColumn('priorite_nationale', 'PrioriteNationale', 'BOOLEAN', false, 1, null);
        $this->addColumn('IEDMTD', 'Iedmtd', 'BOOLEAN', false, 1, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('InstallationClasseeCatQuery', '\\ND\\Cedric\\Propel\\InstallationClasseeCategorie', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':installation_id',
    1 => ':id',
  ),
), null, null, 'InstallationClasseeCatQueries', false);
        $this->addRelation('InstallationClasseeDocQuery', '\\ND\\Cedric\\Propel\\InstallationDoc', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':installation_id',
    1 => ':id',
  ),
), null, null, 'InstallationClasseeDocQueries', false);
    } // buildRelations()

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
        return (string) $row[
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
        return $withPrefix ? InstallationClasseeTableMap::CLASS_DEFAULT : InstallationClasseeTableMap::OM_CLASS;
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
     * @return array           (InstallationClassee object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = InstallationClasseeTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = InstallationClasseeTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + InstallationClasseeTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = InstallationClasseeTableMap::OM_CLASS;
            /** @var InstallationClassee $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            InstallationClasseeTableMap::addInstanceToPool($obj, $key);
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
            $key = InstallationClasseeTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = InstallationClasseeTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var InstallationClassee $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                InstallationClasseeTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(InstallationClasseeTableMap::COL_ID);
            $criteria->addSelectColumn(InstallationClasseeTableMap::COL_NOM_ETABLISSEMENT);
            $criteria->addSelectColumn(InstallationClasseeTableMap::COL_CODE_POSTAL);
            $criteria->addSelectColumn(InstallationClasseeTableMap::COL_COMMUNE);
            $criteria->addSelectColumn(InstallationClasseeTableMap::COL_DEPARTEMENT);
            $criteria->addSelectColumn(InstallationClasseeTableMap::COL_REGIME);
            $criteria->addSelectColumn(InstallationClasseeTableMap::COL_SEVESO);
            $criteria->addSelectColumn(InstallationClasseeTableMap::COL_ETAT_ACTIVITE);
            $criteria->addSelectColumn(InstallationClasseeTableMap::COL_PRIORITE_NATIONALE);
            $criteria->addSelectColumn(InstallationClasseeTableMap::COL_IEDMTD);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.nom_etablissement');
            $criteria->addSelectColumn($alias . '.code_postal');
            $criteria->addSelectColumn($alias . '.commune');
            $criteria->addSelectColumn($alias . '.departement');
            $criteria->addSelectColumn($alias . '.regime');
            $criteria->addSelectColumn($alias . '.seveso');
            $criteria->addSelectColumn($alias . '.etat_activite');
            $criteria->addSelectColumn($alias . '.priorite_nationale');
            $criteria->addSelectColumn($alias . '.IEDMTD');
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
        return Propel::getServiceContainer()->getDatabaseMap(InstallationClasseeTableMap::DATABASE_NAME)->getTable(InstallationClasseeTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(InstallationClasseeTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(InstallationClasseeTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new InstallationClasseeTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a InstallationClassee or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or InstallationClassee object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(InstallationClasseeTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ND\Cedric\Propel\InstallationClassee) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(InstallationClasseeTableMap::DATABASE_NAME);
            $criteria->add(InstallationClasseeTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = InstallationClasseeQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            InstallationClasseeTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                InstallationClasseeTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the installation table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return InstallationClasseeQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a InstallationClassee or Criteria object.
     *
     * @param mixed               $criteria Criteria or InstallationClassee object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(InstallationClasseeTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from InstallationClassee object
        }


        // Set the correct dbName
        $query = InstallationClasseeQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // InstallationClasseeTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
InstallationClasseeTableMap::buildTableMap();
