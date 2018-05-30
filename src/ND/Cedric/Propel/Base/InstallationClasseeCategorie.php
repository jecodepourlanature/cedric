<?php

namespace ND\Cedric\Propel\Base;

use \DateTime;
use \Exception;
use \PDO;
use ND\Cedric\Propel\InstallationClassee as ChildInstallationClassee;
use ND\Cedric\Propel\InstallationClasseeCategorieQuery as ChildInstallationClasseeCategorieQuery;
use ND\Cedric\Propel\InstallationClasseeQuery as ChildInstallationClasseeQuery;
use ND\Cedric\Propel\Map\InstallationClasseeCategorieTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'installation_categorie' table.
 *
 *
 *
 * @package    propel.generator.ND.Cedric.Propel.Base
 */
abstract class InstallationClasseeCategorie implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\ND\\Cedric\\Propel\\Map\\InstallationClasseeCategorieTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     *
     * @var        string
     */
    protected $id;

    /**
     * The value for the installation_id field.
     *
     * @var        string
     */
    protected $installation_id;

    /**
     * The value for the rubrique_ic field.
     *
     * @var        int
     */
    protected $rubrique_ic;

    /**
     * The value for the alinea field.
     *
     * @var        string
     */
    protected $alinea;

    /**
     * The value for the date_autorisation field.
     *
     * @var        DateTime
     */
    protected $date_autorisation;

    /**
     * The value for the etat_activite field.
     *
     * @var        string
     */
    protected $etat_activite;

    /**
     * The value for the regime field.
     *
     * @var        string
     */
    protected $regime;

    /**
     * The value for the activite field.
     *
     * @var        string
     */
    protected $activite;

    /**
     * The value for the volume field.
     *
     * @var        int
     */
    protected $volume;

    /**
     * The value for the unite field.
     *
     * @var        string
     */
    protected $unite;

    /**
     * @var        ChildInstallationClassee
     */
    protected $aInstallationClassee;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of ND\Cedric\Propel\Base\InstallationClasseeCategorie object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>InstallationClasseeCategorie</code> instance.  If
     * <code>obj</code> is an instance of <code>InstallationClasseeCategorie</code>, delegates to
     * <code>equals(InstallationClasseeCategorie)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|InstallationClasseeCategorie The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [installation_id] column value.
     *
     * @return string
     */
    public function getInstallationId()
    {
        return $this->installation_id;
    }

    /**
     * Get the [rubrique_ic] column value.
     *
     * @return int
     */
    public function getRubriqueIc()
    {
        return $this->rubrique_ic;
    }

    /**
     * Get the [alinea] column value.
     *
     * @return string
     */
    public function getAlinea()
    {
        return $this->alinea;
    }

    /**
     * Get the [optionally formatted] temporal [date_autorisation] column value.
     *
     *
     * @param      string|null $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateAutorisation($format = NULL)
    {
        if ($format === null) {
            return $this->date_autorisation;
        } else {
            return $this->date_autorisation instanceof \DateTimeInterface ? $this->date_autorisation->format($format) : null;
        }
    }

    /**
     * Get the [etat_activite] column value.
     *
     * @return string
     */
    public function getEtatActivite()
    {
        return $this->etat_activite;
    }

    /**
     * Get the [regime] column value.
     *
     * @return string
     */
    public function getRegime()
    {
        return $this->regime;
    }

    /**
     * Get the [activite] column value.
     *
     * @return string
     */
    public function getActivite()
    {
        return $this->activite;
    }

    /**
     * Get the [volume] column value.
     *
     * @return int
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * Get the [unite] column value.
     *
     * @return string
     */
    public function getUnite()
    {
        return $this->unite;
    }

    /**
     * Set the value of [id] column.
     *
     * @param string $v new value
     * @return $this|\ND\Cedric\Propel\InstallationClasseeCategorie The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[InstallationClasseeCategorieTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [installation_id] column.
     *
     * @param string $v new value
     * @return $this|\ND\Cedric\Propel\InstallationClasseeCategorie The current object (for fluent API support)
     */
    public function setInstallationId($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->installation_id !== $v) {
            $this->installation_id = $v;
            $this->modifiedColumns[InstallationClasseeCategorieTableMap::COL_INSTALLATION_ID] = true;
        }

        if ($this->aInstallationClassee !== null && $this->aInstallationClassee->getId() !== $v) {
            $this->aInstallationClassee = null;
        }

        return $this;
    } // setInstallationId()

    /**
     * Set the value of [rubrique_ic] column.
     *
     * @param int $v new value
     * @return $this|\ND\Cedric\Propel\InstallationClasseeCategorie The current object (for fluent API support)
     */
    public function setRubriqueIc($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->rubrique_ic !== $v) {
            $this->rubrique_ic = $v;
            $this->modifiedColumns[InstallationClasseeCategorieTableMap::COL_RUBRIQUE_IC] = true;
        }

        return $this;
    } // setRubriqueIc()

    /**
     * Set the value of [alinea] column.
     *
     * @param string $v new value
     * @return $this|\ND\Cedric\Propel\InstallationClasseeCategorie The current object (for fluent API support)
     */
    public function setAlinea($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->alinea !== $v) {
            $this->alinea = $v;
            $this->modifiedColumns[InstallationClasseeCategorieTableMap::COL_ALINEA] = true;
        }

        return $this;
    } // setAlinea()

    /**
     * Sets the value of [date_autorisation] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\ND\Cedric\Propel\InstallationClasseeCategorie The current object (for fluent API support)
     */
    public function setDateAutorisation($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_autorisation !== null || $dt !== null) {
            if ($this->date_autorisation === null || $dt === null || $dt->format("Y-m-d") !== $this->date_autorisation->format("Y-m-d")) {
                $this->date_autorisation = $dt === null ? null : clone $dt;
                $this->modifiedColumns[InstallationClasseeCategorieTableMap::COL_DATE_AUTORISATION] = true;
            }
        } // if either are not null

        return $this;
    } // setDateAutorisation()

    /**
     * Set the value of [etat_activite] column.
     *
     * @param string $v new value
     * @return $this|\ND\Cedric\Propel\InstallationClasseeCategorie The current object (for fluent API support)
     */
    public function setEtatActivite($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->etat_activite !== $v) {
            $this->etat_activite = $v;
            $this->modifiedColumns[InstallationClasseeCategorieTableMap::COL_ETAT_ACTIVITE] = true;
        }

        return $this;
    } // setEtatActivite()

    /**
     * Set the value of [regime] column.
     *
     * @param string $v new value
     * @return $this|\ND\Cedric\Propel\InstallationClasseeCategorie The current object (for fluent API support)
     */
    public function setRegime($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->regime !== $v) {
            $this->regime = $v;
            $this->modifiedColumns[InstallationClasseeCategorieTableMap::COL_REGIME] = true;
        }

        return $this;
    } // setRegime()

    /**
     * Set the value of [activite] column.
     *
     * @param string $v new value
     * @return $this|\ND\Cedric\Propel\InstallationClasseeCategorie The current object (for fluent API support)
     */
    public function setActivite($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->activite !== $v) {
            $this->activite = $v;
            $this->modifiedColumns[InstallationClasseeCategorieTableMap::COL_ACTIVITE] = true;
        }

        return $this;
    } // setActivite()

    /**
     * Set the value of [volume] column.
     *
     * @param int $v new value
     * @return $this|\ND\Cedric\Propel\InstallationClasseeCategorie The current object (for fluent API support)
     */
    public function setVolume($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->volume !== $v) {
            $this->volume = $v;
            $this->modifiedColumns[InstallationClasseeCategorieTableMap::COL_VOLUME] = true;
        }

        return $this;
    } // setVolume()

    /**
     * Set the value of [unite] column.
     *
     * @param string $v new value
     * @return $this|\ND\Cedric\Propel\InstallationClasseeCategorie The current object (for fluent API support)
     */
    public function setUnite($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->unite !== $v) {
            $this->unite = $v;
            $this->modifiedColumns[InstallationClasseeCategorieTableMap::COL_UNITE] = true;
        }

        return $this;
    } // setUnite()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : InstallationClasseeCategorieTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : InstallationClasseeCategorieTableMap::translateFieldName('InstallationId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->installation_id = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : InstallationClasseeCategorieTableMap::translateFieldName('RubriqueIc', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rubrique_ic = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : InstallationClasseeCategorieTableMap::translateFieldName('Alinea', TableMap::TYPE_PHPNAME, $indexType)];
            $this->alinea = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : InstallationClasseeCategorieTableMap::translateFieldName('DateAutorisation', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->date_autorisation = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : InstallationClasseeCategorieTableMap::translateFieldName('EtatActivite', TableMap::TYPE_PHPNAME, $indexType)];
            $this->etat_activite = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : InstallationClasseeCategorieTableMap::translateFieldName('Regime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->regime = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : InstallationClasseeCategorieTableMap::translateFieldName('Activite', TableMap::TYPE_PHPNAME, $indexType)];
            $this->activite = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : InstallationClasseeCategorieTableMap::translateFieldName('Volume', TableMap::TYPE_PHPNAME, $indexType)];
            $this->volume = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : InstallationClasseeCategorieTableMap::translateFieldName('Unite', TableMap::TYPE_PHPNAME, $indexType)];
            $this->unite = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 10; // 10 = InstallationClasseeCategorieTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\ND\\Cedric\\Propel\\InstallationClasseeCategorie'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aInstallationClassee !== null && $this->installation_id !== $this->aInstallationClassee->getId()) {
            $this->aInstallationClassee = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(InstallationClasseeCategorieTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildInstallationClasseeCategorieQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aInstallationClassee = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see InstallationClasseeCategorie::setDeleted()
     * @see InstallationClasseeCategorie::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(InstallationClasseeCategorieTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildInstallationClasseeCategorieQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(InstallationClasseeCategorieTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                InstallationClasseeCategorieTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aInstallationClassee !== null) {
                if ($this->aInstallationClassee->isModified() || $this->aInstallationClassee->isNew()) {
                    $affectedRows += $this->aInstallationClassee->save($con);
                }
                $this->setInstallationClassee($this->aInstallationClassee);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(InstallationClasseeCategorieTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = 'id';
        }
        if ($this->isColumnModified(InstallationClasseeCategorieTableMap::COL_INSTALLATION_ID)) {
            $modifiedColumns[':p' . $index++]  = 'installation_id';
        }
        if ($this->isColumnModified(InstallationClasseeCategorieTableMap::COL_RUBRIQUE_IC)) {
            $modifiedColumns[':p' . $index++]  = 'rubrique_ic';
        }
        if ($this->isColumnModified(InstallationClasseeCategorieTableMap::COL_ALINEA)) {
            $modifiedColumns[':p' . $index++]  = 'alinea';
        }
        if ($this->isColumnModified(InstallationClasseeCategorieTableMap::COL_DATE_AUTORISATION)) {
            $modifiedColumns[':p' . $index++]  = 'date_autorisation';
        }
        if ($this->isColumnModified(InstallationClasseeCategorieTableMap::COL_ETAT_ACTIVITE)) {
            $modifiedColumns[':p' . $index++]  = 'etat_activite';
        }
        if ($this->isColumnModified(InstallationClasseeCategorieTableMap::COL_REGIME)) {
            $modifiedColumns[':p' . $index++]  = 'regime';
        }
        if ($this->isColumnModified(InstallationClasseeCategorieTableMap::COL_ACTIVITE)) {
            $modifiedColumns[':p' . $index++]  = 'activite';
        }
        if ($this->isColumnModified(InstallationClasseeCategorieTableMap::COL_VOLUME)) {
            $modifiedColumns[':p' . $index++]  = 'volume';
        }
        if ($this->isColumnModified(InstallationClasseeCategorieTableMap::COL_UNITE)) {
            $modifiedColumns[':p' . $index++]  = 'unite';
        }

        $sql = sprintf(
            'INSERT INTO installation_categorie (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_STR);
                        break;
                    case 'installation_id':
                        $stmt->bindValue($identifier, $this->installation_id, PDO::PARAM_STR);
                        break;
                    case 'rubrique_ic':
                        $stmt->bindValue($identifier, $this->rubrique_ic, PDO::PARAM_INT);
                        break;
                    case 'alinea':
                        $stmt->bindValue($identifier, $this->alinea, PDO::PARAM_STR);
                        break;
                    case 'date_autorisation':
                        $stmt->bindValue($identifier, $this->date_autorisation ? $this->date_autorisation->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'etat_activite':
                        $stmt->bindValue($identifier, $this->etat_activite, PDO::PARAM_STR);
                        break;
                    case 'regime':
                        $stmt->bindValue($identifier, $this->regime, PDO::PARAM_STR);
                        break;
                    case 'activite':
                        $stmt->bindValue($identifier, $this->activite, PDO::PARAM_STR);
                        break;
                    case 'volume':
                        $stmt->bindValue($identifier, $this->volume, PDO::PARAM_INT);
                        break;
                    case 'unite':
                        $stmt->bindValue($identifier, $this->unite, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = InstallationClasseeCategorieTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getInstallationId();
                break;
            case 2:
                return $this->getRubriqueIc();
                break;
            case 3:
                return $this->getAlinea();
                break;
            case 4:
                return $this->getDateAutorisation();
                break;
            case 5:
                return $this->getEtatActivite();
                break;
            case 6:
                return $this->getRegime();
                break;
            case 7:
                return $this->getActivite();
                break;
            case 8:
                return $this->getVolume();
                break;
            case 9:
                return $this->getUnite();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['InstallationClasseeCategorie'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['InstallationClasseeCategorie'][$this->hashCode()] = true;
        $keys = InstallationClasseeCategorieTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getInstallationId(),
            $keys[2] => $this->getRubriqueIc(),
            $keys[3] => $this->getAlinea(),
            $keys[4] => $this->getDateAutorisation(),
            $keys[5] => $this->getEtatActivite(),
            $keys[6] => $this->getRegime(),
            $keys[7] => $this->getActivite(),
            $keys[8] => $this->getVolume(),
            $keys[9] => $this->getUnite(),
        );
        if ($result[$keys[4]] instanceof \DateTimeInterface) {
            $result[$keys[4]] = $result[$keys[4]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aInstallationClassee) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'installationClassee';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'installation';
                        break;
                    default:
                        $key = 'InstallationClassee';
                }

                $result[$key] = $this->aInstallationClassee->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\ND\Cedric\Propel\InstallationClasseeCategorie
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = InstallationClasseeCategorieTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\ND\Cedric\Propel\InstallationClasseeCategorie
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setInstallationId($value);
                break;
            case 2:
                $this->setRubriqueIc($value);
                break;
            case 3:
                $this->setAlinea($value);
                break;
            case 4:
                $this->setDateAutorisation($value);
                break;
            case 5:
                $this->setEtatActivite($value);
                break;
            case 6:
                $this->setRegime($value);
                break;
            case 7:
                $this->setActivite($value);
                break;
            case 8:
                $this->setVolume($value);
                break;
            case 9:
                $this->setUnite($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = InstallationClasseeCategorieTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setInstallationId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setRubriqueIc($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setAlinea($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setDateAutorisation($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setEtatActivite($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setRegime($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setActivite($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setVolume($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setUnite($arr[$keys[9]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\ND\Cedric\Propel\InstallationClasseeCategorie The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(InstallationClasseeCategorieTableMap::DATABASE_NAME);

        if ($this->isColumnModified(InstallationClasseeCategorieTableMap::COL_ID)) {
            $criteria->add(InstallationClasseeCategorieTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(InstallationClasseeCategorieTableMap::COL_INSTALLATION_ID)) {
            $criteria->add(InstallationClasseeCategorieTableMap::COL_INSTALLATION_ID, $this->installation_id);
        }
        if ($this->isColumnModified(InstallationClasseeCategorieTableMap::COL_RUBRIQUE_IC)) {
            $criteria->add(InstallationClasseeCategorieTableMap::COL_RUBRIQUE_IC, $this->rubrique_ic);
        }
        if ($this->isColumnModified(InstallationClasseeCategorieTableMap::COL_ALINEA)) {
            $criteria->add(InstallationClasseeCategorieTableMap::COL_ALINEA, $this->alinea);
        }
        if ($this->isColumnModified(InstallationClasseeCategorieTableMap::COL_DATE_AUTORISATION)) {
            $criteria->add(InstallationClasseeCategorieTableMap::COL_DATE_AUTORISATION, $this->date_autorisation);
        }
        if ($this->isColumnModified(InstallationClasseeCategorieTableMap::COL_ETAT_ACTIVITE)) {
            $criteria->add(InstallationClasseeCategorieTableMap::COL_ETAT_ACTIVITE, $this->etat_activite);
        }
        if ($this->isColumnModified(InstallationClasseeCategorieTableMap::COL_REGIME)) {
            $criteria->add(InstallationClasseeCategorieTableMap::COL_REGIME, $this->regime);
        }
        if ($this->isColumnModified(InstallationClasseeCategorieTableMap::COL_ACTIVITE)) {
            $criteria->add(InstallationClasseeCategorieTableMap::COL_ACTIVITE, $this->activite);
        }
        if ($this->isColumnModified(InstallationClasseeCategorieTableMap::COL_VOLUME)) {
            $criteria->add(InstallationClasseeCategorieTableMap::COL_VOLUME, $this->volume);
        }
        if ($this->isColumnModified(InstallationClasseeCategorieTableMap::COL_UNITE)) {
            $criteria->add(InstallationClasseeCategorieTableMap::COL_UNITE, $this->unite);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildInstallationClasseeCategorieQuery::create();
        $criteria->add(InstallationClasseeCategorieTableMap::COL_ID, $this->id);
        $criteria->add(InstallationClasseeCategorieTableMap::COL_INSTALLATION_ID, $this->installation_id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId() &&
            null !== $this->getInstallationId();

        $validPrimaryKeyFKs = 1;
        $primaryKeyFKs = [];

        //relation installation_categorie_fk_27404e to table installation
        if ($this->aInstallationClassee && $hash = spl_object_hash($this->aInstallationClassee)) {
            $primaryKeyFKs[] = $hash;
        } else {
            $validPrimaryKeyFKs = false;
        }

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the composite primary key for this object.
     * The array elements will be in same order as specified in XML.
     * @return array
     */
    public function getPrimaryKey()
    {
        $pks = array();
        $pks[0] = $this->getId();
        $pks[1] = $this->getInstallationId();

        return $pks;
    }

    /**
     * Set the [composite] primary key.
     *
     * @param      array $keys The elements of the composite key (order must match the order in XML file).
     * @return void
     */
    public function setPrimaryKey($keys)
    {
        $this->setId($keys[0]);
        $this->setInstallationId($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return (null === $this->getId()) && (null === $this->getInstallationId());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \ND\Cedric\Propel\InstallationClasseeCategorie (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setId($this->getId());
        $copyObj->setInstallationId($this->getInstallationId());
        $copyObj->setRubriqueIc($this->getRubriqueIc());
        $copyObj->setAlinea($this->getAlinea());
        $copyObj->setDateAutorisation($this->getDateAutorisation());
        $copyObj->setEtatActivite($this->getEtatActivite());
        $copyObj->setRegime($this->getRegime());
        $copyObj->setActivite($this->getActivite());
        $copyObj->setVolume($this->getVolume());
        $copyObj->setUnite($this->getUnite());
        if ($makeNew) {
            $copyObj->setNew(true);
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \ND\Cedric\Propel\InstallationClasseeCategorie Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildInstallationClassee object.
     *
     * @param  ChildInstallationClassee $v
     * @return $this|\ND\Cedric\Propel\InstallationClasseeCategorie The current object (for fluent API support)
     * @throws PropelException
     */
    public function setInstallationClassee(ChildInstallationClassee $v = null)
    {
        if ($v === null) {
            $this->setInstallationId(NULL);
        } else {
            $this->setInstallationId($v->getId());
        }

        $this->aInstallationClassee = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildInstallationClassee object, it will not be re-added.
        if ($v !== null) {
            $v->addInstallationClasseeCatQuery($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildInstallationClassee object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildInstallationClassee The associated ChildInstallationClassee object.
     * @throws PropelException
     */
    public function getInstallationClassee(ConnectionInterface $con = null)
    {
        if ($this->aInstallationClassee === null && (($this->installation_id !== "" && $this->installation_id !== null))) {
            $this->aInstallationClassee = ChildInstallationClasseeQuery::create()->findPk($this->installation_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aInstallationClassee->addInstallationClasseeCatQueries($this);
             */
        }

        return $this->aInstallationClassee;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aInstallationClassee) {
            $this->aInstallationClassee->removeInstallationClasseeCatQuery($this);
        }
        $this->id = null;
        $this->installation_id = null;
        $this->rubrique_ic = null;
        $this->alinea = null;
        $this->date_autorisation = null;
        $this->etat_activite = null;
        $this->regime = null;
        $this->activite = null;
        $this->volume = null;
        $this->unite = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

        $this->aInstallationClassee = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(InstallationClasseeCategorieTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
