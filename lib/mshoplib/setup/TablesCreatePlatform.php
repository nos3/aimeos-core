<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2016
 */


namespace Aimeos\MW\Setup\Task;


/**
 * Creates all platform specific tables
 */
<<<<<<< HEAD
class TablesCreatePlatform extends \Aimeos\MW\Setup\Task\Base
=======
class TablesCreatePlatform extends TablesCreateMShop
>>>>>>> a730b3c97b0dfdb987ac242f82095ef6a2a3c997
{
	/**
	 * Returns the list of task names which this task depends on.
	 *
	 * @return string[] List of task names
	 */
	public function getPreDependencies()
	{
		return array( 'TablesCreateMAdmin', 'TablesCreateMShop' );
	}


	/**
	 * Returns the list of task names which depends on this task.
	 *
	 * @return array List of task names
	 */
	public function getPostDependencies()
	{
		return array();
	}


	/**
	 * Creates the platform specific schema
	 */
	public function migrate()
	{
		$this->msg( 'Creating platform specific schema', 0 );
		$this->status( '' );

		$ds = DIRECTORY_SEPARATOR;

<<<<<<< HEAD
		$files = array(
			'db-index' => realpath( __DIR__ ) . $ds . 'default' . $ds . 'schema' . $ds . 'index-mysql.sql',
			'db-order' => realpath( __DIR__ ) . $ds . 'default' . $ds . 'schema' . $ds . 'order-mysql.sql',
			'db-text' => realpath( __DIR__ ) . $ds . 'default' . $ds . 'schema' . $ds . 'text-mysql.sql',
		);

		$this->setup( $files );
=======
		$this->setupPlatform( 'db-index', 'mysql', realpath( __DIR__ ) . $ds . 'default' . $ds . 'schema' . $ds . 'index-mysql.sql' );
		$this->setupPlatform( 'db-order', 'mysql', realpath( __DIR__ ) . $ds . 'default' . $ds . 'schema' . $ds . 'order-mysql.sql' );
		$this->setupPlatform( 'db-text', 'mysql', realpath( __DIR__ ) . $ds . 'default' . $ds . 'schema' . $ds . 'text-mysql.sql' );

		$this->setupPlatform( 'db-index', 'pgsql', realpath( __DIR__ ) . $ds . 'default' . $ds . 'schema' . $ds . 'index-pgsql.sql' );
		$this->setupPlatform( 'db-order', 'pgsql', realpath( __DIR__ ) . $ds . 'default' . $ds . 'schema' . $ds . 'order-pgsql.sql' );
		$this->setupPlatform( 'db-text', 'pgsql', realpath( __DIR__ ) . $ds . 'default' . $ds . 'schema' . $ds . 'text-pgsql.sql' );
>>>>>>> a730b3c97b0dfdb987ac242f82095ef6a2a3c997
	}


	/**
	 * Creates all required tables if they doesn't exist
	 */
<<<<<<< HEAD
	protected function setup( array $files )
	{
		foreach( $files as $rname => $filepath )
		{
			$this->msg( 'Using schema from ' . basename( $filepath ), 1 ); $this->status( '' );

			if( ( $content = file_get_contents( $filepath ) ) === false ) {
				throw new \Aimeos\MW\Setup\Exception( sprintf( 'Unable to get content from file "%1$s"', $filepath ) );
			}

			$schema = $this->getSchema( $rname );

			foreach( $this->getTableDefinitions( $content ) as $name => $sql )
			{
				$this->msg( sprintf( 'Checking table "%1$s": ', $name ), 2 );

				if( $schema->tableExists( $name ) !== true ) {
					$this->execute( $sql, $rname );
					$this->status( 'created' );
				} else {
					$this->status( 'OK' );
				}
			}

			foreach( $this->getIndexDefinitions( $content ) as $name => $sql )
			{
				$parts = explode( '.', $name );
				$this->msg( sprintf( 'Checking index "%1$s": ', $name ), 2 );

				if( $schema->indexExists( $parts[0], $parts[1] ) !== true ) {
					$this->execute( $sql, $rname );
					$this->status( 'created' );
				} else {
					$this->status( 'OK' );
				}
			}
		}
=======
	protected function setupPlatform( $rname, $adapter, $filepath )
	{
		$schema = $this->getSchema( $rname );

		if( $adapter !== $schema->getName() ) {
			return;
		}

		parent::setup( array( $rname => $filepath ) );
>>>>>>> a730b3c97b0dfdb987ac242f82095ef6a2a3c997
	}
}
